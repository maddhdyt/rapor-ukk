<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
} else if ($_SESSION['level'] == 'petugas') {
    header("Location: dashboard.php");
}

$id = $_SESSION['id_petugas'];

$title = "Print Laporan";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">

</div>

<?php include 'partials/footer.php'; ?>