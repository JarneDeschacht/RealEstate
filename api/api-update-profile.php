<?php
session_start();
$sUserId = $_SESSION['jUser']->id;

if (empty($_POST['txtFirstname'])) {
    sendErrorMessage('First name is missing', __LINE__);
}
if (empty($_POST['txtLastname'])) {
    sendErrorMessage('Last name is missing', __LINE__);
}
if (empty($_POST['txtEmail'])) {
    sendErrorMessage('E-mail is missing', __LINE__);
}
if (!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) {
    sendErrorMessage('Please enter a valid email', __line__);
}

$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);
foreach ($jData as $jUser) {
    if ($jUser->email == $_POST['txtEmail'] && $_POST['txtEmail'] != $_SESSION['jUser']->email) {
        sendErrorMessage('E-mail already in use', __LINE__);
    }
}

if (empty($_POST['txtPhone'])) {
    sendErrorMessage('Phone number is missing', __LINE__);
}

$jUser = $jData->$sUserId;
$jUser->firstname = $_POST['txtFirstname'];
$jUser->lastname = $_POST['txtLastname'];
$jUser->email = $_POST['txtEmail'];
$jUser->phonenumber = $_POST['txtPhone'];
$jData->$sUserId = $jUser;

file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

$_SESSION['jUser'] = $jUser;

echo '{
    "status": 1,
    "message": "Profile updated succesfully"
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
