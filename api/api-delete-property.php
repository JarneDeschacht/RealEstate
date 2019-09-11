<?php

$sPropId = $_GET['id'];
session_start();
$sUserId = $_SESSION['jUser']->id;

$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);

$jUser = $jData->$sUserId;
unset($jUser->properties->$sPropId);
$jData->$sUserId = $jUser;

file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

$_SESSION['jUser'] = $jUser;

echo '{
    "status": 1,
    "message": "Property succesfully deleted"
}';
exit;
