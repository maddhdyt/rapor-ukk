<?php

include '../koneksi.php';

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: login_pa.php");
}

$id = $_GET['id'];

// $show = mysqli_query($koneksi, "SELECT * FROM dat_tanggapan WHERE id_pengaduan = $id");

$show = mysqli_query($koneksi, "SELECT dat_pengaduan.id AS id_pengaduan, dat_pengaduan.nik, dat_pengaduan.judul, dat_pengaduan.gambar, dat_pengaduan.deskripsi, dat_pengaduan.tgl_pengaduan, dat_pengaduan.status_pengaduan, dat_tanggapan.* FROM dat_pengaduan INNER JOIN dat_tanggapan ON dat_pengaduan.id = dat_tanggapan.id_pengaduan WHERE dat_pengaduan.id = $id");

$data = mysqli_fetch_assoc($show);

$title = "Kelola Tanggapan";

include 'partials/header.php';

?>

<!-- Main Content -->
<div class="main-content">
    <div class="row mt-3">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Tanggapan</h4>
                </div>
                <form action="crud_manage_tanggapan.php" method="post" enctype="multipart/form-data" class="card-body">
                    <input type="hidden" name="id_pengaduan" value="<?php echo $id ?>">
                    <div class="form-group">
                        <label>Konfirmasi</label>
                        <select name="status_pengaduan" class="form-control" id="" required>
                            <option value="Diterima" <?= $data['status_pengaduan'] == 'Diterima' ? 'selected' : '' ?>>Terima</option>
                            <option value="Ditolak" <?= $data['status_pengaduan'] == 'Ditolak' ? 'selected' : '' ?>>Tolak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isi Tanggapan</label>
                        <textarea name="tanggapan" id="" class="form-control" required><?= $data['tanggapan']; ?></textarea>
                    </div>
                    <div class="card-footer text-right">
                    <div class="btn btn-secondary" onclick="history.back ()">Cancel</div>
                    <input name="btnUbah" type="submit" class="btn btn-primary ml-2" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<!-- <div class="row mt-2">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Verifikasi & Konfirmasi Pengaduan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Checkbox</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Checkbox 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">
                                Checkbox 2
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="color" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Datetime Local</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <input type="month" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Radio</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Radio 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" checked>
                            <label class="form-check-label" for="exampleRadios2">
                                Radio 2
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Range</label>
                        <input type="range" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Search</label>
                        <input type="search" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tel</label>
                        <input type="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="url" class="form-control">
                    </div>
                    <div class="form-group mb-0">
                        <label>Week</label>
                        <input type="week" class="form-control">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </div>      
        </div>
    </div> -->
<?php include 'partials/footer.php'; ?>