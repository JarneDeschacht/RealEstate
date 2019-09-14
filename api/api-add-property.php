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


if (empty($sStreet)) {
    sendErrorMessage('Street is missing', __LINE__);
}
if (empty($sHouseNumber)) {
    sendErrorMessage('House number is missing', __LINE__);
}
if (empty($sZipcode)) {
    sendErrorMessage('Zipcode is missing', __LINE__);
}
if (empty($sState)) {
    sendErrorMessage('State is missing', __LINE__);
}
if (empty($sCity)) {
    sendErrorMessage('City is missing', __LINE__);
}
if (empty($nLongitude)) {
    sendErrorMessage('Longitude is missing', __LINE__);
}
if (empty($nLatitude)) {
    sendErrorMessage('Latitude is missing', __LINE__);
}
if (empty($sType)) {
    sendErrorMessage('Type is missing', __LINE__);
}
if (empty($nPrice)) {
    sendErrorMessage('Price is missing', __LINE__);
}
if (empty($nSize)) {
    sendErrorMessage('Size is missing', __LINE__);
}
if (empty($nBedrooms)) {
    sendErrorMessage('Bedrooms is missing', __LINE__);
}
if (empty($nBathrooms)) {
    sendErrorMessage('Bathrooms is missing', __LINE__);
}
if (empty($nYear)) {
    sendErrorMessage('Year build is missing', __LINE__);
}
if ($_FILES['uploadImages']['error'] == UPLOAD_ERR_NO_FILE) {
    sendErrorMessage('please add at least 1 image', __LINE__);
}

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

function sendErrorMessage($sMessage,  $iLine)
{
    echo '{
        "status": 0,
        "message": "' . $sMessage . '",
        "line": ' . $iLine . '
    }';
    exit;
}
