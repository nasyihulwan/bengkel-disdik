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
                                    <input type="text" class="form-control" name="noFaktur" id="noFaktur" placeholder="Nomor Faktur" value="<?= $no_faktur ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?= date("Y-m-d") ?>" class="form-control" id="tglTransaksi" placeholder="Tanggal Transaksi">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="hidden" id="kodePelanggan">
                                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Pelanggan" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="hidden" value="<?= $user['id'] ?>" name="idUser" id="id_user">
                                    <input type="text" class="form-control" value="<?= $user['id'] ?> - <?= $user['nama'] ?>" name="nama_user" id="nama_user" placeholder="Kasir" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text" style="font-size: 1.25em;">Total Pembayaran</span>
                                <span class="info-box-number" id="totalPenjualanBarang" style="font-size: 2.5rem;">0</span>
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
                                            <input type="text" class="form-control" readonly name="kode_barang" id="kode_barang" placeholder="Kode Barang">
                                            <input type="hidden" name="tipe_barang" id="tipe_barang">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" class="form-control" readonly name="nama_barang" id="nama_barang" placeholder="Nama Barang">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" class="form-control" readonly style="text-align:right" name="harga_barang" id="harga_barang" placeholder="Harga">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="hidden" name="stok" id="stok">
                                            <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty">
                                        </div>
                                    </div>
                                    <div class="col-md text-right">
                                        <a href="#" class="btn btn-primary" id="tambahBarang">
                                            <i class="fa fa-plus"> </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan="9" class="text-center">Table Data Barang</th>
                                                </tr>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Tipe</th>
                                                    <th>Jenis Kendaraan</th>
                                                    <th>Harga</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="loadDataBarang">
                                                <?php include 'barang_detail_temp.php'; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-2">
                                            <a href="#" class="btn btn-primary w-100" id="simpanPenjualan">
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
        <div class="modal fade" id="modal_pelanggan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered" id="tablePelanggan">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Pelanggan</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>No HP</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($pelanggan as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_pelanggan ?></td>
                                    <td><?= $row->nama_pelanggan ?></td>
                                    <td><?= $row->alamat_pelanggan ?></td>
                                    <td><?= $row->no_telp ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilih" data-kodePelanggan="<?= $row->kode_pelanggan ?>" data-namaPelanggan="<?= $row->nama_pelanggan ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="modalBarang_harga">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Barang Harga</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Barang</td>
                                    <td>Nama</td>
                                    <td>Tipe</td>
                                    <td>Merk</td>
                                    <td>Model</td>
                                    <td>Harga</td>
                                    <td>Stok</td>
                                    <td>Jenis Kendaraan</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($barang as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_barang ?></td>
                                    <td><?= $row->nama_barang ?></td>
                                    <td><?= $row->tipe_barang ?></td>
                                    <td><?= $row->merk ?></td>
                                    <td><?= $row->model ?></td>
                                    <td><?= $row->harga_jual ?></td>
                                    <td><?= $row->stok ?></td>
                                    <td><?= $row->jenis_kendaraan ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilihBarang" data-kodeBarang="<?= $row->kode_barang ?>" data-namaBarang="<?= $row->nama_barang ?>" data-hargaBarang="<?= $row->harga_jual ?>" data-tipeBarang="<?= $row->tipe_barang ?>" data-stokBarang="<?= $row->stok ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalService_harga">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Service Harga</h4>
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
                                    <td>Harga</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($service as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_service ?></td>
                                    <td><?= $row->nama_service ?></td>
                                    <td><?= ucfirst($row->jenis) ?></td>
                                    <td align="right"><?= number_format($row->harga, '0', '', '.') ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilihService" data-kodeService="<?= $row->kode_service ?>" data-namaService="<?= $row->nama_service ?>" data-hargaService="<?= $row->harga ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(document.getElementById('tglTransaksi'), {});
        });
        $(function() {

            function hideBarang() {
                $("#inputBarangTemp").hide();
            };

            function showBarang() {
                $("#inputBarangTemp").show();
            };

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

            function loadDataBarang() {
                var idUser = $("#id_user").val();
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>penjualan/transaksi/getDataBarangTemp',
                    data: {
                        id_user: idUser
                    },
                    cache: false,
                    success: function(respond) {
                        $("#loadDataBarang").html(respond);
                    }
                });
            };

            loadDataBarang();

            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            $("#nama_pelanggan").click(function() {
                $("#modal_pelanggan").modal("show");
            });

            $("#kode_barang").click(function() {
                $("#modalBarang_harga").modal("show");
            });
            $("#kode_service").click(function() {
                $("#modalService_harga").modal("show");
            });


            $(".pilih").click(function() {
                var kodePelanggan = $(this).attr("data-kodePelanggan");
                var namaPelanggan = $(this).attr("data-namaPelanggan");

                $("#kodePelanggan").val(kodePelanggan);
                $("#nama_pelanggan").val(namaPelanggan);
                $("#modal_pelanggan").modal("hide");
            });

            $(".pilihBarang").click(function() {
                var kodeBarang = $(this).attr("data-kodeBarang");
                var namaBarang = $(this).attr("data-namabarang");
                var hargaBarang = $(this).attr("data-hargaBarang");
                var tipeBarang = $(this).attr("data-tipeBarang");
                var stok = $(this).attr("data-stokBarang");

                $("#kode_barang").val(kodeBarang);
                $("#nama_barang").val(namaBarang);
                $("#harga_barang").val(hargaBarang);
                $("#tipe_barang").val(tipeBarang);
                $("#stok").val(stok);

                $("#modalBarang_harga").modal("hide");
            });

            $("#tambahBarang").click(function() {
                var kodeBarang = $("#kode_barang").val();
                var hargaBarang = $("#harga_barang").val();
                var tipeBarang = $("#tipe_barang").val();
                var stok = $("#stok").val();
                var qty = $("#qty").val();
                var idUser = $("#id_user").val();

                if (kodeBarang == " " || kodeBarang == null) {
                    Swal.fire(
                        'Oops!',
                        'Kode barang harus diisi!',
                        'warning'
                    );
                } else if (parseInt(qty) > stok) {
                    Swal.fire(
                        'Oops!',
                        'Jumlah barang lebih banyak daripada stok!',
                        'warning'
                    );
                } else if (qty == " " || qty == 0) {
                    Swal.fire(
                        'Oops!',
                        'Qty barang harus diisi!',
                        'warning'
                    );
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url(); ?>penjualan/transaksi/simpanBarangTemp',
                        data: {
                            kode_barang: kodeBarang,
                            harga: hargaBarang,
                            tipe_barang: tipeBarang,
                            qty: qty,
                            id_user: idUser
                        },
                        cache: false,
                        success: function(respond) {
                            if (respond == 1) {
                                Swal.fire(
                                    'Oops!',
                                    'Data Barang Sudah ada!',
                                    'warning'
                                );
                            } else {
                                loadDataBarang();
                            }
                        }
                    });
                }
            });

            $("#simpanPenjualan").click(function() {
                var no_faktur = $("#noFaktur").val();
                var tgl_transaksi = $("#tglTransaksi").val();
                var kode_pelanggan = $("#kodePelanggan").val();
                var id_user = $("#id_user").val();
                var totalPenj = $("#valGrandTotal").val();

                if (totalPenj == 0 || totalPenj == null) {
                    Swal.fire(
                        'Oops!',
                        'Data barang harus diisi!',
                        'warning'
                    );
                    return false;
                } else {
                    if (no_faktur == "") {
                        Swal.fire(
                            'Oops!',
                            'Nomor Faktur harus diisi!',
                            'warning'
                        );
                        return false;
                    } else if (tgl_transaksi == "") {
                        Swal.fire(
                            'Oops!',
                            'Tanggal transaksi harus diisi!',
                            'warning'
                        );
                        return false;
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url() ?>penjualan/transaksi/simpanPenjBarang',
                            data: {
                                noFaktur: no_faktur,
                                tglTransaksi: tgl_transaksi,
                                kodePelanggan: kode_pelanggan,
                                idUser: id_user
                            },
                            cache: false,
                            success: function(respond) {
                                if (respond == 1) {
                                    Swal.fire(
                                        'Oops!',
                                        'Nomor Faktur Sudah ada!',
                                        'warning'
                                    );
                                } else {
                                    Swal.fire({
                                        title: 'Redirect ke halaman histori penjualan?',
                                        showDenyButton: true,
                                        confirmButtonText: 'Ya',
                                        denyButtonText: 'Tidak',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.href = "<?= site_url(); ?>penjualan/transaksi/transaksi_barang_pending"
                                        } else if (result.isDenied) {
                                            location.reload();
                                        }
                                    })
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>