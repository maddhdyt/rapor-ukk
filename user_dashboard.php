<?php

include 'core/conn.php';

include 'core/init_user.php';

$nik = $_SESSION['nik'];

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
                <a href="index.php" class="btn_back to_home">
                    <i class="fa-solid fa-house"></i>
                </a>
                <h2>Halo, <span><?php echo $_SESSION['nama']; ?></span>!</h2>
            </div>
            <div class="icon_profile" onclick="showMenuProfile()">
                <i class="fa-solid fa-user"></i>
                <div class="profile_menu">
                    <a href="edit_profile.php?id=<?= $_SESSION['id'] ?>"><i class="fa-solid fa-pen-to-square"></i>Edit Profile</a>
                    <a href="auth/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <section class="dashboard_user_menu">
        <div class="_title">
            <h2>Selamat datang di RAPOR!</h2>
            <p>Punya keluhan? Lapor disini</p>
        </div>
        <div id="options">
            <div class="user_menu">
                <div class="_card">
                    <div class="_title">
                        <h2>Tulis Pengaduan</h2>
                        <p>Pengaduan akan dikirim dan diverifikasi oleh admin </p>
                    </div>
                    <div class="btn_group">
                        <div class="_icon">
                            <img src="assets/img/document.png" alt="">
                        </div>
                        <a href="form_pengaduan.php" class="_btn">
                            <i class="fa-solid fa-plus"></i><span>Laporan</span>
                        </a>
                    </div>
                </div>
                <div class="_card">
                    <div class="_title">
                        <h2>Pengaduan Masyarakat</h2>
                        <p>Kamu bisa melihat aduan terkini yang telah dilaporkan masyarakat</p>
                    </div>
                    <div class="btn_group">
                        <div class="_icon">
                            <img src="assets/img/newspaper.png" alt="">
                        </div>
                        <a href="news_pengaduan.php" class="_btn">
                            <span>Jelajahi</span>
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