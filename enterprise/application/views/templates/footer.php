<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Web Fajar <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Keluar" jika ingin mengakhiri sesi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Hapus Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data <span id="waktu"></span> ? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data yang sudah dihapus tidak bisa di kembalikan lagi
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a id="btn-hapus" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery-3.3.1.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/sweetalert/js/sweetalert2.all.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/buat-sendiri.js"></script>

<!-- Datatables -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>

<script src="<?= base_url(); ?>assets/vendor/datatables/datatables-1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/datatables-1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>

<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Waktu -->
<script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>



</body>

</html>