<?php
$sPageTitle = 'Login';
$sActive = 'login';
require_once(__DIR__ . '/components/top.php');
?>

<div class="container">
    <form id="formLogin" method="POST" class="text-center border border-light p-5">
        <h1 class="mb-4">Sign in</h1>
        <div class="md-form mt-0">
            <input type="email" id="txtEmail" class="form-control mb-4" name="txtEmail">
            <label for="txtEmail">E-mail</label>
        </div>
        <div class="md-form mt-0">
            <input type="password" class="form-control mb-4" name="txtPassword">
            <label for="txtPassword">Password</label>
        </div>
        <p id="lblErrorsLogin"></p>
        <div class="d-flex justify-content-around">
            <div>
                <a data-toggle="modal" data-target="#modelSendEmail">Forgot password?</a>
            </div>
            <?php require_once(__DIR__ . '/components/forgot-password-modal.php'); ?>
        </div>
        <button id="btnLogin" type="button" class="btn btn-block my-4 button-form">Sign in</button>
        <p>Not a member?
            <a href="register">Register</a>
        </p>
    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>