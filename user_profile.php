<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_SESSION['id'];

if ($id != $_SESSION['id']) {
    header("Location: /rapor-ukk/user_dashboard.php");
}
$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Profil Saya";

include 'partials/header.php';

?>
<header>
    <nav class="nav_user">
        <div class="_container">
            <div class="head_title">
                <a class="btn_back" href="user_dashboard.php">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <h1><?= $title ?></h1>
            </div>
        </div>
    </nav>
</header>
<div class="_container">
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
                        <i class="fa-solid fa-user-pen"></i>
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

        <button class="btn_logout" data-bs-toggle="modal" data-bs-target="#confirmModal">
            Logout<i class="fa-solid fa-arrow-right-to-bracket"></i>
        </button>
    </div>
</div>
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <p>Yakin keluar akun?</p>
            </div>
            <div class="modal-footer border-0 p-0 m-0">
                <div class="btn_group">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <a href="auth/logout.php" class="btn btn-confirm">Keluar</a>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>