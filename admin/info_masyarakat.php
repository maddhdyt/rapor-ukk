<?php

include '../core/conn.php';

include '../core/init_admin.php';

$id = $_GET['id'];

$show = mysqli_query($koneksi, "SELECT * FROM dat_masyarakat WHERE id = $id");

$data = mysqli_fetch_assoc($show);

// Jika id tidak ada
if ($id !== $data['id']) {
    echo "<script>document.location='data_masyarakat.php';</script>";
}

$title = "Data Masyarakat";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Info Masyarakat</h4>
                </div>
                <form action="../functions/crud_masyarakat.php" method="post" enctype="multipart/form-data" class="card-body">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <div class="form-group">
                        <label>NIK</label>
                        <input name="nik" type="text" class="form-control" value="<?php echo $data['nik'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $data['nama'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="telp" type="text" class="form-control" value="<?php echo $data['telp'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" value="<?php echo $data['alamat'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="<?php echo $data['username'] ?>" disabled>
                    </div>
                    <div class="card-footer text-right">
                        <a href="data_masyarakat.php" class="btn btn-primary">Kembali</a>
                        <!-- <input name="btnUpdate" type="submit" class="btn btn-primary ml-2" value="Submit"> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>