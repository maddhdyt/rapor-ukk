<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Ahmad Hidayat | UKK Rekayasa Perangkat Lunak
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="../assets/admin/modules/jquery.min.js"></script>
<script src="../assets/js/datatables.min.js"></script>
<script src="../assets/js/datatables.responsive.min.js"></script>
<script src="../assets/js/jquery.dataTables.responsive.min.js"></script>
<script src="../assets/admin/modules/popper.js"></script>
<script src="../assets/admin/modules/tooltip.js"></script>
<script src="../assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../assets/admin/modules/moment.min.js"></script>
<script src="../assets/admin/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../assets/admin/modules/chart.min.js"></script>
<script src="../assets/admin/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="../assets/admin/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../assets/admin/modules/summernote/summernote-bs4.js"></script>

<!-- Page Specific JS File -->
<script src="../assets/admin/js/page/index-0.js"></script>

<!-- Template JS File -->
<script src="../assets/admin/js/scripts.js"></script>
<script src="../assets/admin/js/custom.js"></script>



<script>
    $(document).ready(function() {
        $('#raporTable').DataTable({
            responsive: true,
            ordering: false,
            info: false,
        });
        $('#raporTablePrint').DataTable({
            responsive: true,
            paging: false,
            searching: false,
            ordering: false,
            info: false,
        });
    });
</script>
</body>

</html>