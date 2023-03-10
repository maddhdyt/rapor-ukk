<?php

include '../core/conn.php';

session_start();
if (isset($_SESSION['login'])) {
    header("Location: ../user_dashboard.php");
}

// if (isset($_POST['btnMasuk'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $data = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE username = '$username'");

//     if (mysqli_num_rows($data) === 1) {
//         $baris = mysqli_fetch_assoc($data);
//         if ($password == $baris['password']) {

//             header("Location: ../user_dashboard.php");
//             $_SESSION['id'] = $baris['id'];
//             $_SESSION['login'] = true;
//             $_SESSION['nik'] = $baris['nik'];
//             $_SESSION['nama'] = $baris['nama'];
//             $_SESSION['username'] = $baris['username'];
//             $_SESSION['profile'] = $baris['profile'];
//             exit;
//         } else {
//             echo "<script>alert('username atau password salah')</script>";
//         }
//     } else {
//         echo "<script>alert('username atau password salah')</script>";
//     }
// }

$title = "Login";

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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.min.css">
</head>

<body>
    <div class="_container">
        <div class="form_enter_container">
            <div class="form_title">
                <a href="../index.php">RAPOR!</a>
                <p>Login terlebih dahulu untuk melanjutkan</p>
            </div>
            <?php
            if (isset($_POST['btnMasuk'])) : ?>
                <?php
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = md5($password);

                $data = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE username = '$username'");
                if (mysqli_num_rows($data) === 1) : ?>
                    <?php $baris = mysqli_fetch_assoc($data);
                    if ($password == $baris['password']) : ?>
                        <div class="success_alert"> Login berhasil...</div>
                        <?php
                        header("refresh:2; url=../user_dashboard.php");
                        $_SESSION['id'] = $baris['id'];
                        $_SESSION['login'] = true;
                        $_SESSION['nik'] = $baris['nik'];
                        $_SESSION['nama'] = $baris['nama'];
                        $_SESSION['username'] = $baris['username'];
                        $_SESSION['profile'] = $baris['profile'];
                        exit; ?>
                    <?php else : ?>
                        <div class="error_alert"> Username atau password salah</div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="error_alert"> Username atau password salah</div>
                <?php endif; ?>
            <?php endif; ?>

            <form class="form" action="" method="post">
                <div class="form_group">
                    <input type="text" placeholder="Username" id="input username" class="form_control" name="username" value="<?php echo $_POST['username'] ?? null; ?>" required>
                </div>
                <div class="form_group">
                    <input type="password" placeholder="Password" class="form_control input_password" name="password" value="<?php echo $_POST['password'] ?? null; ?>" required><i class="fa-regular fa-eye" onclick="showPassword()"></i>
                </div>
                <div class="form_group">
                    <input type="submit" value="Login" class="btn_submit" name="btnMasuk"></input>
                </div>
            </form>
            <div class="link">
                <div class="to_another">Belum punya akun? <a href="register.php">Daftar</a></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/main.js"></script>
</body>

</html>