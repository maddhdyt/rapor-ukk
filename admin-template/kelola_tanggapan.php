<?php include 'partials/header.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3" style="border-radius: 8px !important;">
        <div class="card-body">
            <table id="raporTable" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Nama Pengadu</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td></td>
                            <td>
                                <div class=""></div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><img class="rounded" src="../assets/img/" alt="" width="80px" height="50px"></td>
                            <td>
                                <form action="">
                                    <div class="d-flex" style="gap: 10px;">
                                        <a href="../detail_pengaduan.php?id=" class="btn_control secondary text-white"><i class="fa-solid fa-circle-info"></i></a>
                                        <a href="edit_tanggapan.php?id=" class="btn_control primary text-white"><i class="fa-regular fa-pen-to-square"></i></a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>