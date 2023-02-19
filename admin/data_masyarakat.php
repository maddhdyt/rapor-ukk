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
<div class="card mt-3">
        <div class="card-body">
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
                                <a href="edit_masyarakat.php?id=<?php echo $data['id'] ?>" class="btn btn-secondary text-primary">Ubah</a>
                                <a href="<?php echo $data['id'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>