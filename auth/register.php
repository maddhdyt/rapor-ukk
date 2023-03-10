<?php
include '../core/conn.php';

// if (isset($_POST['btnDaftar'])) {
//     $nik = $_POST['nik'];
//     $nama = $_POST['nama'];
//     $telp = $_POST['telp'];
//     $alamat = $_POST['alamat'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $password2 = $_POST['password2'];

//     // initialize

//     if (mysqli_fetch_assoc($cek_nik)) {
//         echo "<script>alert('NIK sudah digunakan')</script>";
//     } else if (mysqli_fetch_assoc($cek_username)) {
//         echo "<script>alert('Username sudah digunakan')</script>";
//     } else if ($password != $password2) {
//         echo "<script>alert('Password tidak sama')</script>";
//     } else {

//         $simpan = mysqli_query($koneksi, "INSERT INTO dat_masyarakat VALUES ('', '$nik', '$nama','$telp', '$alamat', '', '$username', '$password')");

//         if ($simpan) {
//             echo "<script>alert('Data akun berhasil dibuat');
//             </script>";
//         } else {
//             echo "<script>alert('Data akun gagal dibuat');
//             document.location='register.php';
//             </script>";
//         }
//     }
// }

$title = "Register";
?>
<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate" />
    <title><?= $title ?> - RAPOR!</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.min.css">
</head>

<body>
    <div class="_container">
        <div class="form_enter_container">
            <div class="form_title">
                <a href="../index.php">RAPOR</a>
                <p>Sebelum mengajukan laporan anda harus membuat akun terlebih dahulu</p>
            </div>
            <?php
            if (isset($_POST['btnDaftar'])) : ?>
                <?php
                $nik = $_POST['nik'];
                $nama = $_POST['nama'];
                $telp = $_POST['telp'];
                $alamat = $_POST['alamat'];
                $username = $_POST['username'];
                $passworddef = $_POST['password'];
                $password = md5($passworddef);
                $password2 = $_POST['password2'];
                $password2 = md5($password2);

                $cek_nik = mysqli_query($koneksi, "SELECT nik FROM dat_masyarakat WHERE nik = '$nik'");

                $cek_username = mysqli_query($koneksi, "SELECT username FROM dat_masyarakat WHERE username = '$username'");

                if (mysqli_fetch_assoc($cek_nik)) : ?>
                    <div class="error_alert"> Nik sudah digunakan</i></div>
                <?php elseif (strlen($nik) < 16 || strlen($nik) > 16) : ?>
                    <div class="error_alert"> Nik harus 16 angka</i></div>
                <?php elseif (strlen($passworddef) < 8) : ?>
                    <div class="error_alert"> Password minimal 8 karakter</i></div>
                <?php elseif (mysqli_fetch_assoc($cek_username)) : ?>
                    <div class="error_alert"> Username sudah digunakan</i></div>
                <?php elseif ($password != $password2) : ?>
                    <div class="error_alert"> Password tidak sama</i></div>
                <?php else : ?>
                    <?php $simpan = mysqli_query($koneksi, "INSERT INTO dat_masyarakat VALUES ('', '$nik', '$nama','$telp', '$alamat', '', '$username', '$password')");
                    if ($simpan) : ?>
                        <div class="success_alert"> Akun berhasil dibuat, silahkan login</div>
                        <?php header("refresh:1; url=login.php"); ?>
                    <?php else : ?>
                        <div class="error_alert"> Akun gagal dibuat</i></div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <form class="form" action="" method="post">
                <div class="form_group">
                    <input type="number" name="nik" placeholder="NIK" class="form_control" value="<?php echo $_POST['nik'] ?? null; ?>" required>
                </div>
                <div class="form_group">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form_control" value="<?php echo $_POST['nama'] ?? null; ?>" required>
                </div>
                <div class="form_group">
                    <input type="text" name="telp" placeholder="No Telp" class="form_control" value="<?php echo $_POST['telp'] ?? null; ?>" required>
                </div>
                <div class="form_group">
                    <input type="text" name="alamat" placeholder="Alamat" class="form_control" value="<?php echo $_POST['alamat'] ?? null; ?>" required>
                </div>
                <div class="form_group">
                    <input type="text" name="username" placeholder="Username" class="form_control" value="<?php echo $_POST['username'] ?? null; ?>" required>
                </div>
                <div class="form_group">
                    <input type="password" name="password" placeholder="Password" class="form_control input_password" value="<?php echo $_POST['password'] ?? null; ?>" required><i class="fa-regular fa-eye" onclick="showPassword()"></i>
                </div>
                <div class="form_group">
                    <input type="password" name="password2" placeholder="Konfirmasi Password" class="form_control input_password" value="<?php echo $_POST['password2'] ?? null; ?>" required><i class="fa-regular fa-eye" onclick="showPassword()"></i>
                </div>
                <div class="form_group">
                    <input type="submit" name="btnDaftar" value="Daftar" class="btn_submit"></input>
                </div>
            </form>
            <div class="link">
                <div class="to_another">Sudah punya akun? <a href="login.php">Login</a></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/main.js"></script>

</body>

</html>