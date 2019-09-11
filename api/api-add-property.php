<?php

session_start();
$sUserId = $_SESSION['jUser']->id;
$images = [];
$sUniqueId = uniqid();
$sStreet = $_POST['txtStreet'];
$sHouseNumber = $_POST['txtHouseNumber'];
$sZipcode = $_POST['txtZipCode'];
$sState = $_POST['txtState'];
$sCity = $_POST['txtCity'];
$nLongitude = (float) $_POST['txtLongitude'];
$nLatitude = (float) $_POST['txtLatitude'];
$sType = $_POST['txtType'];
$nPrice = (int) $_POST['txtPrice'];
$nSize = (int) $_POST['txtSize'];
$nBedrooms = (int) $_POST['txtBedrooms'];
$nBathrooms = (int) $_POST['txtBathrooms'];
$nYear = (int) $_POST['txtYear'];


//TODO VALIDATION



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
$jLocation->street = $sStreet;
$jLocation->housenumber = $sHouseNumber;
$jLocation->zipcode = $sZipcode;
$jLocation->state = $sState;
$jLocation->city = $sCity;
$jLocation->coordinates = [$nLongitude, $nLatitude];

$jNewProperty = new stdClass();
$jNewProperty->type = $sType;
$jNewProperty->frontImage = $frontImage;
$jNewProperty->images = $images;
$jNewProperty->price = $nPrice;
$jNewProperty->size = $nSize;
$jNewProperty->location = $jLocation;
$jNewProperty->bedrooms = $nBedrooms;
$jNewProperty->bathrooms = $nBathrooms;
$jNewProperty->year = $nYear;

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
