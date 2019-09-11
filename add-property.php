<?php
$sPageTitle = 'Add Property';
$sActive = 'property';
require_once(__DIR__ . '/components/top.php');

session_start();

if (!$_SESSION || $_SESSION['jUser']->role == 'user') {
    header('location:index');
}
?>

<div class="container">
    <form id="formAddProperty" class="text-center border border-light p-5" method="POST" style="margin-top:0">
        <h1 class="mb-4">Add Property</h1>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="uploadImages" name="uploadImages[]" multiple aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="uploadImages">Choose file</label>
            </div>
        </div>

        <p id="lblErrorsAddProperty"></p>
        <button id="btnAddProperty" class="btn my-4 btn-block button-form" type="button">Create Property</button>
    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>