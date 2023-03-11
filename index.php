<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate" />
    <title>Beranda - RAPOR</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/icon/logo-rapor.svg" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">
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
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#options">Fitur</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#alurPengaduan">Alur Pengaduan</a></li>
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
                        APLIKASI <span class="text_primary">PENGADUAN</span> MASYARAKAT
                    </h1>
                    <p>
                        Laporkan keluhan kepada instansi publik dengan menulis
                        pengaduan dengan cepat bersama RAPOR sekarang!
                    </p>
                    <a href="#alurPengaduan" class="_btn">
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
            <div class="text_group">
                <h2 class="_title">Fitur <span class="text_primary">Rapor</span></h2>
                <p class="_desc">Rapor memiliki beberapa fitur utama berikut</p>
            </div>
            <div class="user_menu">
                <div class="_card">
                    <div class="_title">
                        <h2>Ajukan Pengaduan</h2>
                        <p>Pengaduan akan dikirim dan diverifikasi oleh admin </p>
                    </div>
                    <div class="btn_group">
                        <a href="form_pengaduan.php" class="_btn">
                            <i class="fa-solid fa-plus"></i><span>Pengaduan</span>
                        </a>
                    </div>
                </div>
                <div class="_card">
                    <div class="_title">
                        <h2>Aduan Masyarakat</h2>
                        <p>Kamu bisa melihat aduan terkini yang telah dilaporkan masyarakat</p>
                    </div>
                    <div class="btn_group">
                        <a href="news_pengaduan.php" class="_btn">
                            <i class="fa-solid fa-magnifying-glass"></i><span>Jelajahi</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">
            <div class="about">
                <div class="text_group">
                    <h2 class="_title">
                        Tentang <span class="text_primary">Rapor</span>
                    </h2>
                    <p class="_desc">
                        Rapor atau Rakyat Melapor merupakan aplikasi pengaduan berbasis website yang hadir sebagai wadah keluhanmu terhadap instansi publik dengan proses pengaduan yang lebih cepat dan mudah. Kamu bisa menulis pengaduan tentang keluhan terhadap pelayanan umum yang kurang baik, kerusakan infrastuktur umum, tindak kriminal pegawai publik dan lain - lain. Laporanmu akan dikelola oleh pegawai desa dan akan ditindak lanjuti secepatnya.
                    </p>
                    <a href="auth/register.php" class="_btn">
                        Get Started
                    </a>
                </div>
                <div class="icon_group">
                    <div class="_card">
                        <div class="icon">
                            <img src="assets/icon/icon-website.png">
                        </div>
                        <h2>Pengaduan Online</h2>
                        <p>Aplikasi berbasis online sehingga mempercepat proses pengaduan</p>
                    </div>
                    <div class="_card">
                        <div class="icon">
                            <img src="assets/icon/icon-responsive.png">
                        </div>
                        <h2>Responsive Design</h2>
                        <p>Bisa digunakan disemua perangkat dengan tampilan yang menarik</p>
                    </div>
                    <div class="_card">
                        <div class="icon">
                            <img src="assets/icon/icon-happy.png">
                        </div>
                        <h2>Mudah Digunakan</h2>
                        <p>Tampilan yang sederhana memudahmu menggunakan aplikasi kami</p>
                    </div>
                    <div class="_card">
                        <div class="icon">
                            <img src="assets/icon/icon-globe.png">
                        </div>
                        <h2>Bersifat Publik</h2>
                        <p>Kamu bisa melihat pengaduan yang dilaporkan masyarakat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="alurPengaduan">
        <div class="container">
            <div class="alur_pengaduan">
                <div class="text_group">
                    <h2 class="_title">Alur <span class="text_primary">Pengaduan</span></h2>
                    <p class="_desc">Berikut alur pengaduan menggunakan aplikasi Rapor</p>
                </div>
                <div class="step_group">
                    <div class="item">
                        <div class="icon">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </div>
                        <div class="desc">
                            <h2>Tulis Pengaduan</h2>
                            <p>Pertama-tama tuliskan laporanmu yang ingin diajukan ke pihak desa. Pastikan menulis laporan anda dengan jelas.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="fa-solid fa-gears"></i>
                        </div>
                        <div class="desc">
                            <h2>Proses</h2>
                            <p>Laporan anda telah terkirim dan menunggu verifikasi oleh admin/petugas.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                        <div class="desc">
                            <h2>Tindak Lanjut</h2>
                            <p>Laporan anda diterima dan sedang dalam proses tindak lanjut.</p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="desc">
                            <h2>Selesai</h2>
                            <p>Laporan pengaduan telah selesai ditindak.</p>
                        </div>
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
                        <p>Website pengaduan bagi masyarakat untuk melaporkan keluhan mereka kepada instansi publik berbasis online</p>
                    </div>
                </div>
                <div class="nav_group">
                    <div class="_title">
                        <h2>Navigasi</h2>
                    </div>
                    <div class="_items">
                        <a href="#">Beranda</a>
                        <a href="#options">Fitur</a>
                        <a href="#about">Tentang Kami</a>
                        <a href="#alurPengaduan">Alur Pengaduan</a>
                    </div>
                </div>
                <div class="contact_form">
                    <div class="_title">
                        <h2>Kontak kami</h2>
                    </div>
                    <div class="_items">
                        <p>Phone : +6283126902110</p>
                        <p>Email : rapor.id@gmail.com</p>
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
        window.onscroll = function() {
            if (window.pageYOffset > fixedNav) {
                header.classList.add("nav_scroll")
            } else {
                header.classList.remove("nav_scroll")
            }
        }
    </script>
</body>

</html>