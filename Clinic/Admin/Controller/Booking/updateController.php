<?php
session_start();
require_once "../../../Classes/DB.php";
require_once "../../../Classes/Validation.php";
require_once "../../../function/helper.php";
$sql = new DB();
$val = new Validation();
if (checkRequest("POST")) {
    foreach ($_POST as $key => $item) {
        $$key = sanitize($item);
    }
    $errors["date"] = $val->dateVal($date, "m-d-Y");
    $errors["date"] = $val->isEmpty($date);
    $allId = $sql->getData("booking", "id");
    foreach ($allId as $item) {
        if ($book_id == $item["id"]) {
            $data = ["date" => $date, "status" => $status];
            $id = $item["id"];
            $sql->updateData("booking", $data, "id=$id");
            redirect("../../pages/Booking.php", "update_item", "Successful Update");
            die;
        }
    }
    redirect("../../pages/Booking.php", "no_exist", "Message ID Not Found");
    die;
} else {
    redirect("../../pages/Booking.php", "request_error", "Request Error");
    die;
}