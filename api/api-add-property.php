<?php

session_start();
$sUserId = $_SESSION['jUser']->id;
$images = [];
$sUniqueId = uniqid();


for ($i = 0; $i < count($_FILES['uploadImages']['tmp_name']); $i++) {
    $sTempPathImage = $_FILES['uploadImages']['tmp_name'][$i];
    $sPath =  $_FILES['uploadImages']['name'][$i];
    $ext = pathinfo($sPath, PATHINFO_EXTENSION);
    $sUniqueImageName = uniqid() . '.' . $ext;
    array_push($images, $sUniqueImageName);
    move_uploaded_file(
        $sTempPathImage,
        __DIR__ . "/../images/$sUniqueImageName"
    );
}

$frontImage = $images[0];

$jLocation = new stdClass();
$jLocation->street = 'N Bank Rd NE';
$jLocation->housenumber = "4201";
$jLocation->zipcode = '43046';
$jLocation->state = 'OH';
$jLocation->city = 'Millersport';
$jLocation->longitude = '';
$jLocation->latitude = '';

$jNewProperty = new stdClass();
$jNewProperty->type = 'Single Family';
$jNewProperty->frontImage = $frontImage;
$jNewProperty->images = $images;
$jNewProperty->price = 539500;
$jNewProperty->size = 2838;
$jNewProperty->location = $jLocation;
$jNewProperty->bedrooms = 7;
$jNewProperty->bathrooms = 2;
$jNewProperty->year = 2013;

$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);

$jData->$sUserId->properties->$sUniqueId = $jNewProperty;

file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

$_SESSION['jUser'] = $jData->$sUserId;

echo '{
    "status": 1,
    "message": "Property added succesfully"
}';
exit;
