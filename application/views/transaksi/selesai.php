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
                                    <table id="tableSelesai" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>No. Faktur</td>
                                                <td>Tanggal Service</td>
                                                <td>Kode Pemegang</td>
                                                <td>Nama Pemegang</td>
                                                <td>Nomor Plat Kendaraan</td>
                                                <td>Jenis Kendaraan</td>
                                                <td>Status</td>
                                                <td>Jam Masuk</td>
                                                <td>Jam Keluar</td>
                                                <td>Total</td>
                                                <td>Kasir</td>
                                                <td>AKSI</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($historiServiceSelesai as $row) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?> </td>
                                                    <input type="hidden" id="noFaktur" value="<?= $row->no_faktur ?>">
                                                    <td><?= $row->no_faktur ?> </td>
                                                    <td><?= $row->tgl_transaksi ?></td>
                                                    <td><?= $row->kode_pemegang ?></td>
                                                    <td><?= $row->nama_pemegang ?></td>
                                                    <td><?= $row->nomor_plat_kendaraan ?></td>
                                                    <td><?= $row->jenis_kendaraan ?></td>
                                                    <td style="text-align:center;"> <span class="badge bg-green "><?= $row->status ?></span> </td>
                                                    <td> <b> <i><?= $row->jam_masuk ?></i></b> </td>
                                                    <td> <b> <i><?= $row->jam_keluar ?></i></b> </td>
                                                    <td align="right"><?= number_format($row->totalt_service, '0', '', '.') ?></td>
                                                    <td><?= $row->nama_kasir ?></td>
                                                    <td style="text-align:center;">
                                                        <a href="<?= site_url() ?>penjualan/transaksi/cetakservice/<?= $row->no_faktur ?>" target="_blank" class="btn btn-sm btn-primary print"> <i class="fa fa-print"></i> Print</a>
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
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Status Pengerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control" name="status" id="status">
                                <option value="Status" id="statusOption">Status</option>
                                <option value="Proses" class="bg-warning" id="proses">Proses</option>
                                <option value="Selesai" class="bg-success" id="selesai">Selesai</option>
                                <option value="Pending" class="bg-danger" id="pending">Pending</option>
                            </select>
                        </div>
                        <div class="form-group" id="waktuSelesai">
                            <label for="selesai"> <i>Waktu Selesai Pengerjaan</i> </label>
                            <input type="text" class="form-control" name="jam_keluar" id="jam_keluar" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="#" class="btn btn-primary simpanPerubahan">Simpan perubahan</a>
                    </div>
                </div>
            </div>
        </div>
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
            $("#tableT").DataTable({
                // "responsive": true,
                "scrollX": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#tableSelesai").DataTable({
                // "responsive": true,
                "scrollX": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#waktuSelesai").hide();

            $("#status").change(function() {
                var status = $(this).val();
                if (status == "Selesai") {
                    $("#waktuSelesai").show();
                } else {
                    $("#waktuSelesai").hide();
                }
            });

        });
    </script>
</body>

</html>