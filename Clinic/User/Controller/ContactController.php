<?php
require_once "../../Classes/DB.php";
require_once "../../Classes/Validation.php";
require_once "../../function/helper.php";
if (checkRequest("POST")) {
    $errors = [];
    dd($_POST);
    foreach ($_POST as $key => $item) {
        $$key = sanitize($item);
    }
    $sql = new DB();
    $val = new Validation();
    $errors = [];
    $errors["name"] = $val->isValid("name", $name, 3, 25);
    $errors["phone"] = $val->isValid("phone", $phone, 3, 25);
    $errors["email"] = $val->isValidEmail("email", $email);
    $errors["subject"] = $val->isValid("subject", $subject, 3, 25);
    $errors["msg"] = $val->isValid("msg", "$msg", 3, 255);
    $allErrors = empty($errors['name']) && empty($errors["phone"]) && empty($errors["email"]) && empty($errors["subject"]) && empty($errors["msg"]);
    echo $allErrors;
    if ($allErrors) {
        $data = [
            "name" => $name,
            "phone" => $phone,
            "email" => $email,
            "subject" => $subject,
            "message" => $msg
        ];
        $sql->insertData("contacts", $data);
        redirect("../pages/contact.php", "success_send", "Successful Send Message");
        die;
    } else {
        dd($errors);
        echo $errors["subject"];
        redirect("../pages/contact.php", "message_error", $errors);
        die;
    }
} else {
    redirect("../pages/contact.php", "request_error", "Request Error");
    die;
}