<?php
session_start();
require_once "../../../Classes/DB.php";
require_once "../../../Classes/Validation.php";
require_once "../../../function/helper.php";
if (checkRequest("POST")) {
    $errors = [];
    foreach ($_POST as $key => $item) {
        $$key = sanitize($item);
    }
    $sql = new DB();
    $val = new Validation();
    $errors['name'] = $val->isValid("name", $name, 3, 25);
    $image = $_FILES["image"];
    $nameImage = $image["name"];
    $fullPath = $image["full_path"];
    $type = $image["type"];
    $tmpName = $image["tmp_name"];
    $errorImage = $image["error"];
    $sizeImage = $image["size"];
    $allow_exe = ["jpg", "jpeg", "png", "gif", "webp"];
    $allow_mim = ["image/png", "image/jpeg", "image/gif", "image/webp"];
    if ($nameImage == "") {
        $errors["image"] = "Image Is Required";
    } else {
        $fileName = pathinfo($nameImage, PATHINFO_FILENAME);
        $fileExe = pathinfo($nameImage, PATHINFO_EXTENSION);
        if (in_array($fileExe, $allow_exe)) {
            $checkTmp = mime_content_type($tmpName);
            if (in_array($checkTmp, $allow_mim)) {
                if ($errorImage == 0) {
                    if ($sizeImage < 5000000) {
                        $newName = uniqid("", true) . "." . $fileExe;
                        move_uploaded_file($tmpName, "../../assets/img/major/" . $newName);
                    } else {
                        $errors["image"] = "Image Must Be Less Than 5M";
                    }
                } else {
                    $errors["image"] = "Error In Image";
                }

            } else {
                $errors["image"] = "Image Not Correct";
            }
        } else {
            $errors["image"] = "Image Must Be Image";
        }
    }
    if (empty($errors['name']) && empty($errors["image"])) {
        $data = [
            "name" => $name,
            "status" => $status,
            "image" => $newName,
        ];
        $sql->insertData('majors', $data);
        redirect('../../pages/addMajor.php', "success_add", "Successful Add Major");
        die;
    } else {
        redirect("../../pages/addMajor.php", "major_error", $errors);
        die;
    }

} else {
    redirect("../../pages/addMajor.php", "request_error", "Request Error");
    die;
}