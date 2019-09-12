<?php
$sPageTitle = 'Search Properties';
$sActive = 'search';
$search = '<input type="text" name="txtSearch" id="txtSearch" placeholder="Type Keywords">';
require_once(__DIR__ . '/components/top.php');
?>

<div id="map_properties">
    <div id="map">

    </div>
    <div id="properties">
        <?php
        $sjUsers = file_get_contents(__DIR__ . '/data.json');
        $jUsers = json_decode($sjUsers);

        foreach ($jUsers as $jUser) {
            foreach ($jUser->properties as $sKey => $jProperty) {
                $iAge = date("Y") - $jProperty->year;
                $jLocation = $jProperty->location;
                $sAddress = "$jLocation->housenumber $jLocation->street, $jLocation->city, $jLocation->state $jLocation->zipcode";
                echo '
                    <div id="Right' . $sKey . '" class="card property">
                        <a class="like" onClick="like(\'' . $sKey . '\')"><i class="far fa-heart fa-2x"></i></a>
                        <img class="card-img-top" src="images/' . $jProperty->frontImage . '" alt="' . $sKey . '">
                        <div class="card-body">
                            <p class="uppercase-text">' . $jProperty->type . ' &middot ' . $iAge . 'y old &middot ' . $jProperty->size . ' sqft</p>
                            <h1>$ ' . number_format($jProperty->price) . '</h1>
                            <p class="address-text">' . $sAddress . '</p>
                            <hr>
                            <div class="bed-bath">
                                <div>
                                    <i class="fas fa-bed"></i>
                                    <strong>' . $jProperty->bedrooms . '</strong> bedrooms
                                </div>
                                <div>
                                    <i class="fas fa-bath"></i>
                                    <strong>' . $jProperty->bathrooms . '</strong> bathrooms
                                </div>
                            </div>
                            <hr>
                            <div class="agent">
                                <i class="fas fa-user-circle fa-3x"></i>
                                <h3>' . $jUser->firstname . ' ' . $jUser->lastname . '</h3>
                            </div>
                        </div>
                    </div>';
            }
        }

        ?>
    </div>
</div>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiamFybmVkZXNjaGFjaHQiLCJhIjoiY2swZjZ3MDEzMG02OTNvdGk0cHc4djkxdyJ9.VncWPShN5ZiAS8OlJXzRwg';
    var map = new mapboxgl.Map({
        container: 'map',
        center: [12.556234, 55.689145],
        zoom: 12,
        style: 'mapbox://styles/mapbox/streets-v11'
    });
    map.addControl(new mapboxgl.NavigationControl());

    const sjUsers = '<?= json_encode($jUsers); ?>'
    ajUsers = JSON.parse(sjUsers);

    for (let userKey in ajUsers) {
        let ajUserProperties = ajUsers[userKey].properties;
        for (let propKey in ajUserProperties) {
            let coordinates = ajUserProperties[propKey].location.coordinates;
            var el = document.createElement('i');
            el.className = 'fas fa-map-marker fa-3x smoothScroll';
            el.style.color = '#ff3547';
            el.id = propKey;
            el.addEventListener('click', function() {
                removeActiveClassFromProperty();
                document.getElementById(this.id).classList.add('activeMarker');
                document.getElementById('Right' + this.id).classList.add('activeProperty');
                var elmnt = document.getElementById('Right' + this.id);
                elmnt.scrollIntoView();
            });
            new mapboxgl.Marker(el).setLngLat(coordinates).addTo(map);
        }
    }

    function removeActiveClassFromProperty() {
        let markers = document.querySelectorAll('.activeMarker');
        let properties = document.querySelectorAll('.activeProperty');
        properties.forEach(function(oPropertyDiv) {
            oPropertyDiv.classList.remove('activeProperty')
        })
        markers.forEach(function(oMarkerDiv) {
            oMarkerDiv.classList.remove('activeMarker')
        })
    }
</script>
<?php require_once(__DIR__ . '/components/bottom.php')  ?>