<?php include 'partials/header.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Info Masyarakat</h4>
                </div>
                <form action="../functions/crud_masyarakat.php" method="post" enctype="multipart/form-data" class="card-body">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label>NIK</label>
                        <input name="nik" type="text" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="telp" type="text" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" value="" disabled>
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