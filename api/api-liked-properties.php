<?php

session_start();
$sUserId = $_SESSION['jUser']->id;
$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);
$matches = [];

foreach ($jData as $jUser) {
    foreach ($jUser->properties as $sKey => $jProperty) {
        if (in_array($sUserId, $jProperty->likes)) {
            array_push($matches, $sKey);
        }
    }
}

echo json_encode($matches);
exit;
