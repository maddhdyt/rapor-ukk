<?php

include 'koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
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
                while ($data = mysqli_fetch_assoc($show)) :
                ?>
                    <div class="_card">
                        <div class="aduan_title">
                            <p><?= $data['tgl_pengaduan']; ?></p>
                            <h2><?= $data['judul']; ?></h2>
                        </div>
                        <div class="btn_control">
                            <a href="detail_pengaduan.php?id=<?php echo $data['id']?>" class="_detail">
                                Detail
                            </a>
                            <div class="_menu action_toggle">
                                <i class="fa-solid fa-ellipsis"></i>
                                <form action="crud_pengaduan.php" method="post" class="action_menu">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <button name="btnEdit"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button name="btnDelete"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </section>
    </div>


    <?php include 'partials/footer.php' ?>