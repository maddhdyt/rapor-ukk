<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
}

$id = $_SESSION['id'];

$title = "Kelola Pengaduan";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3">
        <div class="card-body">
            <table id="dataKelolaPengaduan" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Aduan</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $show = mysqli_query($koneksi, "SELECT dat_pengaduan.id, dat_pengaduan.tgl_pengaduan, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.deskripsi, dat_masyarakat.nik, dat_masyarakat.nama FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik WHERE status_pengaduan = 'Diproses'");
                    while ($data = mysqli_fetch_assoc($show)) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nik']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['tgl_pengaduan']; ?></td>
                            <td><?= $data['judul']; ?></td>
                            <!-- <td><a href="../gambar/<?php echo $data['gambar'] ?>" target="_blank"><img src="../gambar/<?php echo $data['gambar'] ?>" width="80" height="80"></a></td> -->
                            <td>
                                <a href="../detail_pengaduan.php?id=<?php echo $data['id'] ?>" class="btn btn-success">Detail</a>
                                <a href="" class="btn btn-primary">Tanggapi</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>