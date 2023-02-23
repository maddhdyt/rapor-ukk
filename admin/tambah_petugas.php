<?php

include '../core/conn.php';

include '../core/init_admin_only.php';

$title = "Data Petugas";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Registrasi Petugas</h4>
                </div>
                <form action="../functions/crud_petugas.php" method="post" enctype="multipart/form-data" class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_petugas" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input name="telp" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" id="">
                            <option value="admin">
                                Admin
                            </option>
                            <option value="petugas">
                                Petugas
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input name="password2" type="password" class="form-control" value="">
                    </div>
                    <div class="card-footer text-right">
                        <input name="btnDaftar" type="submit" class="btn btn-primary mr-1" value="Submit">
                        <div class="btn btn-secondary" onclick="history.back ()">Cancel</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>