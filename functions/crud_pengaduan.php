<?php

session_start();

include '../core/conn.php';

if (isset($_POST['btnSave'])) {
    $nik = $_SESSION['nik'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_pengaduan = date('Y-m-d');

    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $dir = "../assets/img/";
    $random = rand();
    $tmpFile = $_FILES['gambar']['tmp_name'];

    if ($ukuran < 1044070) {
        move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile);
        $gambar = $random . '_' . $namafile;
        mysqli_query($koneksi, "INSERT INTO dat_pengaduan (id, nik, judul, deskripsi, gambar, tgl_pengaduan, status_pengaduan)
        VALUES('', '$nik', '$judul', '$deskripsi', '$gambar', '$tgl_pengaduan', 'Diproses')");
        echo "<script>alert('Data berhasil disimpan'); document.location='../user_dashboard.php'</script>";
    } else {
        echo "<script>alert('Data gagal disimpan File terlalu besar'); document.location='../form_pengaduan.php'</script>";
    }
}

if (isset($_POST['btnDelete'])) {
    $id = $_POST['id'];

    $show = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = '$id'");
    $ambil = mysqli_fetch_assoc($show);

    unlink("../assets/img/" . $ambil['gambar']);
    $hapus = mysqli_query($koneksi, "DELETE FROM dat_pengaduan WHERE id = '$id'");

    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus');
            window.history.back();
        </script>";
    } else {
        echo "<script>alert('Data gagal dihapus')</script>";
    }
}

if (isset($_POST['btnUpdate'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($koneksi, "UPDATE dat_pengaduan SET judul = '$judul', deskripsi = '$deskripsi' WHERE id = $id");

    if ($update) {
        echo "<script>alert('Data pengaduan berhasil diupdate');
            document.location='../user_dashboard.php';
            </script>";
    } else {
        echo "<script>alert('Data pengaduan gagal diupdate');
            document.location='../edit_pengaduan.php';
            </script>";
    }
}