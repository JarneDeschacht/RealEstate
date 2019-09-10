<?php
session_start();
$sUserId = $_SESSION['jUser']->id;
$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);
unset($jData->$sUserId);
file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));
session_destroy();
header('Location: ../index');
