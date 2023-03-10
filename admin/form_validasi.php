<?php

include '../core/conn.php';

include '../core/init_admin.php';

$id = $_GET['id'];

$title = "Kelola Pengaduan";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Validasi Pengaduan</h4>
                </div>
                <form action="../functions/crud_manage_pengaduan.php" method="post" enctype="multipart/form-data" class="card-body">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label>Konfirmasi</label>
                        <select name="status_pengaduan" class="form-control" id="" required>
                            <option value="Diterima">Terima</option>
                            <option value="Ditolak">Tolak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isi Tanggapan</label>
                        <textarea name="tanggapan" id="" class="form-control" required></textarea>
                    </div>
                    <div class="card-footer text-right" style="gap: 10px;">
                        <a href="kelola_pengaduan.php" class="btn btn-danger">Cancel</a>
                        <input name="btnSimpan" type="submit" class="btn btn-primary ml-2" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>