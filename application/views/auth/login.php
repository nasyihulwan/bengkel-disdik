<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= site_url('landing') ?>">BENGKEL <b>DISDIK</b> </a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masuk untuk mengakses CMS</p>
                <?= $this->session->flashdata('message') ?>

                <form action="<?= site_url('auth') ?>" method="post">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Email address" name="email" value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-2">', '</small>') ?>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12 float-right">
                            <button type="submit" class="btn btn-primary btn-block mb-3">Sign In</button>
                        </div>
                        <div class="col-12 float-right">
                            <a href="<?= site_url('landing') ?>" class="btn btn-primary btn-block mb-3">Go Back</a>
                        </div>
                        <hr>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">Lupa password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

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