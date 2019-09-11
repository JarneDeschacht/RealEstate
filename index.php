<?php
$sPageTitle = 'Search Properties';
$sActive = 'search';
require_once(__DIR__ . '/components/top.php');
?>

<div class="container">
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
                    <div id="' . $sKey . '" class="card property">
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

<?php require_once(__DIR__ . '/components/bottom.php')  ?>