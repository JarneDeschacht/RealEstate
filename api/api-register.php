<?php

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
    if ($jUser->email == $_POST['txtEmail']) {
        sendErrorMessage('E-mail already in use', __LINE__);
    }
}

if (empty($_POST['txtPhone'])) {
    sendErrorMessage('Phone number is missing', __LINE__);
}
if (empty($_POST['txtPassword'])) {
    sendErrorMessage('Please enter a password', __LINE__);
}
$bNumber = preg_match('@[0-9]@', $_POST['txtPassword']);
if (!$bNumber || strlen($_POST['txtPassword']) < 8) {
    sendErrorMessage('Password must contain at least 1 number and 8 characters', __LINE__);
}
if (empty($_POST['txtPasswordConfirm'])) {
    sendErrorMessage('Please confirm your password', __LINE__);
}
if ($_POST['txtPassword'] != $_POST['txtPasswordConfirm']) {
    sendErrorMessage('Your passwords do not match', __LINE__);
}
if (empty($_POST['rdbType'])) {
    sendErrorMessage('Please choose a type', __LINE__);
}

$jNewUser = new stdClass();
$jNewUser->firstname = $_POST['txtFirstname'];
$jNewUser->lastname = $_POST['txtLastname'];
$jNewUser->email = $_POST['txtEmail'];
$jNewUser->password = $_POST['txtPassword'];
$jNewUser->phonenumber = $_POST['txtPhone'];
$jNewUser->role = $_POST['rdbType'];
$jNewUser->properties = new stdClass();
$uniqueId = uniqid();

$jData->$uniqueId = $jNewUser;

file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

session_start();
$_SESSION['jUser'] = $jNewUser;

echo '{
    "status": 1,
    "message": "Account made sucessfully"
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
