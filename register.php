<?php
$sPageTitle = 'Register';
$sActive = 'login';
require_once(__DIR__ . '/components/top.php');
?>

<div class="container">
    <form id="formRegister" class="text-center border border-light p-5" method="POST">
        <h1 class="mb-4">Sign up</h1>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text" id="txtFirstname" class="form-control" name="txtFirstname">
                    <label for="txtFirstname">First name</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="text" id="txtLastname" class="form-control" name="txtLastname">
                    <label for="txtLastname">Last name</label>
                </div>
            </div>
        </div>
        <div class="md-form mt-0">
            <input type="email" id="txtEmail" class="form-control mb-4" name="txtEmail">
            <label for="txtEmail">E-mail</label>
        </div>
        <div class="md-form mt-0">
            <input type="text" id="txtPhone" class="form-control mb-4" name="txtPhone">
            <label for="txtPhone">Phone number</label>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="password" id="txtPassword" name="txtPassword" class="form-control">
                    <label for="txtPassword">Password</label>
                    <small class="form-text text-muted mb-4">
                        At least 8 characters and 1 digit
                    </small>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="password" id="txtPasswordConfirm" name="txtPasswordConfirm" class="form-control">
                    <label for="txtPasswordConfirm">Password Confirm</label>
                </div>
            </div>
        </div>
        <p>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="user" name="rdbType" checked value="user">
                <label class="custom-control-label" for="user">User</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="agent" name="rdbType" value="agent">
                <label class="custom-control-label" for="agent">Agent</label>
            </div>
        </p>
        <p id="lblErrorsRegister"></p>
        <button id="btnRegister" class="btn my-4 btn-block button-form" type="button">Sign up</button>

        <div class="text-center">
            <p>Already have an account?
                <a href="login">Login</a>
            </p>
        </div>
    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>