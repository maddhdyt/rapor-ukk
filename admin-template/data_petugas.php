<?php include 'partials/header.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3" style="border-radius: 8px;">
        <div class="card-body">
            <a href="tambah_petugas.php" class="btn btn-primary mb-4">
                Tambah Petugas
            </a>
            <table id="raporTable" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                                <form action="../functions/crud_petugas.php" method="post">
                                    <input type="hidden" name="id" value="">
                                    
                                    <div class="d-flex" style="gap: 10px;">
                                        <a href="edit_petugas.php?id=" class="btn_control primary text-white"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button type="submit" name="btnDelete" class="btn_control danger text-white outline-0 border-0" onclick="return confirm('Yakin untuk menghapus?')"><i class="fa-solid fa-trash-can"></i></button>
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