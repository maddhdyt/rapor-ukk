<?php

include '../core/conn.php';

include '../core/init_admin_only.php';

$id = $_GET['id'];

$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Data Masyarakat";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Masyarakat</h4>
                </div>
                <form action="../functions/crud_masyarakat.php" method="post" enctype="multipart/form-data" class="card-body">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <div class="form-group">
                        <label>NIK</label>
                        <input name="nik" type="text" class="form-control" value="<?php echo $data['nik']?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $data['nama']?>">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="telp" type="text" class="form-control" value="<?php echo $data['telp']?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" value="<?php echo $data['alamat']?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="<?php echo $data['username']?>">
                    </div>
                    <div class="card-footer text-right">
                        <input name="btnUpdate" type="submit" class="btn btn-primary mr-1" value="Submit">
                        <div class="btn btn-secondary" onclick="history.back ()">Cancel</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>