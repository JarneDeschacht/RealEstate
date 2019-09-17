<?php

session_start();
$sUserId = $_SESSION['jUser']->id;
$sPropId = $_GET['propId'];

$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);

$aLikes = [];
$sAgentId = '';

foreach ($jData as $jUser) {
    foreach ($jUser->properties as $sKey => $jProperty) {
        if ($sKey == $sPropId) {
            $sAgentId = $jUser->id;
            $aLikes = $jProperty->likes;
        }
    }
}

$iStatus = 0;
$index = array_search($sUserId, $aLikes);
if ($index !== false) {
    $iStatus = 1;
    unset($aLikes[$index]);
} else {
    array_push($aLikes, $sUserId);
}

$jData->$sAgentId->properties->$sPropId->likes = $aLikes;
file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

echo $iStatus;
