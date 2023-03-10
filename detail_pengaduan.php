<?php
session_start();
$title = "Detail Pengaduan";
$id = $_GET['id'];
$nik = $_SESSION['nik'] ?? null;

include 'core/conn.php';

$show = mysqli_query($koneksi, "SELECT dat_pengaduan.id, dat_pengaduan.tgl_pengaduan, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.status_pengaduan, dat_pengaduan.deskripsi, dat_pengaduan.kategori, dat_masyarakat.nik, dat_masyarakat.nama, dat_masyarakat.profile FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik WHERE dat_pengaduan.id = $id");

$data = mysqli_fetch_assoc($show);

// jika id tidak ada
if ($id !== $data['id']) {
    echo "<script>document.location='error/404_error.php';</script>";
}

include 'partials/header.php';
include 'partials/nav.php';

?>
<div class="_container">
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
                    <img src="assets/img/<?= $data['profile']; ?>" onerror='this.style.display = "none"'>
                </div>
                <!-- username -->
                <p><?= $data['nama']; ?></p>
            </div>
            <h3>Pada tanggal</h3>
            <p class="date"><?= $data['tgl_pengaduan']; ?></p>
            <div class="tanggapan">
                <h3>Tanggapan</h3>
                <?php
                $tgp = mysqli_query($koneksi, "SELECT * FROM dat_tanggapan WHERE id_pengaduan = $id");

                $row = mysqli_fetch_assoc($tgp);
                ?>
                <p style="word-wrap: break-word;">
                    <?= $row['tanggapan'] ?? null; ?>
                </p>
                <?php if (mysqli_num_rows($tgp) <= 0) : ?>
                    <p class="null_alert">Belum ditanggapi</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>