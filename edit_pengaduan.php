<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_GET['id'];

$nik = $_SESSION['nik'];

$show = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = $id");

$data = mysqli_fetch_assoc($show);

if ($data['nik'] != $nik) {
    echo "<script>document.location='error/403_error.php';</script>";
}

$title = "Edit Pengaduan";
include 'partials/header.php';
include 'partials/nav.php';

?>

<div class="_container">
    <div class="user_pengaduan">
        <form action="functions/crud_pengaduan.php" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <input type="hidden" name="old_pic" value="<?= $data['gambar'] ?>">
            <div class="form_group">
                <label for="">Judul Pengaduan</label>
                <input name="judul" type="text" class="form_control" value="<?= $data['judul']?>">
            </div>
            <div class="form_group">
                <label for="">Deskripsi Pengaduan</label>
                <textarea name="deskripsi" id="" class="form_control text_area"><?= $data['deskripsi']?></textarea>
            </div>
            <div class="form_group">
                <select name="kategori" class="select form_control" id="">
                    <option value="public" <?= $data['kategori'] == 'public' ? 'selected' : '' ?>>
                        Public
                    </option>
                    <option value="private" <?= $data['kategori'] == 'private' ? 'selected' : '' ?>>
                        Private
                    </option>
                </select>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="form_group">
                <label for="">Ubah Gambar</label>
                <input type="file" name="gambar" accept="image/*"  value="true">
            </div>
            <div class="form_group">
                <input type="submit" name="btnUpdate" value="Simpan" class="btn_submit"></input>
            </div>
        </form>
    </div>

</div>
<?php include 'partials/footer.php'; ?>