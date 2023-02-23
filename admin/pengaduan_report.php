<?php

include '../core/conn.php';

include '../core/init_admin_only.php';

$title = "Print Laporan";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3" style="border-radius: 8px !important;">
        <div class="card-body">
            <a href="../functions/print_report.php" class="btn btn-primary mb-4">
                Cetak Laporan
            </a>
            <table id="raporTable" class="display nowrap" style="width: 100%;">
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
</div>

<?php include 'partials/footer.php'; ?>