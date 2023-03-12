<?php

include '../core/conn.php';

session_start();
if (isset($_SESSION['login_admin'])) {
    header("Location: ../admin/dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en" translate="no">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google" content="notranslate" />
    <title>Login Admin - RAPOR!</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="../assets/icon/logo-rapor.svg" type="image/x-icon">
</head>

<body>
    <div class="_container">
        <div class="form_enter_container">
            <div class="form_title">
                <a href="../index.php">RAPOR!</a>
                <p>Login admin dan petugas untuk mengelola pengaduan</p>
            </div>
            <?php
            if (isset($_POST['btnMasuk'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = md5($password);

                $data = mysqli_query($koneksi, "SELECT * FROM dat_petugas WHERE username = '$username'");

                if (mysqli_num_rows($data) === 1) {
                    $baris = mysqli_fetch_assoc($data);
                    if ($password == $baris['password']) {
                        echo "<div class='success_alert'> Login berhasil...</div>";
                        header("refresh:2; url=../admin/dashboard.php");
                        $_SESSION['id_petugas'] = $baris['id'];
                        $_SESSION['login_admin'] = true;
                        $_SESSION['name'] = $baris['nama_petugas'];
                        $_SESSION['telp'] = $baris['telp'];
                        $_SESSION['level'] = $baris['level'];
                        exit;
                    } else {
                        echo "<div class='error_alert'> Username atau password salah <i class='fa-solid fa-xmark' onclick='hideAlert()''></i></div>";
                    }
                } else {
                    echo "<div class='error_alert'> Username atau password salah <i class='fa-solid fa-xmark' onclick='hideAlert()''></i></div>";
                }
            }
            ?>
            <form class="form" action="" method="post">
                <div class="form_group">
                    <input type="text" placeholder="Username" id="input username" class="form_control" name="username" required>
                </div>
                <div class="form_group">
                    <input type="password" placeholder="Password" class="form_control input_password" name="password" required><i class="fa-regular fa-eye" onclick="showPassword()"></i>
                </div>
                <div class="form_group">
                    <input type="submit" value="Login" class="btn_submit" name="btnMasuk"></input>
                </div>
            </form>
        </div>
    </div>
    <script src="../assets/js/main.js"></script>
</body>

</html>