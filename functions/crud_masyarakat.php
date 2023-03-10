<?php

include '../core/conn.php';

session_start();
if (isset($_POST['btnDaftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $password2 = $_POST['password2'];
    $password2 = md5($password2);

    // initialize

    $cek_nik = mysqli_query($koneksi, "SELECT nik FROM dat_masyarakat WHERE nik = '$nik'");

    $cek_username = mysqli_query($koneksi, "SELECT username FROM dat_masyarakat WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek_nik)) {
        echo "<script>alert('NIK sudah digunakan');
        history.back();
        </script>";
    } else if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>alert('Username sudah digunakan');
        history.back();
        </script>";
    } else if ($password != $password2) {
        echo "<script>alert('Password tidak sama');
        history.back();
        </script>";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO dat_masyarakat VALUES ('', '$nik', '$nama','$telp', '$alamat', '', '$username', '$password')");

        if ($simpan) {
            echo "<script>alert('Data akun berhasil dibuat');
            document.location='../admin/data_masyarakat.php';
            </script>";
        } else {
            echo "<script>alert('Data akun gagal dibuat');
            document.location='../admin/tambah_masyarakat.php';
            </script>";
        }
    }
}

if (isset($_POST['btnUpdate'])) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];

    $update = mysqli_query($koneksi, "UPDATE dat_masyarakat SET nik = '$nik', nama = '$nama', telp = '$telp', alamat = '$alamat', username = '$username' WHERE id = $id");

    if ($update) {
        echo "<script>alert('Data akun berhasil diupdate');
            document.location='../admin/data_masyarakat.php';
            </script>";
    } else {
        echo "<script>alert('Data akun gagal diupdate');
            document.location='../admin/edit_masyarakat.php';
            </script>";
    }
}

// if (isset($_POST['btnDelete'])) {
//     $id = $_POST['id'];
//     $nik = $_POST['nik'];

//     // delete account
//     $hapus = mysqli_query($koneksi, "DELETE FROM dat_masyarakat WHERE id = $id");
//     // wipe all data
//     $wipe = mysqli_query($koneksi, "DELETE FROM dat_pengaduan WHERE nik = $nik");
    

//     if ($wipe) {
//         echo "<script>alert('Data berhasil dihapus');
//             window.history.back();
//         </script>";
//     } else {
//         echo "<script>alert('Data gagal dihapus')</script>";
//     }
// }

