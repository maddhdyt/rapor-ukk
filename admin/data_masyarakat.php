<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
} else if ($_SESSION['level'] == 'petugas') {
    header("Location: dashboard.php");
} else if($_SESSION['level'] == 'petugas') {
    header("Location: dashboard.php");
}

$id = $_SESSION['id'];

$title = "Data Masyarakat";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3">
        <div class="card-body">
            <a href="tambah_masyarakat.php" class="btn btn-primary mb-4">
                Tambah Masyarakat
            </a>
            <table id="raporTable" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Telpon</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat ORDER BY id DESC");
                    while ($data = mysqli_fetch_assoc($show)) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nik']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['telp']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['username']; ?></td>

                            <td>
                                <form action="crud_masyarakat.php" method="post">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?> ">
                                    <a href="edit_masyarakat.php?id=<?php echo $data['id'] ?>" class="btn btn-secondary text-primary">Ubah</a>
                                    <input type="submit" name="btnDelete" class="btn btn-danger" value="Hapus">
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="hapusPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
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