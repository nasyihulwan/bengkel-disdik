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
                  <a href="<?= site_url('master/barang') ?>" class="btn-lg btn-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="<?= site_url('master/barang/fungsi_update') ?>" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="id">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan ID" value="<?= $updateBarang->kode_barang ?>" required readonly>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama </label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required value="<?= $updateBarang->nama_barang ?>">
                      </div>
                      <div class="form-group">
                        <label for="jenis_barang">Pilih jenis barang</label>
                        <select class="form-control" id="jenis_barang" name="jenis_barang">
                          <option value="Sparepart">Sparepart</option>
                          <option value="Oli">Oli</option>
                          <option value="Chemical">Chemical</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="merk">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan Merk" required value="<?= $updateBarang->merk ?> ">
                      </div>
                      <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="Masukkan Model" required value="<?= $updateBarang->model ?> ">
                      </div>
                      <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli" required value="<?= $updateBarang->harga_beli ?> ">
                      </div>
                      <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual" required value="<?= $updateBarang->harga_jual ?> ">
                      </div>
                      <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Masukkan Supplier" required value="<?= $updateBarang->supplier ?> ">
                      </div>
                      <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok" required value="<?= $updateBarang->stok ?> ">
                      </div>
                      <div class="form-group">
                        <label for="jenis_kendaraan">Pilih jenis kendaraan</label>
                        <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
                          <?php if ($updateBarang->jenis_kendaraan == 'Motor') { ?>
                            <option value="Motor" selected>Motor</option>
                          <?php } ?>
                          <option value="Mobil">Mobil</option>

                        </select>
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