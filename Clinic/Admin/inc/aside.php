<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-secondary" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="../pages/index.php" target="_blank">
            <span class="ms-1 font-weight-bold text-white">Clinic</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-dark active bg-gradient-primary" href="index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white <?= $page === "addMajor.php" ? 'active bg-primary' : ''; ?>" href="../pages/addMajor.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                    <span class="nav-link-text ms-1">Add Major</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white <?= $page === "showMajor.php" ? 'active bg-primary' : ''; ?>" href="../pages/showMajor.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">All Major</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white <?= $page === "addDoctor.php" ? 'active bg-primary' : ''; ?>" href="../pages/addDoctor.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                    <span class="nav-link-text ms-1">Add Doctor</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white <?= $page === "showDoctor.php" ? 'active bg-primary' : ''; ?>" href="../pages/showDoctor.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">All Doctor</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white <?= $page === "Booking.php" ? 'active bg-primary' : ''; ?>" href="../pages/Booking.php ">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">All Booking</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-white <?= $page === "contact.php" ? 'active bg-primary' : ''; ?>" href="../pages/contact.php ">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Contact</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="../controller/LogoutController.php" type="button">
                Logout
            </a>
        </div>
    </div>
</aside>