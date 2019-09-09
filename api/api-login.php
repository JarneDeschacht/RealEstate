<?php
session_start();
if ($_SESSION) {
    header('Location: ../index');
}

if (empty($_POST['txtEmail'])) {
    sendErrorMessage('email address missing', __LINE__);
}
if (empty($_POST['txtPassword'])) {
    sendErrorMessage('password missing', __LINE__);
}
if (!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) {
    sendErrorMessage('the mail has not the correct format', __line__);
}

$sjUsers = file_get_contents(__DIR__ . '/../data/users.json');
$jUsers = json_decode($sjUsers);

foreach ($jUsers as $jUser) {
    if ($jUser->email === $_POST['txtEmail']) {
        if ($jUser->password === $_POST['txtPassword']) {
            $_SESSION['jUser'] = $jUser;
            header('Location: ../index');
            exit;
        }
    }
}

function sendErrorMessage($sMessage,  $iLine)
{
    echo '{
        "status": 0,
        "message": "' . $sMessage . '",
        "line": ' . $iLine . '
    }';
    exit;
}
