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
            <div class="card ml-4" style="max-width: 720px;">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <img src="<?= base_url('dist/img/') . $user['image'] ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama'] ?> </h5>
                            <p class="card-text">
                                <br>
                                <b>Email :</b> <?= $user['email'] ?> <br>
                                <b>No HP :</b> <?= $user['no_telp'] ?> <br>
                                <b>Alamat :</b> <?= $user['alamat'] ?> <br>
                                <b>Role :</b> <?= implode($profile_role)  ?>
                            </p>
                            <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['date_created']) ?></small></p>
                        </div>
                    </div>
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
</body>

</html>