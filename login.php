<?php
$sPageTitle = 'Login';
$sActive = 'login';
require_once(__DIR__ . '/components/top.php');
?>

<div class="container">
    <form class="text-center border border-light p-5" method="POST">
        <h1 class="mb-4">Sign in</h1>
        <input type="email" class="form-control mb-4" placeholder="E-mail">
        <input type="password" class="form-control mb-4" placeholder="Password">
        <div class="d-flex justify-content-around">
            <div>
                <a href="">Forgot password?</a>
            </div>
        </div>
        <button class="btn btn-block my-4 button-form">Sign in</button>
        <p>Not a member?
            <a href="register.php">Register</a>
        </p>

    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>