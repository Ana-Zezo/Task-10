<?php
require_once "../inc/header.php";
require_once "../inc/main.php";
$sql = new DB();
$books = $sql->getData("booking");
foreach ($books as $book) {
    $doctors = $book["doctor_id"];
    $users = $book["user_id"];
    $doctors = $sql->getData("doctors", "*", "id=$doctors");
    $users = $sql->getData("users", "*", "id=$users");
    foreach ($users as $user) {

    }
    foreach ($doctors as $doctor) {
        $major_id = $doctor["major_id"];
        $majors = $sql->getData("majors", "*", "id=$major_id");
        foreach ($majors as $major) {

        }
    }
}

?>
<div class="container">
    <?php
    keySession("delete_item", "success");
    keySession("update_item", "success");
    keySession("no_exist");
    keySession("request_error");
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>All Booking</h3>
                </div>
                <div class="card-body">

                    <table class="table ">
                        <thead class="border">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">patient</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            $books = $sql->getData("booking");
                            foreach ($books as $book) {

                                $doctors = $book["doctor_id"];
                                $users = $book["user_id"];
                                $doctors = $sql->getData("doctors", "*", "id=$doctors");
                                $users = $sql->getData("users", "*", "id=$users");
                                foreach ($users as $user) {
                                    foreach ($doctors as $doctor) {
                                        $major_id = $doctor["major_id"];
                                        $majors = $sql->getData("majors", "*", "id=$major_id");
                                        foreach ($majors as $major) {
                                            ?>
                                            <form action="../Controller/Booking/updateController.php?book_id=<?= $book['id'] ?>"
                                                method="POST">
                                                <tr class="border">
                                                    <td scope="row" class="p-5">
                                                        <?= $count++ ?>
                                                    </td>
                                                    <td class="py-5">
                                                        <?= $user["name"] ?>
                                                    </td>
                                                    <td class="py-5">
                                                        <?= $user["phone"] ?>
                                                    </td>
                                                    <td class="py-5">
                                                        <?= $doctor["name"] ?>
                                                    </td>
                                                    <td class="py-5">
                                                        <input type="date" name="date" id=""
                                                            value="<?= $book["date"] == NULL ? "" : $book["date"] ?>">
                                                    </td>
                                                    <input type="hidden" name="book_id" value="<?= $book["id"] ?>" id="">
                                                    <td class="py-5">
                                                        <select class="form-select" style="width: 100px; margin: 0 auto" name="status">
                                                            <?php
                                                            if ($book["status"] == "No") {
                                                                ?>
                                                                <option value="No" selected>No</option>
                                                                <option value="Yes">Yes</option>
                                                            <?php } else { ?>
                                                                <option value="No">No</option>
                                                                <option value="Yes" selected>Yes</option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td class="py-5">
                                                        <button type="submit" class="btn btn-info mx-2" type="submit">Update</لا>
                                                    </td>
                                                </tr>
                                            </form>
                                        <?php }
                                    }
                                }
                            } ?>
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