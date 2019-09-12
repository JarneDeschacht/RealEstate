<?php

session_start();
$sUserId = $_SESSION['jUser']->id;
$images = [];
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
$sPropId = $_POST['id'];


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

$jProperty = new stdClass();
$jProperty->type = $sType;
$jProperty->frontImage = $frontImage;
$jProperty->images = $images;
$jProperty->price = $nPrice;
$jProperty->size = $nSize;
$jProperty->location = $jLocation;
$jProperty->bedrooms = $nBedrooms;
$jProperty->bathrooms = $nBathrooms;
$jProperty->year = $nYear;

$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);

$jData->$sUserId->properties->$sPropId = $jProperty;

file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

$_SESSION['jUser'] = $jData->$sUserId;

echo '{
    "status": 1,
    "message": "Property updates succesfully"
}';
exit;
