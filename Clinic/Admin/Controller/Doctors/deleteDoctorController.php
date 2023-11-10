<?php
session_start();
require_once "../../../Classes/DB.php";
require_once "../../../function/helper.php";
$sql = new DB();
$allId = $sql->getData("doctors", "id");
$doctor_id = $_GET["doctor_id"];
foreach ($allId as $item) {
    if ($doctor_id == $item["id"]) {
        $doctor = $sql->getData("doctors", "image", "id ='$doctor_id'");
        $image = $doctor[0]["image"];
        deleteImage("../../assets/img/doctor/$image");
        $sql->deleteData("doctors", "id ='$doctor_id'");
        redirect("../../pages/showDoctor.php", "delete_item", "Successful Delete");
        die;
    }
}
redirect("../../pages/showDoctor.php", "no_exist", "Major ID Not Found");
die;