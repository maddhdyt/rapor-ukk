<?php

include 'core/conn.php';

include 'core/init_user.php';

// $id = $_GET['id'];

// if ($id != $_SESSION['id']) {
//     header("Location: /rapor-ukk/user_dashboard.php");
// }
$id = $_SESSION['id'];
$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Profil Saya";

include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="container">
    <div class="user_profile">
        <div class="user_info">
            <div class="user">
                <div class="_pic">
                    <i class="fa-solid fa-user"></i>
                    <img src="assets/img/<?= $data['profile'] ?>" onerror="this.style.display='none'">
                </div>
                <div class="_info">
                    <h1><?= $data['nama']; ?></h1>
                    <span>@<?= $data['username']; ?></span>
                </div>
            </div>
        </div>
        <div class="menu">
            <a href="edit_profile.php?id=<?= $_SESSION['id'] ?>" class="option">
                <div class="info">
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <p>Edit Profil</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a href="change_password.php?id=<?= $_SESSION['id'] ?>" class="option">
                <div class="info">
                    <div class="icon">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <p>Ubah Kata Sandi</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a href="user_history.php?id=<?= $_SESSION['id']; ?>" class="option">
                <div class="info">
                    <div class="icon">
                        <i class="fa-solid fa-history"></i>
                    </div>
                    <p>History Pengaduan</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
        <a href="auth/logout.php" class="btn_logout">
            Logout<i class="fa-solid fa-arrow-right-to-bracket"></i>
        </a>
    </div>
</div>

<?php
include 'partials/footer.php';
?>