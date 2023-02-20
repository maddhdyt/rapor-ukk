<?php

$id = $_GET['id'];

include 'koneksi.php';

// $show = mysqli_query($koneksi, "SELECT dat_pengaduan.id, dat_pengaduan.tgl_pengaduan, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.status_pengaduan, dat_pengaduan.deskripsi, dat_masyarakat.nik, dat_masyarakat.nama FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik WHERE dat_pengaduan.id = $id");


$data = mysqli_query($koneksi, "SELECT dat_pengaduan.id AS id_pengaduan, dat_pengaduan.nik, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.deskripsi, dat_pengaduan.tgl_pengaduan, dat_pengaduan.status_pengaduan, dat_masyarakat.*, dat_tanggapan.*, dat_petugas.* FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik INNER JOIN dat_tanggapan ON dat_pengaduan.id = dat_tanggapan.id_pengaduan INNER JOIN dat_petugas ON dat_tanggapan.id_petugas = dat_petugas.id WHERE dat_pengaduan.id = $id");

$pengaduan = mysqli_fetch_assoc($data);

// $status = $pengaduan['status_pengaduan'];

$title = "Detail Pengaduan";
include 'partials/header.php';
include 'partials/nav.php';

?>
<div class="container">
    <div class="pengaduan_detail_wrapper">
        <div class="_content">
            <div class="_banner">
                <img src="gambar/<?= $pengaduan['gambar']; ?>" alt="">
            </div>
            <div class="news_title">
                <p><?= $pengaduan['tgl_pengaduan']; ?></p>
                <h2><?= $pengaduan['judul']; ?></h2>
            </div>
            <div class="detail">
                <p><?= $pengaduan['deskripsi']; ?></p>
            </div>
            <div class="tanggapan">
                <div class="_title">
                    <h2>Tanggapan</h2>
                </div>
                
                <p>
                    <?= $pengaduan['tanggapan'] ?? []?>
                </p>
                <!-- <div class="_not_found">
                    <h4>Belum ada tanggapan</h4>
                </div> -->
            </div>
        </div>
        <div class="_info">
            <h2>Informasi Pengaduan</h2>
            <div class="_status">
                <div class="_box <?php if ($pengaduan['status_pengaduan'] == 'Diterima') {echo "done";} else if  ($pengaduan['status_pengaduan'] == 'Diproses') {echo "process";} else {echo "reject";} ?>"><?= $pengaduan['status_pengaduan'] ?></div>
            </div>
            <h3>Dilaporkan oleh</h3>
            <div class="user_sender">
                <!-- user picture -->
                <div class="_icon">
                    <i class="fa-regular fa-user"></i>
                    <img src="../assets/img/banner_img.gif" onerror='this.style.display = "none"'>
                </div>
                <!-- username -->
                <p><?= $pengaduan['nama']; ?></p>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>