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

if (isset($_POST['btnUpdateProfile'])) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $old_pass = $_POST['old_pass'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    // img
    // $previous = $_POST['previous'];
    // $exp = explode(".", $image_name);
    // $end = end($exp);

    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $dir = "../assets/img/";
    $random = rand();
    $tmpFile = $_FILES['gambar']['tmp_name'];

    if ($password != $password2) {
        echo "<script>alert('Password tidak sama')</script>";
    } else if ($password == "") {
        move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile);
        $gambar = $random . '_' . $namafile;
        mysqli_query($koneksi, "UPDATE dat_masyarakat SET nik = '$nik', nama = '$nama', telp = '$telp', alamat = '$alamat', profile = '$gambar', username = '$username', password = '$old_pass' WHERE id = $id");
        echo "<script>alert('Data akun berhasil diupdate'); 
        document.location='../user_dashboard.php';
        </script>";
    } else {
        move_uploaded_file($tmpFile, $dir . $random . '_' . $namafile);
        $gambar = $random . '_' . $namafile;
        mysqli_query($koneksi, "UPDATE dat_masyarakat SET nik = '$nik', nama = '$nama', telp = '$telp', alamat = '$alamat', profile = '$gambar', username = '$username', password = '$password' WHERE id = $id");
        echo "<script>alert('Data akun berhasil diupdate'); 
        document.location='../user_dashboard.php';
        </script>";
    }

    
}



if(isset($_POST['edit'])){
    $user_id = $_POST['user_id'];
    $image_name = $_FILES['gambar']['name'];
    $image_temp = $_FILES['gambar']['tmp_name'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $previous = $_POST['previous'];
    $exp = explode(".", $image_name);
    $end = end($exp);
    $name = time().".".$end;
    if(!is_dir("./upload"))
        mkdir("upload");
    $path = "upload/".$name;
    $allowed_ext = array("gif", "jpg", "jpeg", "png");
    if(in_array($end, $allowed_ext)){
        if(unlink($previous)){
            if(move_uploaded_file($image_temp, $path)){
                mysqli_query($conn, "UPDATE `user` set `firstname` = '$firstname', `lastname` = '$lastname', `photo` = '$path' WHERE `user_id` = '$user_id'");
                echo "<script>alert('User account updated!')</script>";
                header("location: index.php");
            }
        }		
    }else{
        echo "<script>alert('Image only')</script>";
    }
}
