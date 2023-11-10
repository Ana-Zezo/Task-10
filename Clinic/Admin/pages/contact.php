<?php
require_once "../inc/header.php";
require_once "../inc/main.php";
$user = new DB();
$contacts = $user->getData("contacts");
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
                    <h3>All Message</h3>
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead class="border">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($contacts as $row) {
                                ?>
                                <tr class="border">
                                    <td scope="row" class="text-center py-5">
                                        <?= $count++ ?>
                                    </td>
                                    <td class="py-5">
                                        <?= $row["name"] ?>
                                    </td>
                                    <td class="py-5">
                                        <?= $row["phone"] ?>
                                    </td>
                                    <td class="py-5">
                                        <?= $row["email"] ?>
                                    </td>
                                    <td class="py-5">
                                        <?= $row["subject"] ?>
                                    </td>
                                    <td class="py-5">
                                        <?= $row["message"] ?>
                                    </td>

                                    <td class="py-5">
                                        <a href="../controller/Contact/deleteContactController.php?msg_id=<?= $row["id"] ?>"
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