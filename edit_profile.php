<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_GET['id'];

if ($id != $_SESSION['id']) {
    header("Location: /rapor-ukk/user_dashboard.php");
}

$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Edit Profil";

include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="container">
    <div class="user_pengaduan">
        <?php
        if (isset($_POST['btnUpdateProfile'])) {        
            $id = $_POST['id'];        
            $nik = $_POST['nik'];        
            $nama = $_POST['nama'];        
            $telp = $_POST['telp'];        
            $alamat = $_POST['alamat'];        
            $username = $_POST['username'];        
            $old_pass = $_POST['old_pass'];        
            $old_pic = $_POST['old_pic'];        
            $namafile = $_FILES['gambar']['name'];        
            $ukuran = $_FILES['gambar']['size'];        
            $dir = "assets/img/";        
            $random = rand();
            $tmpFile = $_FILES['gambar']['tmp_name'];        

            if ($namafile === "") {
                mysqli_query($koneksi, "UPDATE dat_masyarakat SET nik = '$nik', nama = '$nama', telp = '$telp', alamat = '$alamat', profile = '$old_pic', username = '$username', password = '$old_pass' WHERE id = $id");
                echo "<div class='success_alert alert'> Akun berhasil diupdate</div>";
                header("refresh:1; url=user_dashboard.php");
            } else {
                $tampil = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = '$id'");
                $data = mysqli_fetch_assoc($tampil);

                if ($data['profile'] != "") {
                    unlink("assets/img/" . $data['profile']);
                }

                move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile);
                $gambar = $random . '_' . $namafile;
                mysqli_query($koneksi, "UPDATE dat_masyarakat SET nik = '$nik', nama = '$nama', telp = '$telp', alamat = '$alamat', profile = '$gambar', username = '$username', password = '$old_pass' WHERE id = $id");
                echo "<div class='success_alert alert'> Akun berhasil diupdate</div>";
                header("refresh:1; url=user_dashboard.php");
            }
        }
        ?>
        <form action="" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <input type="hidden" name="old_pic" value="<?= $data['profile']; ?>">
            <input type="hidden" name="old_pass" value="<?= $data['password']; ?>">
            <div class="form_group">
                <label for="">Update foto profil</label>
                <div class="profile_input">
                    <div class="preview">
                        <i class="fa-solid fa-user"></i>
                        <img src="assets/img/<?= $data['profile'] ?>" onerror="this.style.display='none'">
                    </div>
                    <div class="file_name">
                        <input type="file" name="gambar" id="gambar" accept="image/*" value="true">
                    </div>
                </div>
            </div>
            <div class="form_group">
                <label for="">Username</label>
                <input type="text" class="form_control" name="username" value="<?= $data['username'] ?>">
            </div>
            <div class="form_group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form_control" name="nama" value="<?= $data['nama'] ?>">
            </div>
            <div class="form_group">
                <label for="">NIK</label>
                <input type="text" class="form_control" name="nik" value="<?= $data['nik'] ?>">
            </div>
            <div class="form_group">
                <label for="">No Telp</label>
                <input type="text" class="form_control" name="telp" value="<?= $data['telp'] ?>">
            </div>
            <div class="form_group">
                <label for="">Alamat</label>
                <input type="text" class="form_control" name="alamat" value="<?= $data['alamat'] ?>">
            </div>
            <div class="form_group col-2">
                <input type="submit" name="btnUpdateProfile" value="Simpan Perubahan" class="btn_submit"></input>
            </div>
        </form>
        <div class="menu">

        </div>
    </div>
</div>

<?php
include 'partials/footer.php';
?>