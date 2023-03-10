<?php

include 'core/conn.php';

include 'core/init_user.php';

$id = $_GET['id'];

if ($id != $_SESSION['id']) {
    header("Location: /rapor-ukk/user_dashboard.php");
}

$title = "History Pengaduan";

include 'partials/header.php';
include 'partials/nav.php';
?>
<div class="container">
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
                        <div class="modal">
                            <div class="modal-content">
                                <p>Yakin hapus pengaduan?</p>
                                <form action="functions/crud_pengaduan.php" method="post" class="btn_group">
                                    <input type="text" name="id" value="<?= $data['id']; ?>">
                                    <button type="submit" name="btnDelete" class="btn btn-confirm">Hapus</button>
                                    <div class="btn btn-cancel">Batal</div>
                                </form>
                            </div>
                        </div>
                        <div class="_menu action_toggle">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                            <div class="action_menu">
                                <a href="detail_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-circle-info"></i>Detail</a>
                                <?php if ($data['status_pengaduan'] == 'Diproses') : ?>
                                    <a href="edit_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                <?php endif; ?>
                                <a onclick="showModal()"><i class="fa-solid fa-trash-can"></i>Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </section>
</div>

<script src="assets/js/main.js"></script>
</body>

</html>