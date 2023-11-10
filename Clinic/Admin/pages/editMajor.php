<?php
include_once "../inc/header.php";
include_once "../inc/main.php";
include_once "../../Classes/DB.php";
include_once "../../function/helper.php";
$major_id = $_GET["major_id"];
$sql = new DB();
// Error =>
// $majorsId = $sql->getData("majors", "id");
// if (!in_array($major_id, array_column($majorsId, 'id'))) {
//     redirect("../showMajor.php", "no_exist", "Major ID Not Found");
//     die;
// }
$major = $sql->getData("majors", "*", "id=$major_id");
?>
<div class="container">
    <form action="../Controller/Major/updateMajorController.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?php
            keyAndValueSession("major_error", "name");
            keyAndValueSession("major_error", "name");
            keyAndValueSession("update_error", "image");
            keyAndValueSession("update_error", "image");
            keySession("request_error");
            keySession("update_error");
            keySession("success_add", "info");
            keySession("update_item", "info");
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Major</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Name : </label>
                                    <input type="text" class="form-control border px-3" id="title"
                                        placeholder="Enter Name" name="name" value="<?= $major[0]["name"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status : </label>
                                    <select class="form-select form-select-lg mb-3 border px-3"
                                        aria-label="Large select example" name="status" id="status">
                                        <?php
                                        if ($major[0]["status"] == "0") {
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
                                        <img src="../assets/img/major/<?= $major[0]["image"] ?>" class="my-3"
                                            width="150" alt="">
                                    </div>
                                    <input type="hidden" name="image" value="<?= $major[0]["image"] ?>">
                                    <input type="hidden" name="major_id" value="<?= $major[0]["id"] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="./showMajor.php" class="btn btn-dark ">All Major</a>
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