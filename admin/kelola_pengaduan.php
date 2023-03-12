<?php

include '../core/conn.php';

include '../core/init_admin.php';

$title = "Kelola Pengaduan";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3" style="border-radius: 8px !important;">
        <div class="card-body">
            <table id="raporTable" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Tanggal Aduan</th>
                        <th>Nama Pengadu</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $show = mysqli_query($koneksi, "SELECT dat_pengaduan.id, dat_pengaduan.tgl_pengaduan, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.status_pengaduan, dat_pengaduan.deskripsi, dat_pengaduan.kategori, dat_masyarakat.nik, dat_masyarakat.nama FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik WHERE status_pengaduan = 'Diproses' ORDER BY dat_pengaduan.id DESC");
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
                            <td><?= $data['kategori']; ?></td>
                            <td><?= $data['tgl_pengaduan']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= substr($data['judul'], "0", "50") .
                          "..."; ?></td>
                            <td><img class="rounded" src="../assets/img/<?= $data['gambar'] ?>" alt="" width="80px" height="50px"></td>

                            <td>
                                <div class="d-flex" style="gap: 10px;">
                                    <a href="../detail_pengaduan.php?id=<?php echo $data['id']; ?>" class="btn_control secondary text-white" data-toggle="tooltip" data-original-title="Detail"><i class="fa-solid fa-circle-info"></i></a>
                                    <a href="form_validasi.php?id=<?php echo $data['id']; ?>" class="btn_control primary text-white" data-toggle="tooltip" data-original-title="Tanggapi"><i class="fa-regular fa-comment"></i></a>
                                </div>

                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>