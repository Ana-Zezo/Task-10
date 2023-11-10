<?php
session_start();
require_once("../../Classes/DB.php");
require_once("../../Classes/Validation.php");
require_once("../../function/helper.php");
if (checkRequest("POST")) {
    $errors = [];
    // Stored Value And Sanitize
    foreach ($_POST as $key => $item) {
        $$key = sanitize($item);
    }
    $user = new Validation();
    // Validation
    $errors["name"] = $user->isValid("name", $name, 3, 25);
    $errors["phone"] = $user->isValid("phone", $phone, 3, 25);
    $errors["password"] = $user->isValid("password", $password, 3, 25);
    $errors["email"] = $user->isValidEmail("email", $email);
    $allErrors = empty($errors["name"]) && empty($errors["phone"]) && empty($errors["password"]) && empty($errors["email"]);
    if ($allErrors) {
        echo "Empty";
        $register = new DB();
        $result = $register->getData("users", "*", "`email` = '$email'");
        if (!empty($result)) {
            redirect("../pages/register.php", "email_exist", "Email Is Exist ");
            die;
        } else {
            $encryption = password_hash($password, PASSWORD_DEFAULT);
            $register->insertData("users", [
                "name" => "$name",
                "phone" => "$phone",
                "email" => "$email",
                "password" => "$encryption"
            ]);
            redirect("../pages/login.php", "register_success", "Register Success, Please Login");
            die;
        }
    } else {
        redirect("../pages/register.php", "register_error", $errors);
        die;
    }
} else {
    redirect("../pages/register.php", "request_error", "Request Error");
    die();
}