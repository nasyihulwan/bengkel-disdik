<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $('.custom-file-input').change(function(e) {
    var fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
  });
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Sweet Alert -->
<script src="<?= base_url('dist/js/sweetalert2.all.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('dist/js/adminlte.js') ?>"></script>
<!-- Dropify -->
<script src="<?= base_url('dist/js/dropify.js') ?>"></script>
<!-- Flatpickr -->
<script src="<?= base_url('plugins/flatpickr/dist/flatpickr.min.js') ?>"></script>
<script src="<?= base_url('plugins/flatpickr/dist/plugins/rangePlugin.js') ?>"></script>
<!-- FlotChart -->
<script src="<?= base_url() ?>plugins/flot/jquery.flot.js"></script>

<script src="<?= base_url() ?>plugins/flot/plugins/jquery.flot.resize.js"></script>

<script src="<?= base_url() ?>plugins/flot/plugins/jquery.flot.pie.js"></script>