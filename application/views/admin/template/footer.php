<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="http://almsaeedstudio.com">SMK Bhakti Praja Talang</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->

<script src="<?php echo base_url('assets') ?>/bootstrap-3/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/fastclick/fastclick.min.js"></script>
<script src="<?php echo base_url('assets') ?>/dist/js/app.min.js"></script>
<script src="<?php echo base_url('assets') ?>/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/toastr/js/toastr.min.js"></script>
<script src="<?php echo base_url('assets/plugins/dataTablesPrint/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/dataTablesPrint/buttons.flash.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/dataTablesPrint/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/dataTablesPrint/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/dataTablesPrint/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/dataTablesPrint/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/dataTablesPrint/buttons.print.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        let infoBerhasil = $('#infoBerhasil').data('info');
        let infoGagal = $('#infoGagal').data('info');
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        if (infoBerhasil) {
            toastr.info(infoBerhasil);
        }
        if (infoGagal) {
            toastr.warning(infoGagal);
        }
    })
</script>
</body>

</html>