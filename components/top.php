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
    <title>Real Estate - <?= $sPageTitle; ?></title>
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
                <li class="<?= $sActive == 'search' ? 'active nav-item' : 'nav-item'; ?>">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-search"></i>Search
                    </a>
                </li>
                <li class="<?= $sActive == 'add' ? 'active nav-item' : 'nav-item'; ?>">
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
                <li class="<?= $sActive == 'login' ? 'active nav-item' : 'nav-item'; ?>">
                    <a class="nav-link" href="login.php">
                        <i class="fas fa-sign-in-alt"></i>Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>