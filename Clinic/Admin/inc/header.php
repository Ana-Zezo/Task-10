<?php
require_once "../../function/helper.php";
include "../../classes/DB.php";
session_start();
$scriptName = $_SERVER["SCRIPT_NAME"];
$stringToArray = explode("/", $scriptName);
$page = end($stringToArray);
if (isset($_SESSION["auth"])) {
    if ($_SESSION["auth"]["role"] == 0) {
        unset($_SESSION["auth"]);
        redirect("../../user/pages/login.php", "not_auth", "You Are Not Authorization To Access Dashboard");
        die;
    }
} else {
    unset($_SESSION["auth"]);
    redirect("../../user/pages/login.php", "login", "You Are Not Login, Please Login");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Header
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="g-sidenav-show  bg-gray-200">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php
        include_once "aside.php";
        ?>