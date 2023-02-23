<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_GET['id'];

$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Edit Profile";

include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="container">
    <div class="user_pengaduan">
        <div class="_title">
            <p>Kamu bisa mengedit data diri dan mengubah password kamu di halaman ini,
                pastikan data diri yang kamu masukan benar!</p>
        </div>
        <form action="functions/crud_pengaduan.php" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id']?>">
            <input type="hidden" name="previous" value="<?= $data['gambar']?>">
            <input type="hidden" name="old_pass" value="<?= $data['password']?>">
            <div class="form_group">
                <label for="">Username</label>
                <input type="text" class="form_control" name="username" value="<?= $data['username'] ?>">
            </div>
            <div class="form_group">
                <label for="">NIK</label>
                <input type="text" class="form_control" name="nik" value="<?= $data['nik'] ?>">
            </div>
            <div class="form_group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form_control" name="nama" value="<?= $data['nama'] ?>">
            </div>
            <div class="form_group">
                <label for="">No Telp</label>
                <input type="text" class="form_control" name="telp" value="<?= $data['telp'] ?>">
            </div>
            <div class="form_group">
                <label for="">Alamat</label>
                <input type="text" class="form_control" name="alamat" value="<?= $data['alamat'] ?>">
            </div>
            <div class="form_group">
                <label for="">Update foto profil</label>
                <div class="profile_input">
                    <div class="preview">
                        <i class="fa-solid fa-user"></i>
                        <img src="assets/img/<?= $data['gambar'] ?>">
                    </div>
                    <div class="file_name">
                    <input type="file" name="gambar" accept="image/*" value="true">
                    </div>
                </div>
            </div>
            <div class="form_group">
                <label for="">Ubah Password</label>
                <input type="password" name="password" class="form_control" placeholder="Password Baru">
                <input type="password" name="password2" class="form_control" placeholder="Konfirmasi Password">
            </div>
            <div class="form_group">
                <input type="submit" name="btnUpdateProfile" value="Simpan Perubahan" class="btn_submit"></input>
            </div>
        </form>
    </div>

</div>

<?php
include 'partials/footer.php';
?>