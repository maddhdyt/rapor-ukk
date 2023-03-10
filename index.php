<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - RAPOR</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0297ba9f6f.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <a href="#">RAPOR!</a>
                </div>
                <div class="nav_items">
                    <ul>
                        <li><a href="">Beranda</a></li>
                        <li><a href="">Tentang Kami</a></li>
                        <li><a href="">Kategori</a></li>
                        <li><a href="">How it Works?</a></li>
                        <a href="auth/login.php" class="btn_login">
                            Masuk<i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </a>
                    </ul>
                </div>
                <div class="nav_toggle" onclick="showNavbar()">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="header_content">
                <div class="_title">
                    <h1>
                        APLIKASI PENGADUAN MASYARAKAT
                    </h1>
                    <p>
                        Laporkan keluhan kerusakan, kejahatan, peristiwa dll di kecamatan Rancakalong dengan menulis
                        pengaduan sekarang!
                    </p>
                    <a href="#" class="_btn">
                        Pelajari Sekarang
                    </a>
                </div>
                <div class="_banner">
                    <img src="assets/img/banner_img.gif">
                </div>
            </div>
        </div>
    </header>
    <section id="options">
        <div class="container">
            <div class="user_menu">
                <div class="_card">
                    <div class="_title">
                        <h2>Tulis Pengaduan</h2>
                        <p>Pengaduan akan dikirim dan diverifikasi oleh admin </p>
                    </div>
                    <div class="btn_group">
                        <div class="_icon">
                            <img src="assets/img/document.png">
                        </div>
                        <a href="form_pengaduan.php" class="_btn">
                            <i class="fa-solid fa-plus"></i><span>Laporan</span>
                        </a>
                    </div>
                </div>
                <div class="_card">
                    <div class="_title">
                        <h2>Pengaduan Terkini</h2>
                        <p>Kamu bisa melihat aduan terkini yang telah dilaporkan masyarakat</p>
                    </div>
                    <div class="btn_group">
                        <div class="_icon">
                            <img src="assets/img/newspaper.png">
                        </div>
                        <a href="news_pengaduan.php" class="_btn">
                            <span>Jelajahi</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
    <div class="container">
    <div class="footer_content">
            <div class="footer_nav">
                <div class="_title">
                    <h1>RAPOR!</h1>
                    <p>Website pengaduan bagi masyarakat untuk melaporkan keluhan mereka kepada instansi publik
                        berbasis online</p>
                </div>
            </div>
            <div class="nav_group">
                <div class="_title">
                    <h2>Navigasi</h2>
                </div>
                <div class="_items">
                    <a href="#" class="nav_link">Beranda</a>
                    <a href="#" class="nav_link">Tulis Laporan</a>
                    <a href="#" class="nav_link">Pengaduan Terkini</a>
                    <a href="#" class="nav_link">How it Works?</a>
                    <a href="#" class="nav_link">Tentang Kami</a>
                </div>
            </div>
            <div class="contact_form">
                <div class="_title">
                    <h2>Kontak kami</h2>
                </div>
                <div class="_items">
                    <p>Jl Raya Rancakalong, Nagarawangi, RT/03 RW/07, Kecamatan Rancakalong, Kabupaten Sumedang</p>
                    <p>Phone : +6287731370962</p>
                    <p>Email : rapor.rck@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy;Copyright 2023 Ahmad Hidayat - UKK Rekayasa Perangkat Lunak</p>
        </div>
    </div>
</footer>

    <script src="assets/js/main.js"></script>
    <script>
        const header = document.querySelector("nav")
        const fixedNav = header.offsetTop

        // All Navbar Scrolling Effect
        window.onscroll = function () {
            if (window.pageYOffset > fixedNav) {
                header.classList.add("nav_scroll")
            } else {
                header.classList.remove("nav_scroll")
            }
        }
    </script>
</body>

</html>