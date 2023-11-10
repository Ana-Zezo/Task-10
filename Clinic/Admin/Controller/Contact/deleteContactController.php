<?php
session_start();
require_once "../../../Classes/DB.php";
require_once "../../../function/helper.php";
$sql = new DB();
$allId = $sql->getData("contacts", "id");
$msg_id = $_GET["msg_id"];
foreach ($allId as $item) {
    if ($msg_id == $item["id"]) {
        $sql->deleteData("contacts", "id ='$msg_id'");
        redirect("../../pages/contact.php", "delete_item", "Successful Delete");
        die;
    }
}
redirect("../../pages/contact.php", "no_exist", "Message ID Not Found");
die;