<?php

include '../koneksi.php';

session_start();
if (isset($_POST['btnSimpan'])) {

    $id_petugas = $_SESSION['id'];
    $id_pengaduan = $_POST['id'];
    $tgl_tanggapan = date('Y-m-d');

    $tanggapan = $_POST['tanggapan'];
    $status_pengaduan = $_POST['status_pengaduan'];


    $simpan = mysqli_query($koneksi, "INSERT INTO dat_tanggapan VALUES ('', '$id_pengaduan', '$id_petugas', '$tgl_tanggapan', '$tanggapan')");


    $simpan = mysqli_query($koneksi, "UPDATE dat_pengaduan SET status_pengaduan = '$status_pengaduan' WHERE id = '$id_pengaduan'");

    if ($simpan) {
        echo "<script>alert('Data berhasil disimpan'); document.location='kelola_pengaduan.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');
        document.location='kelola_pengaduan.php';</script>
        </script>";
    }
}
