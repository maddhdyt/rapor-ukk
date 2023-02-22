<?php

include 'core/conn.php';

include 'core/init_user.php';

$title = "Form Pengaduan";
include 'partials/header.php';
include 'partials/nav.php';

?>
<div class="container">
    <div class="user_pengaduan">
        <div class="_title">
            <p>Tuliskan pengaduanmu dengan mengisi form dibawah ini,
                pastikan menulis laporan dengan jelas!</p>
        </div>
        <form action="functions/crud_pengaduan.php" method="post" class="form_pengaduan" enctype="multipart/form-data">
            <div class="form_group">
                <input type="text" name="judul" placeholder="Judul pengaduan" class="form_control" required>
            </div>
            <div class="form_group">
                <textarea name="deskripsi" id="isiPengduan" class="form_control text_area" placeholder="Isi laporan beserta lokasi yang jelas" required></textarea>
            </div>
            <div class="form_group">
                <input type="file" name="gambar" placeholder="Judul pengaduan" class="form_control" accept="image/*">
            </div>
            <div class="form_group">
                <input type="submit" name="btnSave" value="Kirim Laporan" class="btn_submit"></input>
            </div>
        </form>
    </div>
</div>
<?php
include 'partials/footer.php';
?>