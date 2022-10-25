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
                  <a href="<?= site_url('master/pemegang') ?>" class="btn-lg btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <form action="<?= site_url('master/pemegang/fungsi_update') ?>" method="post">
                    <div class="card-body">
                      <input type="hidden" class="form-control" id="id" name="id" placeholder="Masukkan Nama" value="<?= $pemegangDetail->kode_pemegang ?>" required readonly>
                      <div class="form-group">
                        <label for="nama">Nama </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $pemegangDetail->nama_pemegang ?>" required>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?= $pemegangDetail->nip ?>" required>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($pemegangDetail->alamat_pemegang); ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $pemegangDetail->email ?>" required>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon" value="<?= $pemegangDetail->no_telp ?>" required>
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">
                        <label for="no_regis_kendaraan">Nomor Regis</label>
                        <input type="text" class="form-control" id="no_regis_kendaraan" name="no_regis_kendaraan" placeholder="Masukkan Nomor Registrasi Kendaraan" value="<?= $pemegangDetail->no_regis_kendaraan ?>" required>
                        <?= form_error('no_regis_kendaraan', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group">

                        <label for="jenis_kendaraan">Jenis Kendaraan</label>
                        <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
                          <?php if ($pemegangDetail->jenis_kendaraan == 'Motor') { ?>
                            <option value="motor" selected>Motor</option>
                          <?php } ?>
                          <option value="mobil">Mobil</option>
                        </select>
                        <?= form_error('jenis_kendaraan', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6">
                          <label for="foto_pemegang">Foto Pemegang</label>
                          <input type="file" class="dropify" id="foto_pemegang" name="foto_pemegang" data-default-file="">
                          <?= form_error('foto_pemegang', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="col-sm-6">
                          <label for="foto_kendaraan">Foto Kendaraan</label>
                          <input type="file" class="dropify" id="foto_kendaraan" name="foto_kendaraan" data-default-file="">
                          <?= form_error('foto_kendaraan', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right" name="submit">Tambah Data</button>
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
    $("input#no_regis_kendaraan").on({
      keydown: function(e) {
        if (e.which === 32)
          return false;
      },
      change: function() {
        this.value = this.value.replace(/\s/g, "");
      }
    });
    $('.dropify').dropify();
  </script>
</body>

</html>