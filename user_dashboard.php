<?php

include 'core/conn.php';

include 'core/init_user.php';

$nik = $_SESSION['nik'];

$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE nik = $nik");
$data = mysqli_fetch_assoc($show);

$data1 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE nik = $nik");
$total_report = mysqli_num_rows($data1);

$data2 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'Diterima' OR status_pengaduan = 'Ditolak' AND nik = $nik");
$done_report = mysqli_num_rows($data2);

$data3 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'Diproses' AND nik = $nik");
$process_report = mysqli_num_rows($data3);


$title = "Dashboard Masyarakat";

include 'partials/header.php';

?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<header>
    <nav class="nav_user">
        <div class="container">
            <div class="head_title">
                <a href="index.php" class="btn_back">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <div class="logo">
                <a href="#">RAPOR!</a>
            </div>
            <div class="nav_itemsV2">
                <ul>
                    <li><a href="">Beranda</a></li>
                    <li><a href="">Tentang Kami</a></li>
                    <li><a href="">Kategori</a></li>
                    <li><a href="">How it Works?</a></li>
                    <a href="auth/logout.php" class="btn_login">
                        Logout<i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </a>
                </ul>
            </div>
            <div class="nav_toggleV2" onclick="showNavbarV2()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <section class="dashboard_user_menu">
        <div class="user_info">
            <div class="user">
                <div class="_pic">
                    <img src="assets/img/<?php echo $data['profile'] ?>">
                </div>
                <h1><?php echo $_SESSION['nama']; ?></h1>
                <span>@<?php echo $_SESSION['username']; ?></span>
            </div>
            <div class="statistic">
                <div class="_card">
                    <h2>Jumlah Pengaduan</h2>
                    <span><?= $total_report ?></span>
                </div>
                <div class="_card">
                    <h2>Pengaduan Diproses</h2>
                    <span><?= $process_report ?></span>
                </div>
                <div class="_card">
                    <h2>Pengaduan Selesai</h2>
                    <span><?= $done_report ?></span>
                </div>
            </div>
            <div class="menu">
                <a href="edit_profile.php?id=<?= $_SESSION['id']; ?>" class="_btn">Edit Profile</a>
                <a href="user_history.php?id=<?= $_SESSION['id']; ?>" class="_btn"><i class="fa-solid fa-clock-rotate-left"></i></a>
            </div>
        </div>
        <div id="options">
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
                        <h2>Pengaduan Masyarakat</h2>
                        <p>Kamu bisa melihat aduan terkini yang telah dilaporkan masyarakat</p>
                    </div>
                    <div class="btn_group">
                        <a href="news_pengaduan.php" class="_btn">
                            <i class="fa-solid fa-magnifying-glass"></i><span>Jelajahi</span>
                        </a>
                    </div>
                </div>
            </div>
    </section>
    <section class="user_history">
        <div class="_title">
            <h2>History pengaduan</h2><a href="user_history.php">Lihat semua</a>
        </div>
        <div class="history_list">
            <?php
            $nik = $_SESSION['nik'];
            $show = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE nik = $nik ORDER BY id DESC LIMIT 3");

            while ($data = mysqli_fetch_assoc($show)) :
            ?>
                <div class="_card">
                    <div class="aduan_title">
                        <p><?= $data['tgl_pengaduan']; ?></p>
                        <h2><?= $data['judul']; ?></h2>
                    </div>
                    <div class="btn_control">
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
                        <div class="_menu action_toggle">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                            <form action="functions/crud_pengaduan.php" method="post" class="action_menu">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <a href="detail_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-circle-info"></i>Detail</a>
                                <a href="edit_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                <button type="submit" name="btnDelete"><i class="fa-solid fa-trash-can"></i>Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</div>

<?php include 'partials/footer.php'; ?>