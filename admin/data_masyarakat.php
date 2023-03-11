<?php

include '../core/conn.php';

include '../core/init_admin_only.php';

$id = $_SESSION['id_petugas'];

$title = "Data Masyarakat";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3" style="border-radius: 8px;">
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
                                <form action="../functions/crud_masyarakat.php" method="post">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?> ">
                                    <input type="hidden" name="nik" value="<?= $data['nik'] ?> ">
                                    <div class="d-flex" style="gap: 10px;">
                                        <a href="info_masyarakat.php?id=<?php echo $data['id'] ?>" class="btn_control primary text-white"><i class="fa-solid fa-circle-info"></i></a>
                                    </div>
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