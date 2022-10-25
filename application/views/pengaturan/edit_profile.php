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

                <div class="col-lg-8 ml-3">
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open_multipart('pengaturan/user/edit_profile'); ?>
                    <input type="hidden" id="role_id" name="role_id" value="<?= $user['role_id'] ?>">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user['no_telp'] ?>">
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="dropify" name="image" data-default-file="<?= base_url('dist/img/') . $user['image'] ?>">
                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row float-right">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
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