<?php

include '../core/conn.php';

include '../core/init_admin_only.php';

$title = "Print Laporan";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rapor Dashboard | <?= $title ?> </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/admin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/vendor/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../assets/vendor/jquery.dataTables.min.css">


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/admin/css/style.css">
    <link rel="stylesheet" href="../assets/admin/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script src="https://kit.fontawesome.com/0297ba9f6f.js" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <!-- Main Content -->
    <div class="card" style="border-radius: 8px !important;">
            <div class="card-body">
                <table id="raporTablePrint" class="display nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Tanggal Aduan</th>
                            <th>Nama Pengadu</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Tanggapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $show = mysqli_query($koneksi, "SELECT dat_pengaduan.id AS id_pengaduan,
                    dat_pengaduan.nik,
                    dat_pengaduan.judul,
                    dat_pengaduan.gambar, 
                    dat_pengaduan.deskripsi,
                    dat_pengaduan.tgl_pengaduan,
                    dat_pengaduan.status_pengaduan, 
                    dat_masyarakat.*, dat_tanggapan.*,
                    dat_petugas.* FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik INNER JOIN dat_tanggapan ON dat_pengaduan.id = dat_tanggapan.id_pengaduan
                    INNER JOIN dat_petugas ON dat_tanggapan.id_petugas = dat_petugas.id
                    WHERE dat_pengaduan.status_pengaduan = 'Diterima' OR
                    dat_pengaduan.status_pengaduan = 'Ditolak' ORDER BY dat_tanggapan.id DESC");
                        while ($data = mysqli_fetch_assoc($show)) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <div class="<?php if ($data['status_pengaduan'] == 'Diterima') {
                                                    echo "stat_done";
                                                } else if ($data['status_pengaduan'] == 'Diproses') {
                                                    echo "stat_procc";
                                                } else {
                                                    echo "stat_reject";
                                                } ?>"><?= $data['status_pengaduan']; ?></div>
                                </td>
                                <td><?= $data['tgl_pengaduan']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><img class="rounded" src="../assets/img/<?= $data['gambar'] ?>" alt="" width="80px" height="50px"></td>
                                <td><?= $data['tgl_tanggapan']; ?></td>
                                <td><?= $data['tanggapan']; ?></td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <script>
        window.print()
    </script>

    <?php include '../admin/partials/footer.php'; ?>