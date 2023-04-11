<?php include 'partials/header.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Petugas</h4>
                </div>
                <form action="../functions/crud_petugas.php" method="post" enctype="multipart/form-data" class="card-body">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="password_lama" value="">
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama_petugas" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Telp</label>
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
                        <label>Password Baru</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input name="password2" type="password" class="form-control">
                    </div>
                    <div class="card-footer text-right">
                        <a href="data_petugas.php" class="btn btn-danger">Cancel</a>
                        <input name="btnUbah" type="submit" class="btn btn-primary ml-2" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>