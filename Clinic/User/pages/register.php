<?php
require_once "../inc/header.php";
?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
        <?php
        unset($_SESSION[0]["auth"]);
        keySession("email_exist");
        keySession("request_error");
        keyAndValueSession("register_error", "name");
        keyAndValueSession("register_error", "phone");
        keyAndValueSession("register_error", "email");
        keyAndValueSession("register_error", "password");
        ?>
        <form action="../Controller/RegisterController.php" method="POST" class="form">
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="password">password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create account</button>
        </form>
        <div class="d-flex justify-content-center gap-2">
            <span>already have an account?</span><a class="link" href="./login.php"> login</a>
        </div>
    </div>

</div>
<?php
require_once "../inc/footer.php";
?>