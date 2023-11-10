<?php
include_once "../inc/header.php";
include_once "../inc/main.php";
include_once "../../Classes/DB.php";
include_once "../../function/helper.php";
$doctor_id = $_GET["doctor_id"];
$sql = new DB();
// Error =>
// $doctors_id = $sql->getData("doctors", "id");
// if (!in_array($doctor_id, array_column($doctors_id, "id"))) {
//     redirect("../showDoctor.php", "no_exist", "Doctor ID Not Found");
//     die;
// }
$doctor = $sql->getData("doctors", "*", "id=$doctor_id");

?>
<div class="container">
    <form action="../Controller/Doctors/updateDoctorController.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?php
            keyAndValueSession("update_error", "name");
            keyAndValueSession("update_error", "bio");
            keyAndValueSession("update_error", "price");
            keyAndValueSession("update_error", "status");
            keyAndValueSession("update_error", "image");
            keySession("request_error");
            keySession("update_error");
            keySession("success_add", "info");
            keySession("update_item", "info");
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Doctor</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name : </label>
                                    <input type="text" class="form-control border px-3" id="title"
                                        placeholder="Enter Name" name="name" value="<?= $doctor[0]["name"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Bio : </label>
                                    <input type="text" class="form-control border px-3" id="title"
                                        placeholder="Enter Bio" name="bio" value="<?= $doctor[0]["bio"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Price : </label>
                                    <input type="text" class="form-control border px-3" id="title"
                                        placeholder="Enter Price" name="price" value="<?= $doctor[0]["price"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status : </label>
                                    <select class="form-select form-select-lg mb-3 border px-3"
                                        aria-label="Large select example" name="status" id="status">
                                        <?php
                                        if ($doctor[0]["status"] == "0") {
                                            ?>
                                        <option value="0" selected>Hidden</option>
                                        <option value="1">Show</option>
                                        <?php } else { ?>
                                        <option value="0">Hidden</option>
                                        <option value="1" selected>Show</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Image : </label>
                                        <input class="form-control border" type="file" id="img" name="image">
                                        <img src="../assets/img/doctor/<?= $doctor[0]["image"] ?>" class="my-3"
                                            width="150" alt="">
                                    </div>
                                    <input type="hidden" name="image" value="<?= $doctor[0]["image"] ?>">
                                    <input type="hidden" name="doctor_id" value="<?= $doctor[0]["id"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="./showDoctor.php" class="btn btn-dark ">All Doctor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include_once "../inc/footer.php";
?>