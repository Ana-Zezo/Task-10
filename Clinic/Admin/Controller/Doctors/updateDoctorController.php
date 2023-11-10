<link rel="stylesheet" href="">
<?php
session_start();
require_once "../../../Classes/DB.php";
require_once "../../../Classes/Validation.php";
require_once "../../../Classes/ImageVal.php";
require_once "../../../function/helper.php";
$sql = new DB();
$val = new Validation();
if (checkRequest("POST")) {
    $errors = [];
    foreach ($_POST as $key => $item) {
        $$key = sanitize($item);
    }
    $errors["name"] = $val->isValid("name", "$name", 3, 25);
    $errors["bio"] = $val->isValid("bio", "$bio", 3, 25);
    $image = $_FILES["image"];
    $imageVal = new ImageValidator($image);
    $errors["image"] = $imageVal->validate();
    $checkError = empty($errors["name"]) && empty($errors["bio"]) && empty($errors["price"]);
    if ($checkError) {
        if ($image["name"] == "") {
            $data = [
                "name" => $name,
                "bio" => $bio,
                "price" => $price,
                "status" => $status,
            ];
            $sql->updateData("doctors", $data, "id=$doctor_id");
            redirect("../../pages/editDoctor.php?doctor_id=$doctor_id", "update_item", "Successful Update");
            die;
        }
    }
    $checkError = empty($errors["name"]) && empty($errors["bio"]) && empty($errors["price"]) && empty($errors["image"]);
    if ($checkError) {
        $delImage = $sql->getData("doctors", "image", "id=$doctor_id");
        $delImage = $delImage[0]["image"];
        deleteImage("../../assets/img/doctor/$delImage");
        $image = ($imageVal->moveImage("../../assets/img/doctor/"));
        $data = [
            "name" => $name,
            "bio" => $bio,
            "price" => $price,
            "status" => $status,
            "image" => "$image"
        ];
        $sql->updateData("doctors", $data, "id=$doctor_id");
        redirect("../../pages/editDoctor.php?doctor_id=$doctor_id", "update_item", "Successful Update");
        die;
    } else {
        redirect("../../pages/editDoctor.php?doctor_id=$doctor_id", "update_error", $errors);
        die;
    }
} else {
    redirect("../../pages/editDoctor.php?doctor_id=$doctor_id", "request_error", "Request Error");
    die;
}