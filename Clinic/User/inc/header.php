<?php
require_once "../../function/helper.php";
require_once "../../classes/DB.php";
session_start();
if (isset($_SESSION["auth"])) {
    if ($_SESSION["auth"]["role"] == 1) {
        echo "Session Exit But Role Not Admin";
        unset($_SESSION["auth"]);
        redirect("../../index.php", "not_auth", "You Are Not Admin To Access Dashboard");
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
        integrity="sha512-4TcjHXQMLM7Y6eqfiasrsnRCc8D/unDeY1UGKGgfwyLUCTsHYMxF7/UHayjItKQKIoP6TTQ6AMamb9w2GMAvNg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/themes/splide-default.min.css"
        integrity="sha512-KhFXpe+VJEu5HYbJyKQs9VvwGB+jQepqb4ZnlhUF/jQGxYJcjdxOTf6cr445hOc791FFLs18DKVpfrQnONOB1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
        integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.rtl.min.css"
        integrity="sha512-wO8UDakauoJxzvyadv1Fm/9x/9nsaNyoTmtsv7vt3/xGsug25X7fCUWEyBh1kop5fLjlcrK3GMVg8V+unYmrVA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <link rel="stylesheet" href="../assets/styles/pages/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="../../index.php">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="../../index.php">Home</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="../doctors/index.php">Doctors</a>
                        <?php
                        if (!isset($_SESSION["auth"])) {
                            ?>
                            <a type="button" class="btn btn-outline-light navigation--button"
                                href="../pages/login.php">login</a>
                            <a type="button" class="btn btn-outline-light navigation--button"
                                href="../pages/register.php">Register</a>
                            <?php
                        } else {
                            ?>
                            <a type="button" class="btn btn-outline-light navigation--button"
                                href="./history.php">Booking</a>
                            <a type="button" class="btn btn-danger navigation--button"
                                href="../Controller/LogoutController.php">Logout</a>
                            <?php
                        } ?>
                    </div>
                </div>
            </div>
        </nav>