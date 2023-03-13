<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_GET['id'];

if ($id != $_SESSION['id']) {
    header("Location: error/403_error.php");
}

$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Ubah Password";

include 'partials/header.php';

?>
<header>
        <nav class="nav_user">
            <div class="_container">
                <div class="head_title">
                    <a class="btn_back" href="user_profile.php?id=<?= $_SESSION['id']; ?>">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </nav>
    </header>
<div class="_container">
    <div class="user_pengaduan">
        <?php
        if (isset($_POST['btnChangePass'])) {
            $id = $_POST['id'];
            $old_pass = $_POST['old_pass'];
            $old_pass2 = $_POST['old_pass2'];
            $old_pass2 = md5($old_pass2);
            $passworddef = $_POST['password'];
            $password = md5($passworddef);
            $password2 = $_POST['password2'];
            $password2 = md5($password2);

            if ($old_pass != $old_pass2) {
                echo "<div class='error_alert'>Password lama tidak sesuai</div>";
            } else if ($password != $password2) {
                echo "<div class='error_alert'>Password tidak sesuai</div>";
            } else if (strlen($passworddef) < 8) {
                echo "<div class='error_alert'>Password minimal 8 karakter</div>";
            } else {
                mysqli_query($koneksi, "UPDATE dat_masyarakat SET password = '$password' WHERE id = $id");
                echo "<div class='success_alert'>Password berhasil diubah</div>";
                header("refresh:1; url=user_dashboard.php");
            }
        }
        ?>
        <form action="" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <input type="hidden" name="old_pic" value="<?= $data['profile']; ?>">
            <input type="hidden" name="old_pass" value="<?= $data['password']; ?>">
            <div class="form_group">
                <label for="">Password Lama</label>
                <input type="password" class="form_control" name="old_pass2" required>
            </div>
            <div class="form_group">
                <label for="">Password Baru</label>
                <input type="password" class="form_control" name="password" required>
            </div>
            <div class="form_group">
                <label for="">Konfirmasi Password</label> 
                <input type="password" class="form_control" name="password2" required>
            </div>
            <div class="form_group">
                <input type="submit" name="btnChangePass" value="Ubah Password" class="btn_submit"></input>
            </div>
        </form>
        <div class="menu">

        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>