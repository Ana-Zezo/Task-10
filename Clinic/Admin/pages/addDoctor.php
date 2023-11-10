<?php
include_once "../inc/header.php";
include_once "../inc/main.php";
?>
<div class="container">
    <form action="../Controller/Doctors/addDoctorController.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?php
            $sql = new DB();
            $allMajor = $sql->getData("majors", "id , name", "status='1'");
            keyAndValueSession("doctor_error", "name");
            keyAndValueSession("doctor_error", "bio");
            keyAndValueSession("doctor_error", "price");
            keyAndValueSession("doctor_error", "status");
            keyAndValueSession("doctor_error", "image");
            keySession("request_error");
            keySession("success_add", "info");
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Doctor</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name : </label>
                                    <input type="text" class="form-control border px-3" id="title"
                                        placeholder="Enter Name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Bio : </label>
                                    <input type="text" class="form-control border px-3" id="title"
                                        placeholder="Enter Bio" name="bio">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Price : </label>
                                    <input type="number" min="0" class="form-control border px-3" id="title"
                                        placeholder="Enter Price" name="price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status : </label>
                                    <select class="form-select form-select-lg mb-3 border px-3"
                                        aria-label="Large select example" name="status" id="status">
                                        <option value="empty" selected disabled>Open menu</option>
                                        <option value="0">Hidden</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat" class="form-label">Doctors : </label>
                                    <select class="form-select form-select-lg mb-3 border px-3"
                                        aria-label="Large select example" name="major_id" id="cat" required>
                                        <option value="empty" selected disabled>Open menu</option>
                                        <?php
                                        foreach ($allMajor as $value) {
                                            echo $value["name"];
                                            $id = $value["id"];
                                            $title = $value["name"];
                                            echo "<option value='$id'>$title</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Image : </label>
                                        <input class="form-control border" type="file" id="img" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Add Doctor</button>
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