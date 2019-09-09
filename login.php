<?php
$sPageTitle = 'Login';
$sActive = 'login';
require_once(__DIR__ . '/components/top.php');
?>

<div class="container">
    <form id="formLogin" method="POST" class="text-center border border-light p-5">
        <h1 class="mb-4">Sign in</h1>
        <input type="email" class="form-control mb-4" placeholder="E-mail" name="txtEmail">
        <input type="password" class="form-control mb-4" placeholder="Password" name="txtPassword">
        <p id="lblErrorsLogin"></p>
        <div class="d-flex justify-content-around">
            <div>
                <a href="">Forgot password?</a>
            </div>
        </div>
        <button id="btnLogin" type="button" class="btn btn-block my-4 button-form">Sign in</button>
        <p>Not a member?
            <a href="register">Register</a>
        </p>
    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>