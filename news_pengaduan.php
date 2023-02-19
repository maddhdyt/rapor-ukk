<?php

include 'koneksi.php';

$title = "Pengaduan Masyarakat";
include 'partials/header.php';
include 'partials/nav.php';
?>
    <div class="container">
        <div class="user_news">
            <div class="_title">
                <p>Pengaduan yang telah dikirimkan oleh masyarakat akan tampil disini</p>
            </div>
            <div class="_list">
                <?php

                $show = mysqli_query($koneksi, "SELECT dat_pengaduan.id, dat_pengaduan.tgl_pengaduan, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.deskripsi, dat_masyarakat.nik, dat_masyarakat.nama FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik ORDER BY id DESC LIMIT 6");
                while ($data = mysqli_fetch_assoc($show)) :
                ?>
                    <div class="card_news">
                        <div class="_banner">
                            <a href="detail_pengaduan.php?id=<?php echo $data['id'] ?>"></a>
                            <img src="gambar/<?= $data['gambar'] ?>">
                        </div>
                        <div class="_title">
                            <p><?= $data['tgl_pengaduan'] ?></p>
                            <a href="detail_pengaduan.php?id=<?php echo $data['id'] ?>"><?= $data['judul'] ?></a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="pagination">
                <div class="btn_control back"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="page active">1</div>
                <div class="page">2</div>
                <div class="page">3</div>
                <div class="btn_control next"><i class="fa-solid fa-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer_content">
                <div class="footer_nav">
                    <div class="_title">
                        <h1>RAPOR!</h1>
                        <p>Website pengaduan bagi masyarakat untuk melaporkan keluhan mereka kepada instansi publik
                            berbasis online</p>
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
                <form class="contact_form">
                    <h2>Kirim Masukan</h2>
                    <input type="text" placeholder="Nama" class="form_control">
                    <input type="text" placeholder="Email" class="form_control">
                    <textarea name="" id="" class="form_control text_area" placeholder="Masukanmu"></textarea>
                    <input type="submit" value="Kirim" class="btn_submit">
                </form>
            </div>
            <div class="copyright">
                <p>&copy;Copyright 2023 Ahmad Hidayat - UKK Rekayasa Perangkat Lunak</p>
            </div>
        </div>
    </footer>
</body>

</html>