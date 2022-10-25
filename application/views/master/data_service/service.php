<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/v_head.php") ?>
  <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.cs') ?>s">
  <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <?php $this->load->view("_partials/v_preloader.php") ?>

    <!-- Navbar -->
    <?php $this->load->view("_partials/v_navbar.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view("_partials/v_sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <?php $this->load->view("_partials/v_breadcrumb.php") ?>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-12">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php
                      $query = $this->db->get_where('service', array('jenis_kendaraan' => 'mobil'));
                      echo $query->num_rows();
                      ?></h3>
                  <p>Mobil</p>
                </div>
                <div class="icon">
                  <i class="fas fa-car"></i>
                </div>
                <a href="<?= site_url('master/service/mobil') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-12">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php
                      $query = $this->db->get_where('service', array('jenis_kendaraan' => 'motor'));
                      echo $query->num_rows();
                      ?></h3>
                  <p>Motor</p>
                </div>
                <div class="icon">
                  <i class="fas fa-motorcycle"></i>
                </div>
                <a href="<?= site_url('master/service/motor') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?php $this->load->view("_partials/v_footer.php") ?>
    <!-- /.footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Script -->
  <?php $this->load->view("_partials/v_js.php") ?>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('plugins/jszip/jszip.min.js') ?>"></script>
  <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js') ?>"></script>
  <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
  <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "excel", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>