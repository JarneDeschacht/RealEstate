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
    <!-- MAPBOX -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />
    <!-- MDBootstrap Datatables  -->
    <link href="MDBootstrap/css/addons/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="app.css">

    <title>Real Estate - <?= $sPageTitle; ?></title>
</head>

<body>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark" id="navbar">
        <a class="navbar-brand" href="index">REAL ESTATE APP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="<?= $sActive == 'search' ? 'active nav-item' : 'nav-item'; ?>">
                    <a class="nav-link" href="index">
                        <i class="fas fa-search"></i>Search Property
                    </a>
                </li>
                <?php
                session_start();
                $sClass = $sActive == 'login' ? 'active nav-item' : 'nav-item';
                if (!$_SESSION) {
                    echo '<li class="' . $sClass . '">
                    <a class="nav-link" href="login">
                        <i class="fas fa-sign-in-alt"></i>Login
                    </a>
                    </li>';
                } else {
                    $jUser = $_SESSION['jUser'];

                    if ($jUser->role === 'agent') {
                        $sClass = $sActive == 'property' ? 'active nav-item' : 'nav-item';
                        echo '
                        <li class="' . $sClass . '">
                            <a class="nav-link" href="add-property">
                                <i class="fas fa-plus"></i>Add Property
                            </a>
                        </li>';
                    }

                    $sClass = $sActive == 'account' ? 'active nav-item' : 'nav-item';
                    $sAgent = $jUser->role === 'agent' ? '<a class="dropdown-item" href="manage-properties">My Properties</a>' : '';
                    echo '
                    <li class="nav-item dropdown ' . $sClass . '">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> ' . $jUser->firstname . ' </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item" href="account">My Account</a>
                            ' . $sAgent . '
                            <a class="dropdown-item" href="api/api-logout.php">Log Out</a>
                        </div>
                    </li>';
                }
                ?>
            </ul>
        </div>
    </nav>