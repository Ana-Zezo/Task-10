<?php
require_once "../inc/header.php";
if (isset($_SESSION["auth"])) {
    $sql = new DB();
    $user_id = $_SESSION["auth"]["id"];
    $user = $sql->getData("users", "*", "id='$user_id'");
}
?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="../../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">contact</li>
        </ol>

    </nav>
    <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
        <form class="form" action="../Controller/ContactController.php" method="POST">
            <?php
            keySession("success_send", "success");
            keyAndValueSession("message_error", "name");
            keyAndValueSession("message_error", "phone");
            keyAndValueSession("message_error", "email");
            keyAndValueSession("message_error", "subject");
            keyAndValueSession("message_error", "msg");
            keySession("request_error");
            ?>
            <div class="form-items">
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required
                        value="<?= (isset($_SESSION["auth"])) ? $user[0]["name"] : "" ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="phone"
                        value="<?= (isset($_SESSION["auth"])) ? $user[0]["phone"] : "" ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email"
                        value="<?= (isset($_SESSION["auth"])) ? $user[0]["email"] : "" ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="subject">subject</label>
                    <input type="text" name="subject" class="form-control" id="subject">
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="message">message</label>
                    <textarea name="msg" class="form-control" id="message"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>

</div>
<?php
require_once "../inc/footer.php";
?>