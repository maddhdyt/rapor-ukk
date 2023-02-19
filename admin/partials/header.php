<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rapor Dashboard | <?= $title ?> </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/admin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/vendor/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../assets/vendor/jquery.dataTables.min.css">


    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="../assets/admin/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/admin/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="../assets/admin/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="../assets/admin/modules/summernote/summernote-bs4.css"> -->
    <link rel="stylesheet" href="cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/admin/css/style.css">
    <link rel="stylesheet" href="../assets/admin/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script src="https://kit.fontawesome.com/0297ba9f6f.js" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                    <p class="text-md text-light my-auto font-weight-semibold"><?= $title ?></h1>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../assets/admin/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $_SESSION['name']; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="logout_pa.php" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand bg-primary">
                        <a class="text-light" href="../">RAPOR!</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a class="text-light" href="../">R!</a>
                    </div>
                    <ul class="sidebar-menu mt-2">
                        <li class="menu-header">Menu</li>
                        <?php
                        if ($_SESSION['level'] == 'admin') {
                        ?>

                            <li class="<?php if ($title == "Dashboard") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="dashboard.php"><i class="fa-solid fa-house-chimney-window"></i><span>Dashboard</span></a></li>
                            <li class="<?php if ($title == "Kelola Pengaduan") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="kelola_pengaduan.php"><i class="fa-solid fa-newspaper"></i><span>Pengaduan</span></a></li>
                            <li class="menu-header">Management</li>
                            <li class="<?php if ($title == "Kelola Tanggapan") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="kelola_tanggapan.php"><i class="fa-regular fa-comments"></i><span>Tanggapan</span></a></li>
                            <li class="<?php if ($title == "Print Laporan") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="print_pengaduan.php"><i class="fa-solid fa-print"></i><span>Print Laporan</span></a></li>

                            <li class="menu-header">Registrasi</li>
                            <li class="<?php if ($title == "Data Masyarakat") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="data_masyarakat.php"><i class="fa-solid fa-users"></i><span>Data Masyarakat</span></a></li>
                            <li class="<?php if ($title == "Data Petugas") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="data_petugas.php"><i class="fa-solid fa-users-gear"></i><span>Data Petugas</span></a></li>
                        <?php } else { ?>
                            <li class="<?php if ($title == "Dashboard") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="dashboard.php"><i class="fa-solid fa-house-chimney-window"></i><span>Dashboard</span></a></li>
                            <li class="<?php if ($title == "Kelola Pengaduan") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="kelola_pengaduan.php"><i class="fa-solid fa-newspaper"></i><span>Pengaduan</span></a></li>
                            <li class="menu-header">Management</li>
                            <li class="<?php if ($title == "Kelola Tanggapan") {
                                            echo "active";
                                        } else {
                                            echo "";
                                        } ?>"><a class="nav-link" href="kelola_tanggapan.php"><i class="fa-regular fa-comments"></i><span>Tanggapan</span></a></li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>