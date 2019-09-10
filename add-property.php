<?php
$sPageTitle = 'My Account';
$sActive = 'account';
require_once(__DIR__ . '/components/top.php');

session_start();

if (!$_SESSION || $_SESSION['jUser']->role == 'user') {
    header('location:index');
}
?>

<div class="container">
    <h1 style="text-align:center">ADD PROPERTY</h1>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>