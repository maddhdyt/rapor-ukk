<?php

include '../core/conn.php';

session_start();

if (isset($_POST['btnDaftar'])) {
    $name = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $password2 = $_POST['password2'];
    $password2 = md5($password2);

    // initialize

    $cek_username = mysqli_query($koneksi, "SELECT username FROM dat_petugas WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>alert('Username sudah digunakan')</script>";
    } else if ($password != $password2) {
        echo "<script>alert('Password tidak sama')</script>";
    } else {

        $simpan = mysqli_query($koneksi, "INSERT INTO dat_petugas VALUES ('', '$name','$telp', '$level', '$username', '$password')");

        if ($simpan) {
            echo "<script>alert('Data akun berhasil dibuat');
            document.location='../admin/data_petugas.php';
            </script>";
        } else {
            echo "<script>alert('Data akun gagal dibuat');
            document.location='../admin/tambah_petugas.php';
            </script>";
        }
    }
}

if (isset($_POST['btnUbah'])) {
    $id = $_POST['id'];
    $name = $_POST['nama_petugas'];
    $telp = $_POST['telp'];
    $level = $_POST['level'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $password2 = $_POST['password2'];
    $password2 = md5($password2);
    $password_lama = $_POST['password_lama'];

    if ($password != $password2) {
        echo "<script>alert('Password tidak sama');
        document.location='../admin/data_petugas.php';</script>";
    } else if ($password == "" || $password2 == "") {
        mysqli_query($koneksi, "UPDATE dat_petugas SET nama_petugas = '$name', telp = '$telp', level = '$level', username = '$username', password = '$password_lama' WHERE id = $id");
        echo "<script>alert('Data akun berhasil diupdate');
            document.location='../admin/data_petugas.php';
            </script>";
    } else {
        mysqli_query($koneksi, "UPDATE dat_petugas SET nama_petugas = '$name', telp = '$telp', level = '$level', username = '$username', password = '$password' WHERE id = $id");
        echo "<script>alert('Data akun berhasil diupdate');
            document.location='../admin/data_petugas.php';
            </script>";
    }
}

if (isset($_POST['btnDelete'])) {
    $id = $_POST['id'];


    if ($id === $_SESSION['id_petugas']) {
       echo "<script>alert('Gagal, akun sedang dipakai') </script>";
    } else {
        $hapus = mysqli_query($koneksi, "DELETE FROM dat_petugas WHERE id = '$id'");
        if ($hapus) {
            echo "<script>alert('Data berhasil dihapus');
            window.history.back();
        </script>";
        } else {
            echo "<script>alert('Gagal dihapus')</script>";
        }
    }
}
