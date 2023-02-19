<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
}

$id = $_SESSION['id'];

$title = "Data Masyarakat";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">

</div>

<?php include 'partials/footer.php'; ?>