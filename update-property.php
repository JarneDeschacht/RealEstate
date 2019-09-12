<?php
$sPageTitle = 'Manage Properties';
$sActive = 'account';
require_once(__DIR__ . '/components/top.php');

session_start();

if (!$_SESSION || $_SESSION['jUser']->role == 'user' || empty($_GET['id'])) {
    header('location:index');
}

$jProp = $_SESSION['jUser']->properties->{$_GET['id']};
?>

<div class="container">
    <form id="formUpdateProperty" class="text-center border border-light p-5" method="POST" style="margin-top:0;width:70%">
        <h1 class="mb-4">Edit Property</h1>
        <input style="display:none" type="text" name="id" value="<?= $_GET['id'] ?>">
        <div class="form-row">
            <div class="col-3">
                <div class="md-form">
                    <input type="text" id="txtStreet" class="form-control" name="txtStreet" value="<?= $jProp->location->street ?>">
                    <label for="txtStreet">Street</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtHouseNumber" class="form-control" name="txtHouseNumber" value="<?= $jProp->location->housenumber ?>">
                    <label for="txtHouseNumber">Number</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtZipCode" class="form-control" name="txtZipCode" value="<?= $jProp->location->zipcode ?>">
                    <label for="txtZipCode">Zipcode</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtState" class="form-control" name="txtState" value="<?= $jProp->location->state ?>">
                    <label for="txtState">State</label>
                </div>
            </div>
            <div class="col-3">
                <div class="md-form">
                    <input type="text" id="txtCity" class="form-control" name="txtCity" value="<?= $jProp->location->city ?>">
                    <label for="txtCity">City</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-4"></div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtLongitude" class="form-control" name="txtLongitude" value="<?= $jProp->location->coordinates[0] ?>">
                    <label for="txtLongitude">Longitude</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtLatitude" class="form-control" name="txtLatitude" value="<?= $jProp->location->coordinates[1] ?>">
                    <label for="txtLatitude">Latitude</label>
                </div>
            </div>
            <div class="col-4"><a href="https://www.latlong.net/" target="_blank" class="searchCoord">Search for coordinates</a></div>
        </div>
        <div class="form-row">
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtType" class="form-control" name="txtType" value="<?= $jProp->type ?>">
                    <label for="txtType">House Type</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtPrice" class="form-control" name="txtPrice" value="<?= $jProp->price ?>">
                    <label for="txtPrice">Price (in $)</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtSize" class="form-control" name="txtSize" value="<?= $jProp->size ?>">
                    <label for="txtSize">Size (in sqft)</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtBedrooms" class="form-control" name="txtBedrooms" value="<?= $jProp->bedrooms ?>">
                    <label for="txtBedrooms">Bedrooms</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtBathrooms" class="form-control" name="txtBathrooms" value="<?= $jProp->bathrooms ?>">
                    <label for="txtBathrooms">Bathrooms</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtYear" class="form-control" name="txtYear" value="<?= $jProp->year ?>">
                    <label for="txtYear">Year build</label>
                </div>
            </div>
        </div>
        <div class="form-row" style="margin-top:5%;">
            <div class="col-3"></div>
            <div class="custom-file col-6">
                <input type="file" class="custom-file-input" id="uploadImages" name="uploadImages[]" multiple aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="uploadImages" style="text-align:left;overflow:hidden">Select Images</label>
            </div>
            <div class="col-3"></div>
        </div>

        <p id="lblErrorsUpdateProperty"></p>
        <button id="btnUpdateProperty" class="btn my-4 btn-block button-form" type="button">Update Property</button>
    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>