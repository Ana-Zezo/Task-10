<?php
session_start();
require_once "../../Classes/DB.php";
require_once "../../Classes/Validation.php";
require_once "../../function/helper.php";
// Check Request POST
if (checkRequest("POST")) {
    $errors = [];
    // Stored Value And Sanitize
    foreach ($_POST as $key => $item) {
        $$key = sanitize($item);
    }
    // Validation
    $sql = new DB();
    $user = new Validation();
    $errors["email"] = $user->isValidEmail("email", $email);
    if ($user->isEmpty($password)) {
        $errors["password"] = "Password Is Required Value";
    }
    if (empty($errors['email']) && empty($errors["password"])) {
        $result = $sql->getData("users", "email", "email = '$email'");
        if (empty($result)) {
            redirect("../pages/login.php", "email_not_exist", "Email Not Found");
            die;
        } else {
            $result = $sql->getData("users", "*", "email = '$email'");
            $encryption = $result[0]["password"];
            $checkPassword = password_verify($password, $encryption);
            if ($email == $result[0]["email"] && $checkPassword) {
                $_SESSION["auth"] = $result[0];
                if ($result[0]["role"] == "1") {
                    echo "Amdin";
                    redirect("../../Admin/pages/index.php", "login_success", "Successful Login");
                    die;
                } else {
                    echo "patent";
                    redirect("../../index.php", "login_success", "Successful Login");
                    die;
                }
            } else {
                redirect("../pages/login.php", "data_error", "Incorrect Data");
                die;
            }
        }
    } else {
        redirect("../pages/login.php", "login_error", $errors);
        die;
    }
} else {
    redirect("../pages/login.php", "request_error", "Request Error");
    die;
}