<?php
require_once "../inc/header.php";
require_once "../inc/main.php";
$user = new DB();
$all = $user->getData("majors");
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
                    <h3>All Major</h3>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead class="border">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all as $row) {
                                ?>
                                <tr class="border">
                                    <td scope="row" class="p-5">
                                        <?= $count++ ?>
                                    </td>
                                    <td class="p-5">
                                        <?= $row["name"] ?>
                                    </td>
                                    <td class="p-5">
                                        <?= $row["status"] == "0" ? "Hidden" : "Show" ?>
                                    </td>
                                    <td>
                                        <img src="../assets/img/Major/<?= $row["image"] ?>" width="150" height="150" alt="">
                                    </td>
                                    <td class="p-5">
                                        <a href="./editMajor.php?major_id=<?= $row["id"] ?>" class="btn btn-info">Edit</a>
                                        <a href="../controller/Major/deleteMajorController.php?major_id=<?= $row["id"] ?>"
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