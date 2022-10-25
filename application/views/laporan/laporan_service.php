<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->


        <!-- Navbar -->
        <?php $this->load->view("_partials/v_navbar.php") ?>

        <!-- Main Sidebar Container -->
        <?php $this->load->view("_partials/v_sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 mb-2"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <?php $this->load->view("_partials/v_breadcrumb.php") ?>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card ml-3">
                            <div class="card-body">
                                <form action="<?= site_url() ?>laporan/cetakLaporanService" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="dari" id="dari" placeholder="Dari">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="sampai" id="sampai" placeholder="Sampai">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="submit" id="cariData" class="btn btn-primary w-100 "> <i class="fa fa-search"></i> Cari Data</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name="export" id="exportExcel" class="btn btn-success w-100 "> <i class="fa fa-file-excel-o"></i> Export Excel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal  -->
        <!-- /. modal  -->

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
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(document.getElementById('dari'), {});
        });
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(document.getElementById('sampai'), {});
        });

        $("#cariData").click(function() {
            dari = $("#dari").val();
            sampai = $("#sampai").val();

            if (dari == "") {
                Swal.fire('Oops!', 'Tanggal dari tidak boleh kosong!', 'warning');
                return false;
            } else if (sampai == "") {
                Swal.fire('Oops!', 'Tanggal sampai tidak boleh kosong!', 'warning');
                return false;
            }
        });

        $("#exportExcel").click(function() {
            dari = $("#dari").val();
            sampai = $("#sampai").val();

            if (dari == "") {
                Swal.fire('Oops!', 'Tanggal dari tidak boleh kosong!', 'warning');
                return false;
            } else if (sampai == "") {
                Swal.fire('Oops!', 'Tanggal sampai tidak boleh kosong!', 'warning');
                return false;
            }
        });
    </script>
</body>

</html>