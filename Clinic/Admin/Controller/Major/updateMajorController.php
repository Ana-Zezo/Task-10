<?php
session_start();
require_once "../../../Classes/DB.php";
require_once "../../../Classes/Validation.php";
require_once "../../../Classes/ImageVal.php";
require_once "../../../function/helper.php";
$sql = new DB();
$val = new Validation();
if (checkRequest("POST")) {
    $major_id = $_POST["major_id"];
    $errors = [];
    foreach ($_POST as $key => $item) {
        $$key = sanitize($item);
    }
    $errors["name"] = $val->isValid("name", "$name", 3, 25);
    $image = $_FILES["image"];
    $imageVal = new ImageValidator($image);
    $errors["image"] = $imageVal->validate();
    $checkError = empty($errors["name"]);
    if ($checkError) {
        if ($image["name"] == "") {
            $data = [
                "name" => $name,
                "status" => $status,
            ];
            $sql->updateData("majors", $data, "id=$major_id");
            redirect("../../pages/editMajor.php?major_id=$major_id", "update_item", "Successful Update");
            die;
        }
    }
    $checkError = empty($errors["name"]) && empty($errors["image"]);
    if ($checkError) {
        $delImage = $sql->getData("majors", "image", "id=$major_id");
        $delImage = $delImage[0]["image"];
        deleteImage("../../assets/img/major/$delImage");
        $image = ($imageVal->moveImage("../../assets/img/major/"));
        $data = [
            "name" => $name,
            "status" => $status,
            "image" => "$image"
        ];
        $sql->updateData("majors", $data, "id=$major_id");
        redirect("../../pages/editMajor.php?major_id=$major_id", "update_item", "Successful Update");
        die;
    } else {
        redirect("../../pages/editMajor.php?major_id=$major_id", "update_error", $errors);
        die;
    }
} else {
    redirect("../../pages/editMajor.php?major_id=$major_id", "request_error", "Request Error");
    die;
}