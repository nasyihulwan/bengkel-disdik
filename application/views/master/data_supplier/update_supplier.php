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
                                    <a href="<?= site_url('master/supplier') ?>" class="btn-lg btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?= $this->session->flashdata('message'); ?>
                                    <form action="<?= site_url('master/supplier/fungsi_update') ?> " method="POST">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="id">ID Service</label>
                                                <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" placeholder="Masukkan Nama" value="<?= $updateSupplier->kode_supplier ?>" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama </label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $updateSupplier->nama ?>" required>
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $updateSupplier->email ?>" required>
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($updateSupplier->alamat); ?></textarea>
                                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telp">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $updateSupplier->no_telp ?>" placeholder="Masukkan Nomor Telepon" required>
                                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>') ?>
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
        $('.dropify').dropify();
    </script>
</body>

</html>