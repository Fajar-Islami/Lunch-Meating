<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Lunch Meating Restaurant</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url('assets/') ?>images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="<?= base_url('assets/') ?>images/logo1.png" alt="Logo Lunch Meating" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">
                        <li <?php if ($judul == "Beranda") echo "class='nav-item active'";
                            else echo  "class='nav-item'" ?>>
                            <a class="nav-link" href="<?= base_url('home') ?>">Beranda</a>
                        </li>
                        <li <?php if ($judul == "Menu") echo "class='nav-item active'";
                            else echo  "class='nav-item'" ?>>
                            <a class="nav-link" href="<?= base_url('menu') ?>">Menu</a>
                        </li>
                        <li <?php if ($judul == "Reservasi") echo "class='nav-item active'";
                            else echo  "class='nav-item'" ?>>
                            <a class="nav-link" href="<?= base_url('reservasi') ?>">Reservasi</a>
                        </li>
                        <li <?php if ($judul == "Galeri") echo "class='nav-item active'";
                            else echo  "class='nav-item'" ?>>
                            <a class="nav-link" href="<?= base_url('Galeri') ?>">Galeri</a>
                        </li>
                        <li <?php if ($judul == "Staf") echo "class='nav-item active'";
                            else echo  "class='nav-item'" ?>>
                            <a class="nav-link" href="<?= base_url('Staf') ?>">Staf</a>
                        </li>
                        <li <?php if ($judul == "Tentang") echo "class='nav-item active'";
                            else echo  "class='nav-item'" ?>>
                            <a class="nav-link" href="<?= base_url('Tentang') ?>">Tentang</a>
                        </li>
                        <li <?php if ($judul == "Kontak") echo "class='nav-item active'";
                            else echo  "class='nav-item'" ?>>
                            <a class="nav-link" href="<?= base_url('Kontak') ?>">Kontak</a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="reservation.html">Reservation</a>
                                <a class="dropdown-item" href="stuff.html">Stuff</a>
                                <a class="dropdown-item" href="gallery.html">Gallery</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="blog.html">blog</a>
                                <a class="dropdown-item" href="blog-details.html">blog Single</a>
                            </div>
                        </li> -->

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->