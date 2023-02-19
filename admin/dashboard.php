<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
}

$data1 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan");
$total_report = mysqli_num_rows($data1);

$data2 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'Diterima'");
$done_report = mysqli_num_rows($data2);

$data3 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'Diproses'");
$process_report = mysqli_num_rows($data3);

$data4 = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE status_pengaduan = 'Ditolak'");
$refuse_report = mysqli_num_rows($data4);

$data5 = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat");
$total_user = mysqli_num_rows($data5);

$data6 = mysqli_query($koneksi, "SELECT * FROM dat_petugas");
$total_admin = mysqli_num_rows($data6);

$id = $_SESSION['id'];

$title = "Dashboard";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-4">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pengaduan Dilaporkan</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_report; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan Diproses</h4>
                        </div>
                        <div class="card-body">
                            <?= $process_report; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-folder-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan Selesai</h4>
                        </div>
                        <div class="card-body">
                            <?= $done_report; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-ban"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Laporan Ditolak</h4>
                        </div>
                        <div class="card-body">
                            <?= $refuse_report; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Masyarakat</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_user; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Petugas</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_admin; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include 'partials/footer.php'; ?>