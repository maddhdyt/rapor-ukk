<?php

include 'core/conn.php';

$title = "Aduan Masyarakat";

$perPage = 6; //perhalaman
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$all = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan LIMIT $start, $perPage");

$result = mysqli_query($koneksi, "SELECT * FROM dat_pengaduan");
$total = mysqli_num_rows($result);

$pages = ceil($total / $perPage);

$jumlahLink = 2;
$start_num = $page;
if ($page < ($pages - $jumlahLink)) {
    $end_num = $page + $jumlahLink;
} else {
    $end_num = $pages;
}



include 'partials/header.php';
include 'partials/nav.php';

?>
<div class="container">
    <div class="user_news">
        <div class="_title">
            <p>Pengaduan yang telah dikirimkan oleh masyarakat akan tampil disini</p>
        </div>
        <div class="_list">
            <?php
            while ($data = mysqli_fetch_assoc($all)) :
            ?>
                <div class="card_news">
                    <div class="_banner">
                        <a href="detail_pengaduan.php?id=<?php echo $data['id'] ?>"></a>
                        <img src="assets/img/<?= $data['gambar'] ?>">
                    </div>
                    <div class="_title">
                        <p><?= $data['tgl_pengaduan'] ?></p>
                        <a href="detail_pengaduan.php?id=<?php echo $data['id'] ?>"><?= $data['judul'] ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <div class="btn_control back">
                <i class="fa-solid fa-chevron-left"></i>
                <?php if ($page > 1) : ?>
                    <a href="?page=<?= $page - 1 ?>"></a>
                <?php endif; ?>
            </div>

            <?php for ($i = $start_num; $i <= $end_num; $i++) : ?>
                <?php if ($i == $page) : ?>
                    <div class="page active"><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></div>
                <?php else : ?>
                    <div class="page"><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></div>
                <?php endif; ?>
            <?php endfor; ?>
            <div class="btn_control next">
                <i class="fa-solid fa-chevron-right"></i>
                <?php if ($page < $pages) : ?>
                    <a href="?page=<?= $page + 1 ?>"></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>