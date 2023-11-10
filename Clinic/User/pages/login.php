<?php
require_once "../inc/header.php";
?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="../../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">login</li>
        </ol>
    </nav>
    <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
        <?php
        // unset($_SESSION[0]["auth"]);
        keySession("register_success", "success");
        keySession("data_error");
        keySession("email_not_exist");
        keyAndValueSession("login_error", "email");
        keyAndValueSession("login_error", "password");
        keySession("request_error");
        keySession("login");
        keySession("not_auth");
        ?>
        <form class="form" method="POST" action="../Controller/LoginController.php">
            <div class="mb-4">
                <label class="form-label required-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" required name="email">
            </div>
            <div class="mb-3">
                <label class="form-label required-label" for="password">password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
            <span>don't have an account?</span><a class="link" href="./register.php">create account</a>
        </div>
    </div>

</div>
<?php
require_once "../inc/footer.php";
?>