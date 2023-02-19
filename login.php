<?php 

include 'koneksi.php';

session_start();
if(isset($_SESSION['login'])) {
    header("Location: user_dashboard.php");
}

if (isset($_POST['btnMasuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE username = '$username'");

    if (mysqli_num_rows($data) === 1) {
        $baris = mysqli_fetch_assoc($data);
        if ($password == $baris['password']) {

            header("Location: user_dashboard.php");
            $_SESSION['id'] = $baris['id'];
            $_SESSION['login'] = true;
            $_SESSION['nik'] = $baris['nik'];
            $_SESSION['nama'] = $baris['nama'];
            $_SESSION['email'] = $baris['email'];
            exit;
        } else {
            echo "<script>alert('username atau password salah')</script>";
        }
    } else {
        echo "<script>alert('username atau password salah')</script>";
    }
}

$title = "Login";
    include 'partials/header.php';

?>

<body>
    <div class="container">
        <div class="form_enter_container">
            <form class="form" action="" method="post">
                <div class="form_title">
                    <h1>RAPOR!</h1>
                    <p>Login terlebih dahulu untuk melanjutkan</p>
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
                <div class="to_another">Belum punya akun? <a href="register.php">Daftar</a></div>
                <a href="index.php" class="to_home"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kembali</a>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
</body>

</html>