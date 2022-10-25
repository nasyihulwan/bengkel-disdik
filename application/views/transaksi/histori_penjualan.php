<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->


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
                            <h1 class="m-0 mb-2"><?= $title ?></h1>
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
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>No. Faktur</td>
                                                <td>Tanggal Transaksi</td>
                                                <td>Kode Pelanggan</td>
                                                <td>Nama Pelanggan</td>
                                                <td>Total</td>
                                                <td>Kasir</td>
                                                <td>AKSI</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($historiPenjualan as $row) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?> </td>
                                                    <td><?= $row->no_faktur ?> </td>
                                                    <td><?= $row->tgl_transaksi ?></td>
                                                    <td><?= $row->kode_pelanggan ?></td>
                                                    <td><?= $row->nama_pelanggan ?></td>
                                                    <td align="right"><?= number_format($row->totalpenjualan, '0', '', '.') ?></td>
                                                    <td><?= $row->nama_kasir ?></td>
                                                    <td>
                                                        <a href="<?= site_url() ?>penjualan/transaksi/cetakpenjualan/<?= $row->no_faktur ?>" target="_blank" class="btn btn-sm btn-primary print" data-href="<?= site_url() ?>penjualan/transaksi<?= $row->no_faktur ?>"> <i class="fa fa-print"></i> Print</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
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

        <!-- Modal -->

        <!-- /.Modal -->

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
            $("#example1").DataTable({
                // "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "scrollX": true
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;
        });
        $('.dataTables_length').addClass('bs-select');
    </script>
</body>

</html>