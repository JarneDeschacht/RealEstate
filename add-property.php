<?php
$sPageTitle = 'Add Property';
$sActive = 'property';
require_once(__DIR__ . '/components/top.php');

session_start();

if (!$_SESSION || $_SESSION['jUser']->role == 'user') {
    header('location:index');
}
?>

<div class="container">
    <form id="formAddProperty" class="text-center border border-light p-5" method="POST" style="margin-top:0;width:70%">
        <h1 class="mb-4">Add Property</h1>
        <div class="form-row">
            <div class="col-3">
                <div class="md-form">
                    <input type="text" id="txtStreet" class="form-control" name="txtStreet">
                    <label for="txtStreet">Street</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtHouseNumber" class="form-control" name="txtHouseNumber">
                    <label for="txtHouseNumber">Number</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtZipCode" class="form-control" name="txtZipCode">
                    <label for="txtZipCode">Zipcode</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtState" class="form-control" name="txtState">
                    <label for="txtState">State</label>
                </div>
            </div>
            <div class="col-3">
                <div class="md-form">
                    <input type="text" id="txtCity" class="form-control" name="txtCity">
                    <label for="txtCity">City</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-4"></div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtLongitude" class="form-control" name="txtLongitude">
                    <label for="txtLongitude">Longitude</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtLatitude" class="form-control" name="txtLatitude">
                    <label for="txtLatitude">Latitude</label>
                </div>
            </div>
            <div class="col-4"><a href="https://www.latlong.net/" target="_blank" class="searchCoord">Search for coordinates</a></div>
        </div>
        <div class="form-row">
            <div class="col-2">
                <div class="md-form">
                    <input type="text" id="txtType" class="form-control" name="txtType">
                    <label for="txtType">House Type</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtPrice" class="form-control" name="txtPrice">
                    <label for="txtPrice">Price (in $)</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtSize" class="form-control" name="txtSize">
                    <label for="txtSize">Size (in sqft)</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtBedrooms" class="form-control" name="txtBedrooms">
                    <label for="txtBedrooms">Bedrooms</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtBathrooms" class="form-control" name="txtBathrooms">
                    <label for="txtBathrooms">Bathrooms</label>
                </div>
            </div>
            <div class="col-2">
                <div class="md-form">
                    <input type="number" id="txtYear" class="form-control" name="txtYear">
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

        <p id="lblErrorsAddProperty"></p>
        <button id="btnAddProperty" class="btn my-4 btn-block button-form" type="button">Create Property</button>
    </form>
</div>

<?php require_once(__DIR__ . '/components/bottom.php')  ?>