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
        <?php $this->load->view("_partials/v_preloader.php") ?>

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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="<?= site_url() ?>supplier" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <a href="#" class="btn btn-primary float-right showModalTambah">Tambah Data <i class="fa fa-plus"></i></a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Barang Supplier</th>
                                                <th>Kode Supplier</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Merk</th>
                                                <th>Model</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($list_barang as $row) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $row->kode_barang ?></td>
                                                    <td><?= $row->kode_supplier ?></td>
                                                    <td><?= $row->nama_barang ?></td>
                                                    <td><?= $row->jenis_barang ?></td>
                                                    <td><?= $row->merk ?></td>
                                                    <td><?= $row->model ?></td>
                                                    <td align="right"><?= number_format($row->harga, '0', '', '.') ?></td>
                                                    <td><?= $row->stok ?></td>
                                                    <td><?= $row->jenis_kendaraan ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning showModalUpdate" data-kodeBarang="<?= $row->kode_barang ?>" data-kodeSupplier="<?= $row->kode_supplier ?>" data-namaBarang="<?= $row->nama_barang ?>" data-jenisBarang="<?= $row->jenis_barang ?>" data-merk="<?= $row->merk ?>" data-model="<?= $row->model ?>" data-harga="<?= $row->harga ?>" data-stok="<?= $row->stok ?>" data-jenisKendaraan="<?= $row->jenis_kendaraan ?>"> <i class="fa fa-edit"></i> </a>
                                                        <a href="#" class="btn btn-danger hapusBarang" data-kodeBarang="<?= $row->kode_barang ?>" data-kodeSupplier="<?= $row->kode_supplier ?>"> <i class="fa fa-trash"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php }  ?>
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
        <div class="modal fade" id="modalTambahData">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Tambah Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="hidden" name="kode_barang" id="kode_barang" value="<?= $kode_barang ?>">
                                    <input type="hidden" name="kode_supplier" id="kode_supplier" value="<?= $kode_supplier ?>">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang">Pilih Jenis Barang</label>
                                    <select class="form-control" id="jenis_barang" name="jenis_barang">
                                        <option value="selected">Pilih Jenis Barang</option>
                                        <option value="Sparepart">Sparepart</option>
                                        <option value="Oli">Oli</option>
                                        <option value="Chemical">Chemical</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk">
                                </div>
                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input type="text" class="form-control" name="model" id="model" placeholder="Model">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kendaraan">Pilih Jenis Kendaraan</label>
                                    <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
                                        <option value="selected">Pilih Jenis Kendaraan</option>
                                        <option value="Mobil">Mobil</option>
                                        <option value="Motor">Motor</option>
                                    </select>
                                </div>
                                <a href="#" class="btn btn-primary w-100 tambahDataBarang"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalUpdateData">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Update Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" id="kode_barang_update" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kode_supplier">Kode Supplier</label>
                                    <input type="text" class="form-control" name="kode_supplier" id="kode_supplier_update" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang_update" placeholder="Nama Barang" value="">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_barang">Pilih Jenis Barang</label>
                                    <select class="form-control" id="jenis_barang_update" name="jenis_barang_update">
                                        <option value="selected">Pilih Jenis Barang</option>
                                        <option value="Sparepart">Sparepart</option>
                                        <option value="Oli">Oli</option>
                                        <option value="Chemical">Chemical</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <input type="text" class="form-control" name="merk" id="merk_update" placeholder="Merk" value="">
                                </div>
                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input type="text" class="form-control" name="model" id="model_update" placeholder="Model">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga_update" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control" name="stok" id="stok_update" placeholder="Stok">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kendaraan">Pilih Jenis Kendaraan</label>
                                    <select class="form-control" id="jenis_kendaraan_update" name="jenis_kendaraan">
                                        <option value="selected">Pilih Jenis Kendaraan</option>
                                        <option value="Mobil">Mobil</option>
                                        <option value="Motor">Motor</option>
                                    </select>
                                </div>
                                <a href="#" class="btn btn-primary w-100 updateDataBarang"><i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

            $(".showModalTambah").click(function() {
                $("#modalTambahData").modal('show');
            });

            $(".tambahDataBarang").click(function() {
                jenis_barang = $("#jenis_barang").val();
                jenis_kendaraan = $("#jenis_kendaraan").val();

                kode_barang = $("#kode_barang").val();
                kode_supplier = $("#kode_supplier").val();
                nama_barang = $("#nama_barang").val();
                merk = $("#merk").val();
                model = $("#model").val();
                harga = $("#harga").val();
                stok = $("#stok").val();

                if (jenis_barang == 'selected') {
                    swal.fire('', 'Pilih Jenis Barang!', 'warning')
                } else if (jenis_kendaraan == 'selected') {
                    swal.fire('', 'Pilih Jenis Kendaraan!', 'warning')
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url() ?>supplier/tambahBarang',
                        data: {
                            kode_barang: kode_barang,
                            kode_supplier: kode_supplier,
                            nama_barang: nama_barang,
                            jenis_barang: jenis_barang,
                            merk: merk,
                            model: model,
                            harga: harga,
                            stok: stok,
                            jenis_kendaraan: jenis_kendaraan
                        },
                        cache: false,
                        success: function(respond) {
                            Swal.fire({
                                icon: 'success',
                                text: 'Data Barang Berhasil Ditambah!',
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

            $(".showModalUpdate").click(function() {
                $("#modalUpdateData").modal("show");
                kode_barang = $(this).attr("data-kodeBarang");
                $("#kode_barang_update").val(kode_barang);

                kode_supplier = $(this).attr("data-kodeSupplier");
                $("#kode_supplier_update").val(kode_supplier);

                nama_barang = $(this).attr("data-namaBarang");
                $("#nama_barang_update").val(nama_barang);

                jenis_barang = $(this).attr("data-jenisBarang");
                $("#jenis_barang_update").val(jenis_barang);

                merk = $(this).attr("data-merk");
                $("#merk_update").val(merk);

                model = $(this).attr("data-model");
                $("#model_update").val(model);

                harga = $(this).attr("data-harga");
                $("#harga_update").val(harga);

                stok = $(this).attr("data-stok");
                $("#stok_update").val(stok);

                jenis_kendaraan = $(this).attr("data-jenisKendaraan");
                $("#jenis_kendaraan_update").val(jenis_kendaraan);


                $(".updateDataBarang").click(function() {
                    kode_barang_update = $("#kode_barang_update").val();
                    kode_supplier_update = $("#kode_supplier_update").val();
                    nama_barang_update = $("#nama_barang_update").val();
                    jenis_barang_update = $("#jenis_barang_update").val();
                    merk_update = $("#merk_update").val();
                    model_update = $("#model_update").val();
                    harga_update = $("#harga_update").val();
                    stok_update = $("#stok_update").val();
                    jenis_kendaraan_update = $("#jenis_kendaraan_update").val();

                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url() ?>supplier/updateBarang',
                        data: {
                            kode_barang: kode_barang_update,
                            kode_supplier: kode_supplier_update,
                            nama_barang: nama_barang_update,
                            jenis_barang: jenis_barang_update,
                            merk: merk_update,
                            model: model_update,
                            harga: harga_update,
                            stok: stok_update,
                            jenis_kendaraan: jenis_kendaraan_update
                        },
                        cache: false,
                        success: function(respond) {
                            Swal.fire({
                                icon: 'success',
                                text: 'Data Barang Berhasil Diupdate!',
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        }
                    });
                });

            });

            $(".hapusBarang").click(function() {
                kodeBarang = $(this).attr("data-kodeBarang");
                kodeSupplier = $(this).attr("data-kodeSupplier");

                $.ajax({
                    type: 'POST',
                    url: '<?= site_url() ?>supplier/hapusBarang',
                    data: {
                        kode_barang: kodeBarang,
                        kode_supplier: kodeSupplier
                    },
                    cache: false,
                    success: function(respond) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Data Barang Berhasil Dihapus!',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }
                });
            })
        });
        $('.dataTables_length').addClass('bs-select');
    </script>
</body>

</html>