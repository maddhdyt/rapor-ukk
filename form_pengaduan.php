<?php

include 'core/conn.php';

include 'core/init_user.php';

$title = "Ajukan Pengaduan";
include 'partials/header.php';
include 'partials/nav.php';

?>
<div class="_container">
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
            $kategori = $_POST['kategori'];
            $tgl_pengaduan = date('Y-m-d');

            $namafile = $_FILES['gambar']['name'];
            $ukuran = $_FILES['gambar']['size'];
            $dir = "assets/img/";
            $random = rand();
            $tmpFile = $_FILES['gambar']['tmp_name'];

            if ($ukuran < 1044070) {
                move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile);
                $gambar = $random . '_' . $namafile;
                mysqli_query($koneksi, "INSERT INTO dat_pengaduan (id, nik, judul, deskripsi, gambar, tgl_pengaduan, status_pengaduan, kategori) VALUES('', '$nik', '$judul', '$deskripsi', '$gambar', '$tgl_pengaduan', 'Diproses', '$kategori')");
                echo "<div class='success_alert'>Pengaduan berhasil dikirim</div>";
                header("refresh:1; url=user_dashboard.php");
            } else {
                echo "<div class='error_alert'>Gagal mengirim, file terlalu besar<i class='fa-solid fa-xmark' onclick='hideAlert()''></i></div>";
            }
        }
        ?>
        <form action="" method="post" class="edit_pengaduan" enctype="multipart/form-data">
            <div class="form_group">
                <label for="">Judul Pengaduan</label>
                <input name="judul" type="text" class="form_control" value="<?= $_POST['judul'] ?? null ?>" required>
            </div>
            <div class="form_group">
                <label for="">Deskripsi Pengaduan</label>
                <textarea name="deskripsi" id="isiPengduan" class="form_control text_area" required></textarea>
            </div>
            <div class="form_group">
                <select name="kategori" class="select form_control" id="">
                    <option value="public">
                        Public
                    </option>
                    <option value="private">
                        Private
                    </option>
                </select>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="form_group">
                <label for="">Upload Gambar</label>
                <input name="gambar" type="file" accept="image/*">
            </div>
            <div class="form_group">
                <input type="submit" name="btnSave" value="Kirim" class="btn_submit"></input>
            </div>
        </form>
    </div>
</div>
<?php include 'partials/footer.php'; ?>