<?php
require_once "../inc/header.php";
include_once "../inc/main.php";
$sql = new DB();
$users = $sql->countRows("users");
$majors = $sql->countRows("majors");
$doctors = $sql->countRows("doctors");
$booking = $sql->countRows("booking");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="row mt-4 ">
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-sm-4">
                    <div class="card  mb-2 mb-4">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-3 text-capitalize">Users</p>
                                <h4 class="mb-4">
                                    <?= $users ?>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="card  mb-2">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa-solid fa-id-card-clip"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-3 text-capitalize">Majors</p>
                                <h4 class="mb-4">
                                    <?= $majors ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-sm-4">
                    <div class="card  mb-4">
                        <div class="card-header p-3 pt-2 bg-transparent">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-3 text-capitalize ">Doctors</p>
                                <h4 class="mb-4 ">
                                    <?= $doctors ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header p-3 pt-2 bg-transparent">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fa-solid fa-book-medical"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-3 text-capitalize ">Booking</p>
                                <h4 class="mb-4 ">
                                    <?= $booking ?>
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "../inc/Footer.php";
?>