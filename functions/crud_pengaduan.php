<?php

session_start();

include '../core/conn.php';

if (isset($_POST['btnDelete'])) {
    $id = $_POST['id'];

    $show = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = '$id'");
    $data = mysqli_fetch_assoc($show);

    if ($data['gambar'] != "") {
        unlink("../assets/img/" . $data['gambar']);
    }
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
    $kategori = $_POST['kategori'];
    $old_pic = $_POST['old_pic'];
    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $dir = "../assets/img/";
    $random = rand();
    $tmpFile = $_FILES['gambar']['tmp_name'];

    if ($namafile == "") {
        mysqli_query($koneksi, "UPDATE dat_pengaduan SET judul = '$judul', deskripsi = '$deskripsi', kategori = '$kategori', gambar = '$old_pic' WHERE id = $id");
        echo "<script>alert('Pengaduan berhasil diubah')</script>";
        header("refresh:1; url=../user_dashboard.php");
    } else {
        $row = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE id = '$id'");
        $data = mysqli_fetch_assoc($row);
        if ($data['gambar'] != "") {
            unlink("../assets/img/" . $data['gambar']);
        }
        move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile);
        $gambar = $random . '_' . $namafile;
        $update = mysqli_query($koneksi, "UPDATE dat_pengaduan SET judul = '$judul', deskripsi = '$deskripsi', kategori = '$kategori', gambar = '$gambar' WHERE id = $id");
        if ($update) {
            echo "<script>alert('Data pengaduan berhasil diubah');
                document.location='../user_dashboard.php';
                </script>";
        } else {
            echo "<script>alert('Data pengaduan gagal diubah');
                document.location='../edit_pengaduan.php';
                </script>";
        }
    }
}
