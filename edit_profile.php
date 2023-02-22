<?php

include 'core/conn.php';

include 'core/init_user.php';

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
        <form action="" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <div class="form_group">
                <label for="">Username</label>
                <input type="text" class="form_control" disabled>
            </div>
            <div class="form_group">
                <label for="">NIK</label>
                <input type="text" class="form_control">
            </div>
            <div class="form_group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form_control">
            </div>
            <div class="form_group">
                <label for="">No Telp</label>
                <input type="text" class="form_control">
            </div>
            <div class="form_group">
                <label for="">Alamat</label>
                <input type="text" class="form_control">
            </div>
            <div class="form_group">
                <label for="">Tambahkan foto profil</label>
                <div class="profile_input">
                    <div class="preview">
                        <i class="fa-solid fa-user"></i>
                        <!-- <img src=""> -->
                    </div>
                    <div class="file_name">
                        <p>No file choosen</p>
                    </div>
                </div>
            </div>
            <div class="form_group">
                <label for="">Ubah Password</label>
                <input type="password" class="form_control" placeholder="Password Baru">
                <input type="password" class="form_control" placeholder="Konfirmasi Password">
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