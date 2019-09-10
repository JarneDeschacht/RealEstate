<?php
$sPageTitle = 'My Account';
$sActive = 'account';
require_once(__DIR__ . '/components/top.php');

session_start();
$jUser = $_SESSION['jUser'];
?>

<div class="container">
    <ul class="nav nav-pills nav-justified mb-3 subnav-profile" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-editProfile-tab" data-toggle="pill" href="#pills-editProfile" role="tab" aria-controls="pills-editProfile" aria-selected="true">Edit Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-change-password-tab" data-toggle="pill" href="#pills-change-password" role="tab" aria-controls="pills-change-password" aria-selected="false">Change Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-delete-account-tab" data-toggle="pill" href="#pills-delete-account" role="tab" aria-controls="pills-delete-account" aria-selected="false">Delete Account</a>
        </li>
    </ul>
    <div class="tab-content pt-2 pl-1" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-editProfile" role="tabpanel" aria-labelledby="pills-editProfile-tab">
            <form id="formEditProfile" class="text-center border border-light p-5" method="POST">
                <h1 class="mb-4">Edit Profile</h1>
                <div class="form-row">
                    <div class="col">
                        <div class="md-form">
                            <input type="text" id="txtFirstname" class="form-control" name="txtFirstname" value="<?= $jUser->firstname ?>">
                            <label for="txtFirstname">First name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form">
                            <input type="text" id="txtLastname" class="form-control" name="txtLastname" value="<?= $jUser->lastname ?>">
                            <label for="txtLastname">Last name</label>
                        </div>
                    </div>
                </div>
                <div class="md-form mt-0">
                    <input type="email" id="txtEmail" class="form-control mb-4" name="txtEmail" value="<?= $jUser->email ?>">
                    <label for="txtEmail">E-mail</label>
                </div>
                <div class="md-form mt-0">
                    <input type="text" id="txtPhone" class="form-control mb-4" name="txtPhone" value="<?= $jUser->phonenumber ?>">
                    <label for="txtPhone">Phone number</label>
                </div>
                <p id="lblErrorsEditProfile"></p>
                <button id="btnEditProfile" class="btn my-4 btn-block button-form" type="button">Save</button>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-change-password" role="tabpanel" aria-labelledby="pills-change-password-tab">
            <form id="formChangePassword" class="text-center border border-light p-5" method="POST">
                <h1 class="mb-4">Change Password</h1>
                <div class="md-form mt-0">
                    <input type="password" id="txtCurrentPassword" class="form-control">
                    <label for="txtCurrentPassword">Current Password</label>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="md-form">
                            <input type="password" id="txtNewPassword" class="form-control">
                            <label for="txtNewPassword">New Password</label>
                            <small class="form-text text-muted mb-4">
                                At least 8 characters and 1 digit
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-form">
                            <input type="password" id="txtNewPasswordConfirm" class="form-control">
                            <label for="txtNewPasswordConfirm">New Password Confirm</label>
                        </div>
                    </div>
                </div>
                <p id="lblErrorsChangePassword"></p>
                <button id="btnChangePassword" class="btn my-4 btn-block button-form" type="button">Save</button>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-delete-account" role="tabpanel" aria-labelledby="pills-delete-account-tab">

        </div>
    </div>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>