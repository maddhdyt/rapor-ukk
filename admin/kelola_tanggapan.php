<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
}

$id = $_SESSION['id'];

$title = "Kelola Tanggapan";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3">
        <div class="card-body">
            <table id="raporTable" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Aduan</th>
                        <th>Judul</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $show = mysqli_query($koneksi, "SELECT dat_pengaduan.id AS id_pengaduan, dat_pengaduan.nik, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.deskripsi, dat_pengaduan.tgl_pengaduan, dat_pengaduan.status_pengaduan, dat_masyarakat.*, dat_tanggapan.*, dat_petugas.* FROM dat_pengaduan INNER JOIN dat_masyarakat ON dat_pengaduan.nik = dat_masyarakat.nik INNER JOIN dat_tanggapan ON dat_pengaduan.id = dat_tanggapan.id_pengaduan INNER JOIN dat_petugas ON dat_tanggapan.id_petugas = dat_petugas.id WHERE dat_pengaduan.status_pengaduan = 'Diterima' OR dat_pengaduan.status_pengaduan = 'Ditolak' ORDER BY dat_tanggapan.id DESC");
                    while ($data = mysqli_fetch_assoc($show)) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nik']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['tgl_pengaduan']; ?></td>
                            <td><?= $data['judul']; ?></td>

                            <td>
                                <form action="">
                                    <a href="../detail_pengaduan.php?id=<?php echo $data['id_pengaduan'] ?>" class="btn btn-secondary text-primary">Detail</a>
                                    <a href="edit_tanggapan.php?id=<?php echo $data['id_pengaduan'] ?>" class="btn btn-primary ml-1">Ubah</a>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal tanggapan -->
                        <div class="modal modal-lg fade" id="kelolaPengaduan<?php echo $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="model-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Kelola Pengaduan</h1>
                                        <button type="button" class="btn-Close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="crud_kelola_pengaduan.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <div class="mb-3">
                                                <label for="">Konfirmasi Aduan</label>
                                                <select name="status_pengaduan" class="form_control" id="">
                                                    <option value="Ditolak">Tolak</option>
                                                    <option value="Diterima">Terima</option>
                                                </select>
                                                <div class="mb-3">
                                                    <label for="">Isi Tanggapan</label>
                                                    <textarea name="tanggapan" id="" rows="6"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" nam="btnSimpan" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>