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
                                <form action="<?= site_url('penjualan/transaksi/redirect_pemegang') ?>" method="POST" id="pemegang">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        </div>
                                        <input type="hidden" name="kode_pemegang" id="kode_pemegang">
                                        <input type="text" class="form-control" name="nama_pemegang" id="nama_pemegang" placeholder="Pemegang Kendaraan" readonly>
                                    </div>
                                    <div class="input-group ">
                                        <button type="submit" class="btn btn-primary w-100" id="next">Berikutnya</button>
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
            flatpickr(document.getElementById('tglTransaksi'), {});
        });

        $(function() {
            $("#pemegang").submit(function() {
                kode_pemegang = $("#kode_pemegang").val();

                if (kode_pemegang == "" || kode_pemegang == null) {
                    Swal.fire('Oops!', 'Data pemegang kendaraan tidak boleh kosong', 'warning');
                    return false;
                }
            });
        });

        $("#nama_pemegang").click(function() {
            $("#modal_pemegang").modal("show");
        });

        $(".pilih").click(function() {
            var kodePemegang = $(this).attr("data-kodePemegang");
            var namaPemegang = $(this).attr("data-namaPemegang");

            $("#kode_pemegang").val(kodePemegang);
            $("#nama_pemegang").val(namaPemegang);

            $("#modal_pemegang").modal("hide");

        });
    </script>
</body>

</html>