<?php
session_start();

if (empty($_POST['txtEmail'])) {
    sendErrorMessage('E-mail is missing', __LINE__);
}
if (empty($_POST['txtPassword'])) {
    sendErrorMessage('Password is missing', __LINE__);
}
if (!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) {
    sendErrorMessage('The mail has not the correct format', __line__);
}

$sjUsers = file_get_contents(__DIR__ . '/../data.json');
$jUsers = json_decode($sjUsers);

foreach ($jUsers as $jUser) {
    if ($jUser->email === $_POST['txtEmail']) {
        if ($jUser->password === $_POST['txtPassword']) {
            $_SESSION['jUser'] = $jUser;
            echo '{
                "status": 1,
                "message": "login succesfull"
            }';
            exit;
        }
    }
}
echo '{
    "status": 0,
    "message": "combination of email and password incorrect"
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
