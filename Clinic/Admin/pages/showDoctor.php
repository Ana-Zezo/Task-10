<?php
require_once "../inc/header.php";
require_once "../inc/main.php";
$user = new DB();
$allDoctor = $user->getData("doctors");
$count = 1;
?>
<div class="container">
    <?php
    keySession("delete_item", "success");
    keySession("no_exist");
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Doctors</h3>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead class="border">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">price</th>
                                <th scope="col">Status</th>
                                <th scope="col">image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($allDoctor as $row) {
                                ?>
                                <tr class="border">
                                    <td scope="row" class="p-5">
                                        <?= $count++ ?>
                                    </td>
                                    <td class="p-5">
                                        <?= $row["name"] ?>
                                    </td>
                                    <td class="p-5">
                                        <?= $row["price"] ?>
                                    </td>
                                    <td class="p-5">
                                        <?= $row["status"] == "0" ? "Hidden" : "Show" ?>
                                    </td>
                                    <td>
                                        <img src="../assets/img/Doctor/<?= $row["image"] ?>" width="150" height="150"
                                            alt="">
                                    </td>
                                    <td class="p-5">
                                        <a href="./editDoctor.php?doctor_id=<?= $row["id"] ?>"
                                            class="btn btn-info mx-2">Edit</a>
                                        <a href="../controller/Doctors/deleteDoctorController.php?doctor_id=<?= $row["id"] ?>"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "../inc/Footer.php";
?>