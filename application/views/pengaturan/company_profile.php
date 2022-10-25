<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('dist/img/ntrd1.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

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
            <div class="row mx-auto">
                <div class="col-lg ml-3">
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open_multipart('pengaturan/bengkel/fungsi_update'); ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <label class="col-sm-12 col-form-label">Gambar</label>
                                <div class="col-lg-12">
                                    <?php foreach ($tampilCompany as $row) { ?>
                                        <input type="file" class="dropify" name="image" data-default-file="<?= base_url('dist/img/') . $row->image ?>">
                                        <?= form_error('image', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-12 col-form-label">Nama Bengkel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row->nama ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-12 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $row->no_telp ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $row->email ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-12 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($row->alamat); ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row float-right">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
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

    <?php $this->load->view("_partials/v_js.php") ?>
    <script>
        $('.dropify').dropify();
    </script>
</body>

</html>