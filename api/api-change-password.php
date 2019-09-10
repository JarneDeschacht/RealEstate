<?php
session_start();
$sUserId = $_SESSION['jUser']->id;

if (empty($_POST['txtCurrentPassword'])) {
    sendErrorMessage('Please fill in your current password', __LINE__);
}
if ($_POST['txtCurrentPassword'] != $_SESSION['jUser']->password) {
    sendErrorMessage('Your current password is not correct', __LINE__);
}
if (empty($_POST['txtNewPassword'])) {
    sendErrorMessage('Please enter a new password', __LINE__);
}
$bNumber = preg_match('@[0-9]@', $_POST['txtNewPassword']);
if (!$bNumber || strlen($_POST['txtNewPassword']) < 8) {
    sendErrorMessage('Password must contain at least 1 number and 8 characters', __LINE__);
}
if (empty($_POST['txtNewPasswordConfirm'])) {
    sendErrorMessage('Please confirm your new password', __LINE__);
}
if ($_POST['txtNewPassword'] != $_POST['txtNewPasswordConfirm']) {
    sendErrorMessage('Your passwords do not match', __LINE__);
}

$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);
$jUser = $jData->$sUserId;
$jUser->password = $_POST['txtNewPassword'];
$jData->$sUserId = $jUser;

file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

$_SESSION['jUser'] = $jUser;

echo '{
    "status": 1,
    "message": "Password changed succesfully"
}';
exit;

function sendErrorMessage($sMessage,  $iLine)
{
    echo '{
        "status": 0,
        "message": "' . $sMessage . '",
        "line": ' . $iLine . '
    }';
    exit;
}
