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
                                    <table id="booking_antri" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Antri</th>
                                                <th>Kode Pemegang</th>
                                                <th>Nama Pemegang</th>
                                                <th>Plat Nomor</th>
                                                <th>NIP</th>
                                                <th>Alamat Pemegang</th>
                                                <th>Email</th>
                                                <th>No Telp</th>
                                                <th>Tanggal Booking</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
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
        <div class="modal fade" id="modalDetail">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Histori Service Kendaraan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered" id="tabledetail">
                            <thead>
                                <tr>
                                    <td>Kilometer</td>
                                    <td>Jenis Service</td>
                                    <td>Keterangan</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalUpdate">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Tanggal Booking</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="selesai"> <i>Tanggal Booking </i> </label>
                            <input type="text" class="form-control" name="booking" id="booking" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="selesai"> <i>Reschedule</i> </label>
                            <input type="text" class="form-control" name="new_booking" id="new_booking">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="#" class="btn btn-primary updateTgl">Simpan perubahan</a>
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
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(document.getElementById('new_booking'), {});
        });
        $(function() {
            $("#booking_antri").DataTable({
                "processing": true,
                "serverSide": true,
                "autoWidth": true,
                "ajax": {
                    "url": "<?= base_url("booking/json_antri"); ?>"
                }
            });


            $("body").on("click", ".editTglBooking", function() {
                var tglbooking = jQuery(this).attr("data-tglbooking");
                var platnomor = jQuery(this).attr("data-platkend");
                var nip = jQuery(this).attr("data-nip");

                $("#booking").val(tglbooking);
                $("#modalUpdate").modal("show");


                $(".updateTgl").click(function() {
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    today = yyyy + '-' + mm + '-' + dd;
                    var newBooking = $("#new_booking").val();

                    if (newBooking < today) {
                        swal.fire('Oops!', 'TIdak Bisa Reschedule Ke Hari Sebelumnya!', 'warning')
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url(); ?>booking/update_tglbooking',
                            data: {
                                plat_nomor: platnomor,
                                nip: nip,
                                booking_date: tglbooking,
                                new_booking: newBooking
                            },
                            cache: false,
                            success: function(respond) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Tanggal Booking Berhasil Diupdate',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        });
                    }
                });
            });

            $("body").on("click", ".detailAntri", function() {
                var platkend = jQuery(this).attr("data-platkend");

                jQuery("#tabledetail").DataTable().ajax.url("<?= base_url("booking/json_details"); ?>/" + platkend).load();
                jQuery("#modalDetail").modal("toggle");
            });
            $("#tabledetail").DataTable({
                "processing": true,
                "serverSide": true,
                "autoWidth": true,
                autoWidth: false,
                info: false,
                filter: false,
                lengthChange: false,
                paging: false,
                "ajax": {
                    "url": "<?= base_url("booking/json_details"); ?>"
                }
            });

            $("body").on("click", ".tambahTransaksi", function() {
                var tglbooking = jQuery(this).attr("data-tglbooking");
                var kodepemegang = jQuery(this).attr("data-kodepemegang");
                var kodeantri = jQuery(this).attr("data-kodeantri");

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + '-' + mm + '-' + dd;

                if (tglbooking != today) {
                    swal.fire('Oops!', 'Tanggal Booking Bukan Hari Ini', 'warning');
                } else {
                    Swal.fire({
                        title: 'Tambah Transaksi Service',
                        showCancelButton: true,
                        confirmButtonColor: '#3ea12f',
                        cancelButtonColor: '#d33',
                        denyButtonColor: '#2a6ad1',
                        confirmButtonText: 'Ya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "<?= site_url(); ?>penjualan/transaksi/service_checkin/" + kodeantri;
                        } else if (result.isDenied) {
                            location.href = "<?= site_url(); ?>booking/antri";
                        }
                    })
                }
            });
        });
        $('.dataTables_length').addClass('bs-select');
    </script>
</body>

</html>