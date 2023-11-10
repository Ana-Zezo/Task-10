<?php
require_once "../inc/header.php";
$sql = new DB();
// $majors = $sql->getData("majors", "*", "status='1'");
$majors = $sql->getPaginatedData("majors", 1, 3);

?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="../../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">majors</li>
        </ol>
    </nav>
    <div class="majors-grid">
        <?php
        foreach ($majors as $major) {
            ?>
        <div class="card p-2" style="width: 18rem;">
            <img src="../../Admin/assets/img/major/<?= $major["image"] ?>"
                class="card-img-top rounded-circle card-image-circle" alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center">
                    <?= $major["name"] ?>
                </h4>
                <a href="../doctors/majorDoctor.php?major_id=<?= $major["id"] ?>"
                    class="btn btn-outline-primary card-button">Browse Doctors</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <nav class="mt-5" aria-label="navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link page-prev text-bg-primary " href="./majors.php" aria-label="Previous">
                    <span aria-hidden="true">
                        < </span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="./pageOne.php">1</a></li>
            <li class="page-item"><a class="page-link" href="./pageTwo.php">2</a></li>
            <li class="page-item"><a class="page-link" href="./pageThree.php">3</a></li>
            <li class="page-item">
                <a class="page-link page-next text-bg-primary" href="./majors.php" aria-label="Next">
                    <span aria-hidden="true"> > </span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php
require_once "../inc/footer.php";
?>