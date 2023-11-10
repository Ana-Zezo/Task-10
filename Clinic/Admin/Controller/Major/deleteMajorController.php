<?php
session_start();
require_once "../../../Classes/DB.php";
require_once "../../../function/helper.php";
$sql = new DB();
$allId = $sql->getData("majors", "id");
$major_id = $_GET["major_id"];
foreach ($allId as $item) {
    if ($major_id == $item["id"]) {
        $major = $sql->getData("majors", "image", "id ='$major_id'");
        $image = $major[0]["image"];
        deleteImage("../../assets/img/major/$image");
        $sql->deleteData("majors", "id ='$major_id'");
        redirect("../../pages/showMajor.php", "delete_item", "Successful Delete");
        die;
    }
}
redirect("../../pages/showMajor.php", "no_exist", "Major ID Not Found");
die;