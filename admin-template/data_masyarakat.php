<?php include 'partials/header.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <div class="card mt-3" style="border-radius: 8px;">
        <div class="card-body"> 
            <table id="raporTable" class="display nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Telpon</th>
                        <th>Alamat</th>
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
                            <td></td>

                            <td>
                                <form action="../functions/crud_masyarakat.php" method="post">
                                    <input type="hidden" name="id" value="">
                                    <input type="hidden" name="nik" value="">
                                    <div class="d-flex" style="gap: 10px;">
                                        <a href="info_masyarakat.php?id=" class="btn_control primary text-white"><i class="fa-solid fa-circle-info"></i></a>
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