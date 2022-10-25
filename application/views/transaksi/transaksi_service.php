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
                <?= $this->session->flashdata('msg'); ?>
                <input type="hidden" id="cekBarang">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-barcode" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="Nomor Faktur" value="<?= $no_faktur ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?= date("Y-m-d") ?>" class="form-control" name="tglTransaksi" id="tglTransaksi" placeholder="Tanggal Transaksi">
                                    <input type="hidden" value="<?= date("Y-m-d", strtotime('+6 months')) ?>" class="form-control" name="nextService" id="nextService">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="currKM" id="currKM" placeholder="Kilometer(KM) saat ini">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-tie" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="hidden" value="<?= $user['id'] ?>" name="id_user" id="id_user">
                                    <input type="text" class="form-control" value="<?= $user['id'] ?> - <?= $user['nama'] ?>" name="nama_user" id="nama_user" placeholder="Kasir" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card" id="dataKendaraan">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-cog" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="noPlatKend" id="noPlatKend" placeholder="Nomor Plat Kendaraan" value="<?= $kendaraan->no_regis ?>" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="hidden" name="kodePemegang" id="kodePemegang">
                                    <input type="text" class="form-control" name="namaPemegang" id="namaPemegang" placeholder="Nama Pemegang" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="namaPemilik" id="namaPemilik" placeholder="Nama Pemilik" readonly>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-car" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="jenisKend" id="jenisKend" placeholder="Jenis Kendaraan" readonly>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="kilometer" id="kilometer" placeholder="Kilometer" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="font-size: 1em;">Total Pembayaran</span>
                                <span class="info-box-number" id="totalPenjualanService" style="font-size: 2rem;">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Data Transaksi
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" readonly name="kode_service" id="kode_service" placeholder="Kode Service">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nama_service" id="nama_service" placeholder="Nama Service" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="tipe_kendaraan" id="tipe_kendaraan" placeholder="Tipe Kendaraan" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" class="form-control" style="text-align:right" name="harga_service" id="harga_service" placeholder="Harga">
                                    </div>
                                </div>
                                <div class="col-md text-right">
                                    <a href="#" class="btn btn-primary" id="tambahService">
                                        <i class="fa fa-plus"> </i>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped " id="tableServiceTemp" style="width:100%; table-layout: fixed; word-wrap: break-word;">
                                            <thead>
                                                <tr>
                                                    <th colspan="8" class="text-center">Table Data Service</th>
                                                </tr>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kendaraan</th>
                                                    <th>Tipe Kendaraan</th>
                                                    <th>Harga</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="loadDataService">
                                                <?php include 'service_detail_temp.php'; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-2">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="tunai" id="tunai" placeholder="Tunai">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-2">
                                            <a href="#" class="btn btn-primary w-100" id="simpanService">
                                                <i class="fa fa-send mr-2"></i>
                                                SIMPAN
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="modal_pemegang">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Pemegang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered" id="tablePelanggan">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Pemegang</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>No HP</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($pemegang as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_pemegang ?></td>
                                    <td><?= $row->nama_pemegang ?></td>
                                    <td><?= $row->alamat_pemegang ?></td>
                                    <td><?= $row->no_telp ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilih" data-kodePemegang="<?= $row->kode_pemegang ?>" data-namaPemegang="<?= $row->nama_pemegang ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="modalServiceMotor_harga">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Service Motor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Service</td>
                                    <td>Nama</td>
                                    <td>Jenis Kendaraan</td>
                                    <td>Tipe Kendaraan</td>
                                    <td>Harga</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($this->db->get_where('service', array('jenis_kendaraan' => 'Motor'))->result() as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_service ?></td>
                                    <td><?= $row->nama_service ?></td>
                                    <td><?= ucfirst($row->jenis_kendaraan) ?></td>
                                    <td><?= ucfirst($row->tipe_kendaraan) ?></td>
                                    <td align="right"><?= number_format($row->harga, '0', '', '.') ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilihService" data-kodeService="<?= $row->kode_service ?>" data-namaService="<?= $row->nama_service ?>" data-hargaService="<?= $row->harga ?>" data-tipeKendaraan="<?= $row->tipe_kendaraan ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>

                        <div class="card">
                            <div class="card-header">
                                Tambah Data Service Baru
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kode_service_temp">Kode Service baru</label>
                                            <input type="text" class="form-control" name="kode_service_temp" id="kode_service_temp" placeholder="Kode Service" value="<?= $kodeServiceTemp ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kode_service_temp">Nama Service baru</label>
                                            <input type="text" class="form-control" name="nama_service_baru" id="nama_service_baru" placeholder="Nama Service" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipe_kendaraan_baru">Tipe Kendaraan</label>
                                            <input type="text" class="form-control" readonly name="tipe_kendaraan_baru" id="tipe_kendaraan_baru" placeholder="Tipe Kendaraan" value="<?= $kendaraan_tipekendaraan->nama_tipe_kendaraan ?>">
                                            <input type="hidden" name="jenis_kendaraan_baru" id="jenis_kendaraan_baru" value="<?= $kendaraan_tipekendaraan->jenis_kendaraan ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipe_kendaraan_baru">Harga</label>
                                            <input type="text" class="form-control" name="harga_baru" id="harga_baru" placeholder="Harga" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-primary w-100 pilihServiceBaru">
                                            <i class="fa fa-plus"> </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalServiceMobil_harga">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Service Motor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Service</td>
                                    <td>Nama</td>
                                    <td>Jenis Kendaraan</td>
                                    <td>Tipe Kendaraan</td>
                                    <td>Harga</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($this->db->get_where('service', array('jenis_kendaraan' => 'Motor'))->result() as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_service ?></td>
                                    <td><?= $row->nama_service ?></td>
                                    <td><?= ucfirst($row->jenis_kendaraan) ?></td>
                                    <td><?= ucfirst($row->tipe_kendaraan) ?></td>
                                    <td align="right"><?= number_format($row->harga, '0', '', '.') ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilihService" data-kodeService="<?= $row->kode_service ?>" data-namaService="<?= $row->nama_service ?>" data-hargaService="<?= $row->harga ?>" data-tipeKendaraan="<?= $row->tipe_kendaraan ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>

                        <div class="card">
                            <div class="card-header">
                                Tambah Data Service Baru
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kode_service_temp">Kode Service baru</label>
                                            <input type="text" class="form-control" name="kode_service_temp" id="kode_service_temp" placeholder="Kode Service" value="<?= $kodeServiceTemp ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kode_service_temp">Nama Service baru</label>
                                            <input type="text" class="form-control" name="nama_service_baru" id="nama_service_baru" placeholder="Nama Service" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipe_kendaraan_baru">Tipe Kendaraan</label>
                                            <input type="text" class="form-control" readonly name="tipe_kendaraan_baru" id="tipe_kendaraan_baru" placeholder="Tipe Kendaraan" value="<?= $kendaraan->nama_tipe_kendaraan ?>">
                                            <input type="hidden" name="jenis_kendaraan_baru" id="jenis_kendaraan_baru" value="<?= $kendaraan->jenis_kendaraan ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipe_kendaraan_baru">Harga</label>
                                            <input type="text" class="form-control" name="harga_baru" id="harga_baru" placeholder="Harga" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-primary w-100 pilihServiceBaru">
                                            <i class="fa fa-plus"> </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_kendaraan">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Kendaraan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered" id="tableKendaraan">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nomor Plat</td>
                                    <td>Kode Pemegang</td>
                                    <td>Nama Pemegang</td>
                                    <td>Nama Pemilik</td>
                                    <td>Jenis Kendaraan</td>
                                    <td>Alamat</td>
                                    <td>Kilometer</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($kendaraan as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->no_regis ?></td>
                                    <td><?= $row->kode_pemegang  ?></td>
                                    <td><?= $row->nama_pemegang ?></td>
                                    <td><?= $row->nama_pemilik ?></td>
                                    <td><?= ucfirst($row->jenis_kendaraan) ?></td>
                                    <td><?= $row->alamat ?></td>
                                    <td align="right"><?= number_format($row->kilometer, '0', '', '.') ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilihKendaraan" data-noPlat="<?= $row->no_regis ?>" data-kodePemegang="<?= $row->kode_pemegang ?>" data-namaPemegang="<?= $row->nama_pemegang ?>" data-namaPemilik="<?= $row->nama_pemilik ?>" data-jenisKendaraan="<?= $row->jenis_kendaraan ?>" data-kilometer="<?= $row->kilometer ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(document.getElementById('tglTransaksi'), {});
        });
        $(function() {
            $("#tableKendaraan").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {

            function cekBarang() {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url(); ?>penjualan/transaksi/cekBarang',
                    cache: false,
                    success: function(respond) {
                        $("#cekBarang").val(respond);
                    }
                });
            };

            function loadDataService() {
                var idUser = $("#id_user").val();
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>penjualan/transaksi/getDataServiceTemp',
                    data: {
                        id_user: idUser
                    },
                    cache: false,
                    success: function(respond) {
                        $("#loadDataService").html(respond);
                    }
                });
            };

            loadDataService();

            $('#reservationdate').datetimepicker({
                format: 'L'
            });


            $("#nama_pemegang").click(function() {
                $("#modal_pemegang").modal("show");
            });


            $("#noPlatKend").click(function() {
                $("#modal_kendaraan").modal("show");
            });

            $("#kode_service").click(function() {
                var nomorPlat = $("#noPlatKend").val();
                var jenisKend = $("#jenisKend").val();
                if (nomorPlat == "" || nomorPlat == null) {
                    Swal.fire(
                        'Oops!',
                        'Data kendaraan tidak boleh kosong!',
                        'warning'
                    );
                } else {
                    if (jenisKend == 'Motor') {
                        $("#modalServiceMotor_harga").modal("show");
                    } else {
                        $("#modalServiceMobil_harga").modal("show");
                    }

                }
            });


            $(".pilih").click(function() {
                var kodePemegang = $(this).attr("data-kodePemegang");
                var namaPemegang = $(this).attr("data-namaPemegang");

                $("#kode_pemegang").val(kodePemegang);
                $("#nama_pemegang").val(namaPemegang);

                $("#modal_pemegang").modal("hide");

            });

            $(".pilihService").click(function() {
                var jenisKend = $("#jenisKend").val();
                var kodeService = $(this).attr("data-kodeService");
                var namaService = $(this).attr("data-namaService");
                var tipeKendaraan = $(this).attr("data-tipeKendaraan");
                var hargaService = $(this).attr("data-hargaService");


                $("#kode_service").val(kodeService);
                $("#nama_service").val(namaService);
                $("#tipe_kendaraan").val(tipeKendaraan);
                $("#harga_service").val(hargaService);

                if (jenisKend == 'Motor') {
                    $("#modalServiceMotor_harga").modal("hide");
                } else {
                    $("#modalServiceMobil_harga").modal("hide");
                }
            });

            $(".pilihKendaraan").click(function() {
                var nomorPlat = $(this).attr("data-noPlat");
                var kodePemegang = $(this).attr("data-kodePemegang");
                var namaPemegang = $(this).attr("data-namaPemegang");
                var namaPemilik = $(this).attr("data-namaPemilik");
                var jenisKendaraan = $(this).attr("data-jenisKendaraan");
                var kilometer = $(this).attr("data-kilometer");

                $("#noPlatKend").val(nomorPlat);
                $("#kodePemegang").val(kodePemegang);
                $("#namaPemegang").val(namaPemegang);
                $("#namaPemilik").val(namaPemilik);
                $("#jenisKend").val(jenisKendaraan);
                $("#kilometer").val(kilometer);
                $("#modal_kendaraan").modal("hide");
            });


            $("#tambahService").click(function() {
                var kodeService = $("#kode_service").val();
                var hargaService = $("#harga_service").val();
                var idUser = $("#id_user").val();

                if (kodeService == "" || kodeService == null) {
                    Swal.fire(
                        'Oops!',
                        'Kode service harus diisi!',
                        'warning'
                    );
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url(); ?>penjualan/transaksi/simpanServiceTemp',
                        data: {
                            kode_service: kodeService,
                            harga_service: hargaService,
                            id_user: idUser
                        },
                        cache: false,
                        success: function(respond) {
                            if (respond == 1) {
                                Swal.fire(
                                    'Oops!',
                                    'Data Service Sudah ada!',
                                    'warning'
                                );
                            } else {
                                loadDataService();
                            }
                        }
                    });
                }
            });

            $("#simpanService").click(function() {

                var noFaktur = $("#no_faktur").val();
                var tglTransaksi = $("#tglTransaksi").val();
                var tunai = $("#tunai").val();
                var kodePemegang = $("#kodePemegang").val();
                var noPlatKend = $("#noPlatKend").val();
                var jenisKend = $("#jenisKend").val();
                var kilometer = $("#kilometer").val();
                var currKM = $("#currKM").val();
                var nextService = $("#nextService").val();
                var idUser = $("#id_user").val();
                var totalPenj = $("#valGrandTotal").val();

                if (totalPenj == 0 || totalPenj == null) {
                    Swal.fire(
                        'Oops!',
                        'Data service harus diisi!',
                        'warning'
                    );
                    return false;
                } else if (totalPenj != null) {
                    if (noFaktur == "") {
                        Swal.fire(
                            'Oops!',
                            'Nomor Faktur harus diisi!',
                            'warning'
                        );
                        return false;
                    } else if (tglTransaksi == "") {
                        Swal.fire(
                            'Oops!',
                            'Tanggal transaksi harus diisi!',
                            'warning'
                        );
                        return false;
                    } else if (parseInt(tunai) < parseInt(totalPenj)) {
                        Swal.fire(
                            'Oops!',
                            'Tidak cukup uang!',
                            'warning'
                        );
                        return false;
                    } else if (tunai == "" || tunai == null) {
                        Swal.fire(
                            'Oops!',
                            'Masukkan nominal tunai!',
                            'warning'
                        );
                        return false;
                    } else if (currKM == "" || currKM == null) {
                        Swal.fire(
                            'Oops!',
                            'Masukkan kilometer saat ini!',
                            'warning'
                        );
                        return false;
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url() ?>penjualan/transaksi/simpanTransaksiService',
                            data: {
                                no_faktur: noFaktur,
                                tglTransaksi: tglTransaksi,
                                tunai: tunai,
                                kodePemegang: kodePemegang,
                                noPlatKend: noPlatKend,
                                jenisKend: jenisKend,
                                kilometer: kilometer,
                                currKM: currKM,
                                nextService: nextService,
                                id_user: idUser
                            },
                            cache: false,
                            success: function(respond) {
                                if (respond == 1) {
                                    Swal.fire(
                                        'Oops!',
                                        'Nomor Faktur Sudah ada!',
                                        'warning'
                                    );
                                }
                            }
                        });
                        Swal.fire({
                            title: 'Redirect ke halaman histori transaksi service?',
                            showDenyButton: true,
                            confirmButtonText: 'Ya',
                            denyButtonText: 'Tidak',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = "<?= site_url(); ?>penjualan/transaksi/service_proses"
                            } else if (result.isDenied) {
                                location.reload();
                            }
                        })
                    }
                }
            });
            $(".pilihServiceBaru").click(function() {
                var kode_service_temp = $("#kode_service_temp").val();
                var namaServiceBaru = $("#nama_service_baru").val();
                var tipe_kendaraan_baru = $("#tipe_kendaraan_baru").val();
                var jenis_kendaraan_baru = $("#jenis_kendaraan_baru").val();
                var harga_baru = $("#harga_baru").val();
                var kode_antri = $("#kode_antri").val();


                if (namaServiceBaru == "") {
                    Swal.fire('Oops!', 'Nama Service Baru Tidak Boleh Kosong!', 'warning');
                } else if (tipe_kendaraan_baru == "") {
                    Swal.fire('Oops!', 'Tipe Kendaraan Tidak Boleh Kosong!', 'warning');
                } else if (kode_service_temp == "") {
                    Swal.fire('Oops!', 'Kode Service Tidak Boleh Kosong!', 'warning');
                } else if (harga_baru == "") {
                    Swal.fire('Oops!', 'Harga Service Tidak Boleh Kosong!', 'warning');
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url(); ?>penjualan/transaksi/tambahServiceBaru',
                        data: {
                            kode_service: kode_service_temp,
                            nama_service: namaServiceBaru,
                            jenis_kendaraan: jenis_kendaraan_baru,
                            tipe_kendaraan: tipe_kendaraan_baru,
                            harga_service: harga_baru,
                        },
                        cache: false,
                        success: function(respond) {
                            Swal.fire('Success!', 'Data Service Baru Berhasil Ditambahkan!', 'success');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>