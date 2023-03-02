<?php

$id = $_GET['id'];

include 'core/conn.php';

$show = mysqli_query($koneksi, "SELECT dat_pengaduan.id, dat_pengaduan.tgl_pengaduan, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.status_pengaduan, dat_pengaduan.deskripsi, dat_masyarakat.nik, dat_masyarakat.nama FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik WHERE dat_pengaduan.id = $id");

// $data = mysqli_query($koneksi, "SELECT dat_pengaduan.id AS id_pengaduan, dat_pengaduan.nik, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.deskripsi, dat_pengaduan.tgl_pengaduan, dat_pengaduan.status_pengaduan, dat_masyarakat.*, dat_tanggapan.*, dat_petugas.* FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik INNER JOIN dat_tanggapan ON dat_pengaduan.id = dat_tanggapan.id_pengaduan INNER JOIN dat_petugas ON dat_tanggapan.id_petugas = dat_petugas.id WHERE dat_pengaduan.id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Detail Pengaduan";
include 'partials/header.php';
include 'partials/nav.php';

?>
<div class="container">
    <div class="pengaduan_detail_wrapper">
        <div class="_content">
            <div class="_banner">
                <img src="assets/img/<?= $data['gambar']; ?>" alt="">
            </div>
            <div class="news_title">
                <h2><?= $data['judul']; ?></h2>
            </div>
            <div class="detail">
                <p><?= $data['deskripsi']; ?></p>
            </div>
            <div class="tanggapan">
                <div class="_title">
                    <h2>Tanggapan</h2>
                </div>
                <?php
                $tgp = mysqli_query($koneksi, "SELECT * FROM dat_tanggapan WHERE id_pengaduan = $id");

                $row = mysqli_fetch_assoc($tgp);
                ?>
                <p>
                    <?= $row['tanggapan'] ?? null; ?>
                </p>
                <?php if (mysqli_num_rows($tgp) <= 0) : ?>
                    <div class="_not_found">
                        <h4>Belum ada tanggapan</h4>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="_info">
            <h2>Informasi Pengaduan</h2>
            <div class="_status">
                <div class="_box <?php if ($data['status_pengaduan'] == 'Diterima') {
                                        echo "done";
                                    } else if ($data['status_pengaduan'] == 'Diproses') {
                                        echo "process";
                                    } else {
                                        echo "reject";
                                    } ?>"><?= $data['status_pengaduan'] ?>
                </div>
            </div>
            <h3>Dilaporkan oleh</h3>
            <div class="user_sender">
                <!-- user picture -->
                <div class="_icon">
                    <i class="fa-regular fa-user"></i>
                    <img src="../assets/img/banner_img.gif" onerror='this.style.display = "none"'>
                </div>
                <!-- username -->
                <p><?= $data['nama']; ?></p>
            </div>
            <h3>Pada tanggal</h3>
            <p class="date"><?= $data['tgl_pengaduan']; ?></p>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>