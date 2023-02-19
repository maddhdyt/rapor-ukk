<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
}

$id = $_GET['id'];

$show = mysqli_query($koneksi, "SELECT * FROM dat_petugas WHERE id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Data Petugas";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Petugas</h4>
                </div>
                <form action="crud_petugas.php" method="post" enctype="multipart/form-data" class="card-body">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <input type="hidden" name="password_lama" value="<?php echo $data['password'] ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_petugas" type="text" class="form-control" value="<?php echo $data['nama_petugas'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Telp</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $data['telp'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" id="">
                            <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : '' ?>>
                                Admin
                            </option>
                            <option value="admin" <?= $data['level'] == 'petugas' ? 'selected' : '' ?>>
                                Petugas
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="username" type="text" class="form-control" value="<?php echo $data['password'] ?>">
                    </div>
                    <div class="card-footer text-right">
                        <input name="btnSimpan" type="submit" class="btn btn-primary mr-1" value="Submit">
                        <div class="btn btn-secondary" onclick="history.back ()">Cancel</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>