<?php
// session_abort();
require_once "../inc/header.php";
// require_once "../../function/helper.php";
$sql = new DB();
$user_id = $_SESSION["auth"]["id"];
$books = $sql->getData("booking", "*", "user_id='$user_id'");
foreach ($books as $book) {
    $doctors = $book["doctor_id"];
    $doctors = $sql->getData("doctors", "*", "id=$doctors");
    foreach ($doctors as $doctor) {
        $major_id = $doctor["major_id"];
        $majors = $sql->getData("majors", "*", "id=$major_id");
        foreach ($majors as $major) {
        }
    }
}
?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="../../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">history</li>
        </ol>
        <?php
        keySession("success_book", "success");
        ?>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">major</th>
                <th scope="col">price</th>
                <th scope="col">location</th>
                <th scope="col">completed</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($books as $book) {
                $doctors = $book["doctor_id"];
                $doctors = $sql->getData("doctors", "*", "id=$doctors");
                foreach ($doctors as $doctor) {
                    $major_id = $doctor["major_id"];
                    $majors = $sql->getData("majors", "*", "id=$major_id");
                    foreach ($majors as $major) {
                    }
                }
                ?>
                <tr>
                    <th scope="row">
                        <?= $count++ ?>
                    </th>
                    <td>
                        <?= $book["date"] ?>
                    </td>
                    <td class="d-flex align-items-center gap-2"><img
                            src="../../admin/assets/img/doctor/<?= $doctor["image"] ?>" alt="" width="25" height="25"
                            class="rounded-circle">
                        <a href="../doctors/doctor.php?doctor_id=<?= $doctor["id"] ?>">
                            <?= $doctor["name"] ?>
                        </a>
                    </td>
                    <td>
                        <?= $major["name"] ?>
                    </td>
                    <td class="text-success">
                        <?= $doctor["price"] ?> $
                    </td>
                    <td><a href="https://www.google.com/maps" target="_blank">eraasoft</a></td>
                    <td class="text-danger fw-bold ">
                        <?= $book["status"] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require_once "../inc/footer.php";
?>