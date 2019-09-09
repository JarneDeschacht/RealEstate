<?php
$sPageTitle = 'Register';
$sActive = 'login';
require_once(__DIR__ . '/components/top.php');
?>

<div class="container">
    <form class="text-center border border-light p-5" method="POST">
        <h1 class="mb-4">Sign up</h1>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name">
            </div>
        </div>
        <input type="email" class="form-control mb-4" placeholder="E-mail">
        <input type="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <small class="form-text text-muted mb-4">
            At least 8 characters and 1 digit
        </small>
        <input type="text" class="form-control" placeholder="Phone number">

        <p>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="user" name="type" checked>
            <label class="custom-control-label" for="user">User</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="agent" name="type">
            <label class="custom-control-label" for="agent">Agent</label>
        </div>
        </p>

        <button class="btn my-4 btn-block button-form">Sign up</button>

        <div class="text-center">
            <p>Already have an account?
                <a href="login.php">Login</a>
            </p>
        </div>
    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>