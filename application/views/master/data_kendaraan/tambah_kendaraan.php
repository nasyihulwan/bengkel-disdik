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
              <h1 class="m-0">Tambah Data Kendaraan</h1>
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
                  <a href="<?= site_url('master/kendaraan') ?>" class="btn-lg btn-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="<?= site_url('master/kendaraan/fungsi_tambah') ?>" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="noRegis">Nomor Registrasi</label>
                        <input type="text" class="form-control" id="noRegis" name="no_regis" placeholder="Masukkan Nomor Registrasi" required>
                      </div>
                      <div class="form-group">
                        <label for="nmPemilik">Pemilik</label>
                        <input type="text" class="form-control" id="nmPemilik" name="nama_pemilik" placeholder="Masukkan Nama Pemilik" required>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                      </div>
                      <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan Merk" required>
                      </div>
                      <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Masukkan Tipe" required>
                      </div>
                      <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Jenis Kendaraan" required>
                      </div>
                      <div class="form-group">
                        <label for="thnPembuatan">Tahun Pembuatan</label>
                        <input type="text" class="form-control" id="thnPembuatan" name="thn_pembuatan" placeholder="Masukkan Tahun Pembuatan" required>
                      </div>
                      <div class="form-group">
                        <label for="cc">CC</label>
                        <input type="text" class="form-control" id="cc" name="silinder" placeholder="Masukkan Silinder/Daya Listrik" required>
                      </div>
                      <div class="form-group">
                        <label for="noRangka">Nomor Rangka</label>
                        <input type="text" class="form-control" id="noRangka" name="no_rangka" placeholder="Masukkan Nomor Rangka/NIK/VIN" required>
                      </div>
                      <div class="form-group">
                        <label for="noMesin">Nomor Mesin</label>
                        <input type="text" class="form-control" id="noMesin" name="no_mesin" placeholder="Masukkan Nomor Mesin" required>
                      </div>
                      <div class="form-group">
                        <label for="warna">Warna</label>
                        <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan Warna Kendaraan" required>
                      </div>
                      <div class="form-group">
                        <label for="bahanBakar">Bahan Bakar</label>
                        <input type="text" class="form-control" id="bahanBakar" name="bahan_bakar" placeholder="Masukkan Jenis Bahan Bakar" required>
                      </div>
                      <div class="form-group">
                        <label for="warnaTnkb">Warna TNKB</label>
                        <input type="text" class="form-control" id="warnaTnkb" name="warna_tnkb" placeholder="Masukkan Warna TNKB" required>
                      </div>
                      <div class="form-group">
                        <label for="tahunRegistrasi">Tahun Registrasi</label>
                        <input type="text" class="form-control" id="tahunRegistrasi" name="thn_registrasi" placeholder="Masukkan Tahun Registrasi" required>
                      </div>
                      <div class="form-group">
                        <label for="noBpkb">Nomor BPKB</label>
                        <input type="text" class="form-control" id="noBpkb" name="no_bpkb" placeholder="Masukkan Nomor BPKB" required>
                      </div>
                      <div class="form-group">
                        <label for="kdLokasi">Kode Lokasi</label>
                        <input type="text" class="form-control" id="kdLokasi" name="kd_lokasi" placeholder="Masukkan Kode Lokasi" required>
                      </div>
                      <div class="form-group">
                        <label for="berlaku_sampai">Berlaku Sampai</label>
                        <input type="date" class="form-control" id="berlaku_sampai" name="berlaku_sampai" placeholder="Masukkan Masa Berlaku" required>
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