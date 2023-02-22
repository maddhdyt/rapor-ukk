<?php

include 'core/conn.php';

include 'core/init_user.php';

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
                            <form action="functions/crud_pengaduan.php" method="post" class="action_menu">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <a href="detail_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-circle-info"></i>Detail</a>
                                <a href="edit_pengaduan.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                <button type="submit" name="btnDelete"><i class="fa-solid fa-trash-can"></i>Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </section>
    </div>


    <?php include 'partials/footer.php' ?>