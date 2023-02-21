<?php
include 'koneksi.php';

if (isset($_POST['btnDaftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // initialize

    $cek_nik = mysqli_query($koneksi, "SELECT nik FROM dat_masyarakat WHERE nik = '$nik'");

    $cek_username = mysqli_query($koneksi, "SELECT username FROM dat_masyarakat WHERE username = '$username'");

    if (mysqli_fetch_assoc($cek_nik)) {
        echo "<script>alert('NIK sudah digunakan')</script>";
    } else if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>alert('Username sudah digunakan')</script>";
    } else if ($password != $password2) {
        echo "<script>alert('Password tidak sama')</script>";
    } else {

        $simpan = mysqli_query($koneksi, "INSERT INTO dat_masyarakat VALUES ('', '$nik', '$nama','$telp', '$alamat', '$username', '$password')");

        if ($simpan) {
            echo "<script>alert('Data akun berhasil dibuat');
            document.location='login.php';
            </script>";
        } else {
            echo "<script>alert('Data akun gagal dibuat');
            document.location='register.php';
            </script>";
        }
    }
}

$title = "Register";
include 'partials/header.php';
?>

    <div class="container">
        <div class="form_enter_container">
            <form class="form" action="" method="post">
                <div class="form_title">
                    <h1>RAPOR</h1>
                    <p>Sebelum mengajukan laporan anda harus membuat akun terlebih dahulu </p>
                </div>
                <div class="form_group">
                    <input type="text" name="nik" placeholder="NIK" class="form_control">
                </div>
                <div class="form_group">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form_control">
                </div>
                <div class="form_group">
                    <input type="text" name="telp" placeholder="No Telp" class="form_control">
                </div>
                <div class="form_group">
                    <input type="text" name="alamat" placeholder="Alamat" class="form_control">
                </div>
                <div class="form_group">
                    <input type="text" name="username" placeholder="Username" class="form_control">
                </div>
                <div class="form_group">
                    <input type="password" name="password" placeholder="Password" class="form_control input_password"><i class="fa-regular fa-eye" onclick="showPassword()"></i>
                </div>
                <div class="form_group">
                    <input type="password" name="password2" placeholder="Konfirmasi Password" class="form_control input_password"><i class="fa-regular fa-eye" onclick="showPassword()"></i>
                </div>
                <div class="form_group">
                    <input type="submit" value="Daftar" class="btn_submit" name="btnDaftar"></input>
                </div>
            </form>
            <div class="link">
                <div class="to_another">Sudah punya akun? <a href="login.php">Login</a></div>
                <a href="index.php" class="to_home"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kembali</a>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
</body>

</html>