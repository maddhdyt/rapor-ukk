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
        <?php
        if (isset($_POST['btnSave'])) {
            $nik = $_SESSION['nik'];
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $tgl_pengaduan = date('Y-m-d');

            $namafile = $_FILES['gambar']['name'];
            $ukuran = $_FILES['gambar']['size'];
            $dir = "assets/img/";
            $random = rand();
            $tmpFile = $_FILES['gambar']['tmp_name'];

            if ($ukuran < 1044070) {
                move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile);
                $gambar = $random . '_' . $namafile;
                mysqli_query($koneksi, "INSERT INTO dat_pengaduan (id, nik, judul, deskripsi, gambar, tgl_pengaduan, status_pengaduan)
                    VALUES('', '$nik', '$judul', '$deskripsi', '$gambar', '$tgl_pengaduan', 'Diproses')");
                echo "<div class='alert success_alert'>Pengaduan berhasil dikirim</div>";
                header("refresh:1; url=user_dashboard.php");
            } else {
                echo "<div class='alert error_alert'>Gagal mengirim, file terlalu besar<i class='fa-solid fa-xmark' onclick='hideAlert()''></i></div>";
            }
        }
        ?>
        <form action="" method="post" class="form_pengaduan" enctype="multipart/form-data">
            <div class="form_group">
                <input type="text" name="judul" placeholder="Judul pengaduan" class="form_control" required>
            </div>
            <div class="form_group">
                <textarea name="deskripsi" id="isiPengduan" class="form_control text_area" placeholder="Isi laporan beserta lokasi yang jelas" required></textarea>
            </div>
            <div class="form_group" style="display: flex; flex-direction: column; align-items: start;">
                <label for="" style="font-size: 16px; font-weight: 600; margin-bottom: 15px;">Upload Gambar</label>
                <input type="file" name="gambar" placeholder="Judul pengaduan" accept="image/*">
            </div>
            <div class="form_group">
                <input type="submit" name="btnSave" value="Kirim" class="btn_submit"></input>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/main.js"></script>
</body>

</html>