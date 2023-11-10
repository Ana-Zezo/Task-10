<?php
session_start();
$doctor_id = $_GET["doctor_id"];
require_once "../../Classes/DB.php";
require_once "../../function/helper.php";
$sql = new DB();
$doctors = $sql->getData("doctors", "id");
$found = false;
foreach ($doctors as $doctor) {
    if ($doctor["id"] == $doctor_id) {
        $found = true;
    }
}
if (!$found) {
    redirect("./index.php", "no_exit", "Id Not Found");
    die;
}
$doctor = $sql->getData("doctors", "*", "id='$doctor_id'");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="../pages/majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button" href="./index.php">Doctors</a>
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
                                href="../pages/history.php">Booking</a>
                            <a type="button" class="btn btn-danger navigation--button"
                                href="../Controller/LogoutController.php">Logout</a>
                            <?php
                        } ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../../index.php">doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $doctor[0]["name"] ?>
                    </li>
                </ol>
                <?php
                keySession("book_error");
                keySession("request_error");
                ?>
            </nav>
            <div class="d-flex flex-column gap-3 details-card doctor-details">
                <div class="details d-flex gap-2 align-items-center">
                    <img src="../../Admin/assets/img/doctor/<?= $doctor[0]["image"] ?>" alt="doctor"
                        class="img-fluid rounded-circle" height="150" width="150">
                    <div class="details-info d-flex flex-column gap-3 ">
                        <h4 class="card-title fw-bold">
                            <?= $doctor[0]["name"] ?>
                        </h4>
                        <h4 class="card-title fw-bold text-success ">
                            <?= $doctor[0]["price"] ?> $
                        </h4>
                        <div class="d-flex gap-3 align-bottom">
                            <ul class="rating">
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                            </ul>
                            <a href="#" class="align-baseline">submit rating</a>
                        </div>
                        <h6 class="card-title fw-bold">doctor major and more info about the doctor in summary</h6>
                    </div>
                </div>
                <hr />
                <form class="form" action="../Controller/doctor/addBookingController.php" method="POST">
                    <input type="hidden" name="user_id" value="<?= $_SESSION["auth"]["id"] ?>" id="">
                    <input type="hidden" name="doctor_id" value="<?= $doctor_id ?>" id="">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $_SESSION["auth"]["name"] ?>"
                                id="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control" name="phone"
                                value="<?= $_SESSION["auth"]["phone"] ?>" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" class="form-control" name="email"
                                value="<?= $_SESSION["auth"]["email"] ?>" disabled id="email" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </form>

            </div>
        </div>
    </div>
    <footer class="container-fluid bg-blue text-white py-3">
        <div class="row gap-2">

            <div class="col-sm order-sm-1">
                <h1 class="h1">About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                    laborum
                    saepe
                    enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                    cum
                    iure
                    quod facere.</p>
            </div>
            <div class="col-sm order-sm-2">
                <h1 class="h1">Links</h1>
                <div class="links d-flex gap-2 flex-wrap">
                    <a href="../../index.php" class="link text-white">Home</a>
                    <a href="../pages/majors.php" class="link text-white">Majors</a>
                    <a href="./index.php" class="link text-white">Doctors</a>
                    <?php
                    if (!isset($_SESSION["auth"])) {
                        ?>
                        <a class="link text-white" href="user/pages/login.php">login</a>
                        <a class="link text-white" href="user/pages/register.php">Register</a>
                        <?php
                    }
                    ?>
                    <a href="../pages/contact.php" class="link text-white">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const stars = document.querySelectorAll('.star');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const isActive = star.classList.contains('active');
                if (isActive) {
                    star.classList.remove('active');
                } else {
                    star.classList.add('active');
                }
                for (let i = 0; i < index; i++) {
                    stars[i].classList.add('active');
                }
                for (let i = index + 1; i < stars.length; i++) {
                    stars[i].classList.remove('active');
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>