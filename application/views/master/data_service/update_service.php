<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/v_head.php") ?>
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css') ?>">
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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <a href="<?= site_url('master/service') ?>" class="btn-lg btn-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="<?= site_url('master/service/fungsi_update') ?>" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="id">Kode Service</label>
                        <input type="text" class="form-control" id="kode_service" name="kode_service" placeholder="Masukkan Nama" value="<?= $updateService->kode_service ?>" required readonly>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $updateService->nama_service ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="jenis">Pilih jenis kendaraan</label>
                        <select class="form-control" id="jenis" name="jenis">
                          <option <?php if ($updateService->jenis_kendaraan == 'mobil') {
                                    echo 'selected';
                                  } ?> value="mobil">Mobil</option>
                          <option <?php if ($updateService->jenis_kendaraan == 'motor') {
                                    echo 'selected';
                                  } ?> value="motor">Motor</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="harga">Tipe Kendaraan</label>
                        <input type="text" class="form-control" id="tipe_kendaraan" name="tipe_kendaraan" placeholder="Masukkan Tipe Kendaraan" value="<?= $updateService->tipe_kendaraan ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" value="<?= $updateService->harga ?>" required>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right" name="submit">Update Data</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
      bsCustomFileInput.init();
    });
    //Date picker
    $('#berlaku_sampai').datetimepicker({
      format: 'L'
    });
    // Disable Space
    $("input#noRegis").on({
      keydown: function(e) {
        if (e.which === 32)
          return false;
      },
      change: function() {
        this.value = this.value.replace(/\s/g, "");
      }
    });
  </script>
</body>

</html>