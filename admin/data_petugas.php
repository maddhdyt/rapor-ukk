<?php

include '../core/conn.php';

include '../core/init_admin_only.php';

$id = $_SESSION['id_petugas'];

$title = "Data Petugas";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3">
        <div class="card-body">
            <a href="tambah_petugas.php" class="btn btn-primary mb-4">
                Tambah Petugas
            </a>
            <table id="raporTable" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $show = mysqli_query($koneksi, "SELECT * FROM dat_petugas ORDER BY id DESC");
                    while ($data = mysqli_fetch_assoc($show)) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_petugas']; ?></td>
                            <td><?= $data['telp']; ?></td>
                            <td><?= $data['level']; ?></td>
                            <td><?= $data['username']; ?></td>

                            <td>
                                <form action="../functions/crud_petugas.php" method="post">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?> ">
                                    <a href="edit_petugas.php?id=<?= $data['id'] ?>" class="btn btn-secondary text-primary">Ubah</a>
                                    <button type="submit" name="btnDelete" class="btn btn-danger ml-1">Hapus</button>
                                </form>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>