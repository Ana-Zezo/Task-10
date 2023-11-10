<?php
include_once "../inc/header.php";
include_once "../inc/main.php";
?>
<div class="container">
    <form action="../Controller/Major/addMajorController.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?php
            keyAndValueSession("major_error", "name");
            keyAndValueSession("major_error", "image");
            keySession("request_error");
            keySession("success_add", "info");
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Major</h3>
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
                                    <label for="status" class="form-label">Status : </label>
                                    <select class="form-select form-select-lg mb-3 border px-3"
                                        aria-label="Large select example" name="status" id="status">
                                        <option disabled>Open menu</option>
                                        <option value="0">Hidden</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
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
                                        <button type="submit" class="btn btn-primary">Add Major</button>
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