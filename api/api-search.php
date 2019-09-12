<?php

$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);
$matches = [];

if (!isset($_GET['search'])) {
    echo '{}';
    exit;
}
if ($_GET['search'] == null) {
    foreach ($jData as $jUser) {
        foreach ($jUser->properties as $sKey => $jProperty) {
            array_push($matches, $sKey);
        }
    }
    echo json_encode($matches);
    exit;
}

$sSearchFor = strtolower($_GET['search']);
$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);
$matches = [];

foreach ($jData as $jUser) {
    foreach ($jUser->properties as $sKey => $jProperty) {
        if (
            strpos(strtolower($jProperty->location->street), $sSearchFor) !==  false
            || strpos(strtolower($jProperty->location->zipcode), $sSearchFor) !==  false
            || strpos(strtolower($jProperty->location->city), $sSearchFor) !==  false
        ) {
            array_push($matches, $sKey);
        }
    }
}

echo json_encode($matches);
exit;
