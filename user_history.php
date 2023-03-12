<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_GET['id'];

// Jika bukan id pengguna
if ($id != $_SESSION['id']) {
    header("Location: error/403_error.php");
}

$title = "History Pengaduan";

include 'partials/header.php';
include 'partials/nav.php';
?>
<div class="_container">
    <section class="user_history">
        <div class="history_list">
            <?php
            $nik = $_SESSION['nik'];
            $show = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan WHERE nik = $nik ORDER BY id DESC");
            if (mysqli_num_rows($show) <= 0) {
                echo "<i class='null_alert'>Belum ada pengaduan</i>";
            }
            while ($data = mysqli_fetch_assoc($show)) :
            ?>
                <div class="_card">
                    <div class="aduan_title">
                        <p><?= $data['tgl_pengaduan']; ?></p>
                        <h2><?= $data['judul']; ?></h2>
                    </div>
                    <div class="btn_control">
                        <div class="_status">
                            <div class="_box <?php if ($data['status_pengaduan'] == 'Diterima') {
                                                    echo "done";
                                                } else if ($data['status_pengaduan'] == 'Diproses') {
                                                    echo "process";
                                                } else {
                                                    echo "reject";
                                                } ?>"><?= $data['status_pengaduan'] ?>
                            </div>
                        </div>
                        <div class="_menu action_toggle">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                            <div class="action_menu">
                                <a href="detail_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-circle-info"></i>Detail</a>
                                <?php if ($data['status_pengaduan'] == 'Diproses') : ?>
                                    <a href="edit_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                <?php endif; ?>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#confirmModal<?= $data['id'] ?>"><i class="fa-solid fa-trash-can"></i>Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="confirmModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Yakin hapus pengaduan?</p>
                            </div>
                            <div class="modal-footer border-0 p-0 m-0">
                                <form action="functions/crud_pengaduan.php" method="post" class="btn_group">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <button type="submit" name="btnDelete" class="btn btn-confirm">Hapus</button>
                                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </section>
</div>

<?php include 'partials/footer.php'; ?>