<?php
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
    $errors = [];
    $user_id = $_POST["user_id"];
    $doctor_id = $_POST["doctor_id"];
    $errors["name"] = $val->isValid("name", "$name", 3, 25);
    $errors["phone"] = $val->isValid("phone", "$phone", 3, 25);
    $errors["email"] = $val->isValidEmail("email", "$email");
    if (empty($errors['name']) && empty($errors["phone"] && empty($errors["email"]))) {
        $data = [
            "name" => $name,
            "phone" => $phone,
            "user_id" => $user_id,
            "doctor_id" => $doctor_id
        ];
        $sql->insertData("booking", $data);
        redirect("../../pages/history.php", "success_book", "Successful Booking Appointment");
        die;
    } else {
        redirect("../../doctors/doctor.php?doctor_id=$doctor_id", "book_error", $errors);
        die;
    }
} else {
    redirect("../../doctors/doctor.php?doctor_id=$doctor_id", "request_error", "Request Error");
    die;
}