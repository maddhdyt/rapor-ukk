<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_GET['id'];

$show = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Edit Pengaduan";
include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="container">
    <div class="user_pengaduan">
        <form action="functions/crud_pengaduan.php" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form_group">
                <label for="">Judul Pengaduan</label>
                <input name="judul" type="text" class="form_control" value="<?= $data['judul']?>">
            </div>
            <div class="form_group">
                <label for="">Deskripsi Pengaduan</label>
                <textarea name="deskripsi" id="" class="form_control text_area"><?= $data['deskripsi']?></textarea>
            </div>
            <div class="form_group">
                <label for="">Gambar</label>
                <input type="file" class="form_control" value="<?= $data['gambar']?>">
            </div>
            <div class="form_group">
                <input type="submit" name="btnUpdate" value="Simpan" class="btn_submit"></input>
            </div>
        </form>
    </div>

</div>

<?php
include 'partials/footer.php';
?>