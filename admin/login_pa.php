<?php

include '../koneksi.php';

session_start();
if (isset($_SESSION['login_admin'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['btnMasuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM dat_petugas WHERE username = '$username'");

    if (mysqli_num_rows($data) === 1) {
        $baris = mysqli_fetch_assoc($data);
        if ($password == $baris['password']) {

            header("Location: dashboard.php");
            $_SESSION['id'] = $baris['id'];
            $_SESSION['login_admin'] = true;
            $_SESSION['name'] = $baris['nama_petugas'];
            $_SESSION['telp'] = $baris['telp'];
            $_SESSION['level'] = $baris['level'];
            exit;
        } else {
            echo "<script>alert('username atau password salah')</script>";
        }
    } else {
        echo "<script>alert('username atau password salah')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RAPOR!</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0297ba9f6f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="form_enter_container">
            <form class="form" action="" method="post">
                <div class="form_title">
                    <h1>RAPOR!</h1>
                    <p>Login admin dan petugas untuk mengelola pengaduan</p>
                </div>
                <div class="form_group">
                    <input type="text" placeholder="Username" id="input username" class="form_control" name="username">
                </div>
                <div class="form_group">
                    <input type="password" placeholder="Password" class="form_control input_password" name="password"><i class="fa-regular fa-eye" onclick="showPassword()"></i>
                </div>
                <div class="form_group">
                    <input type="submit" value="Login" class="btn_submit" name="btnMasuk"></input>
                </div>
            </form>
            <div class="link">
                <a href="../index.php" class="to_home"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kembali</a>
            </div>
        </div>
    </div>
    <script src="../assets/js/main.js"></script>
</body>

</html>