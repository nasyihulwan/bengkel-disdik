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
                                    <table id="tableT" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <td>No. Faktur</td>
                                                <td>Tanggal Transaksi</td>
                                                <td>Kode Pelanggan</td>
                                                <td>Nama Pelanggan</td>
                                                <td>Total Tagihan</td>
                                                <td>Jenis Transaksi</td>
                                                <td>Kasir</td>
                                                <td>AKSI</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($transaksiBarangPending as $row) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $row->no_faktur ?></td>
                                                    <td><?= $row->tgl_transaksi ?></td>
                                                    <td><?= $row->kode_pelanggan ?></td>
                                                    <td><?= $row->nama_pelanggan ?></td>
                                                    <td align="right">Rp. <?= number_format($row->totaltagihan, '0', '', ',') ?></td>
                                                    <td><?= $row->jenis_transaksi ?></td>
                                                    <td><?= $row->kasir ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary editStatus" id="editStatus" data-noFaktur="<?= $row->no_faktur ?>" data-totalTagihan="<?= $row->totaltagihan ?>"><i class="fa fa-edit"></i></a>
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
        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bayar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="no_faktur">Nomor Faktur</label>
                            <input type="text" readonly class="form-control" name="no_faktur" id="no_faktur">
                        </div>
                        <div class="form-group">
                            <label for="totalTagihan">Total Tagihan</label>
                            <input type="text" readonly class="form-control" name="totalTagihan" id="totalTagihan">
                        </div>
                        <div class="form-group">
                            <label for="tunai">Tunai</label>
                            <input type="text" class="form-control" name="tunai" id="tunai">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="#" class="btn btn-primary simpanPerubahan w-100">Simpan</a>
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
                "responsive": true,
                "scrollX": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "excel", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#tableSelesai").DataTable({
                "responsive": true,
                "scrollX": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#editStatus").click(function() {
                nofaktur = $(this).attr("data-noFaktur");
                totaltagihan = $(this).attr("data-totalTagihan");

                $("#no_faktur").val(nofaktur);
                $("#totalTagihan").val(totaltagihan);
                tunai = $("#tunai").val();

                $("#modalUpdate").modal("show");

            });

            $(".simpanPerubahan").click(function() {
                no_faktur = $("#no_faktur").val();
                tagihan = $("#totalTagihan").val();
                tunai = $("#tunai").val();

                if (tunai == "") {
                    Swal.fire('Oops!', 'Tunai Tidak Boleh Kosong!', 'warning');
                } else if (parseInt(tunai) < parseInt(tagihan)) {
                    Swal.fire('Oops!', 'Tidak Cukup Uang!', 'warning');
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url() ?>penjualan/transaksi/bayarPenjualanBarang',
                        data: {
                            noFaktur: no_faktur,
                            tunai: tunai
                        },
                        cache: false,
                        success: function(respond) {
                            Swal.fire({
                                title: 'Redirect ke halaman histori penjualan?',
                                showDenyButton: true,
                                confirmButtonText: 'Ya',
                                denyButtonText: 'Tidak',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = "<?= site_url(); ?>penjualan/transaksi/histori_penjualan"
                                } else if (result.isDenied) {
                                    location.reload();
                                }
                            })

                        }
                    });
                }

            });

        });
    </script>
</body>

</html>