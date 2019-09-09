<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="MDBootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="MDBootstrap/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="MDBootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="app.css">
    <title>Real Estate</title>

</head>

<body>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark" id="navbar">
        <a class="navbar-brand" href="#">REAL ESTATE APP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fas fa-search"></i>Search
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-plus"></i>Add Property
                    </a>

                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Profile </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="#">My account</a>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-sign-in-alt"></i>Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--/.Navbar -->
    <div class="container">
        <div id="properties">
            <?php
            $sjProperties = file_get_contents(__DIR__ . '/data/properties.json');
            $jProperties = json_decode($sjProperties);
            foreach ($jProperties as $sKey => $jProperty) {
                $iAge = date("Y") - $jProperty->year;
                echo '
                <div id="' . $sKey . '" class="card property">
                    <a class="like" onClick="like(\'' . $sKey . '\')"><i class="far fa-heart fa-2x"></i></a>
                    <img class="card-img-top" src="images/' . $jProperty->image . '" alt="' . $sKey . '">
                    <div class="card-body">
                        <p class="uppercase-text">' . $jProperty->type . ' &middot ' . $iAge . 'y old &middot ' . $jProperty->size . ' sqft</p>
                        <h1>$ ' . number_format($jProperty->price) . '</h1>
                        <p class="address-text">' . $jProperty->address . '</p>
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
                            <h3>' . $jProperty->agent->name . '</h3>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="MDBootstrap/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="MDBootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="MDBootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="MDBootstrap/js/mdb.min.js"></script>
    <!-- APP-->
    <script src="app.js"></script>
</body>

</html>