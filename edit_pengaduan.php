<?php

include 'koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

$title = "Edit Pengaduan";
include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="container">
    <div class="user_pengaduan">
        <form action="" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <div class="form_group">
                <label for="">Judul Pengaduan</label>
                <input type="text" class="form_control">
            </div>
            <div class="form_group">
                <label for="">Deskripsi Pengaduan</label>
                <textarea name="" id="" class="form_control text_area"></textarea>
            </div>
            <div class="form_group">
                <label for="">Gambar</label>
                <input type="file" class="form_control">
            </div>
            <div class="form_group">
                <input type="submit" name="btnUpdate" value="Simpan Perubahan" class="btn_submit"></input>
            </div>
        </form>
    </div>

</div>

<?php
include 'partials/footer.php';
?>