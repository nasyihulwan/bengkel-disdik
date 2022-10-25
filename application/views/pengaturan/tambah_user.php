<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('dist/img/ntrd1.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

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
            <div class="col-md-8 mx-auto">
                <div class="card card-primary">
                    <?= $this->session->flashdata('message') ?>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="<?= site_url('pengaturan/user/tambah_user') ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="<?= set_value('nama') ?>">
                                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" value="<?= set_value('email') ?>">
                                <?= form_error('email', '<small class="text-danger pl-2">', '</small>') ?>
                            </div>
                            <label>Password</label>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan password">
                                    <?= form_error('password1', '<small class="text-danger pl-2">', '</small>') ?>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon" value="<?= set_value('no_telp') ?>">
                                <?= form_error('no_telp', '<small class="text-danger pl-2">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="role_id">Pilih Jenis Role</label>
                                <select class="form-control" id="role_id" name="role_id" placeholder="Masukkan Jenis Role" value="<?= set_value('role_id') ?>">
                                    <option value="1">Administrator</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Warehouse Staff</option>
                                    <option value="4" id="supplier">Supplier</option>
                                </select>

                                <?= form_error('role_name', '<small class="text-danger pl-2">', '</small>') ?>
                            </div>
                            <div class="form-group" id="supp">
                                <label for="kode_supplier">Pilih Supplier</label>
                                <input type="hidden" id="kode_supplier" name="kode_supplier">
                                <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" readonly>

                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= set_value('alamat') ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>') ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Modal -->
        <div class="modal fade" id="modal_supplier">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Supplier</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered" id="tabelSupplier">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Supplier</td>
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Alamat</td>
                                    <td>No HP</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <?php $no = 0;
                            foreach ($supplier as $row) {
                                $no++ ?>
                                <tbody>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_supplier ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $row->alamat ?></td>
                                    <td><?= $row->no_telp ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm btn-primary pilih" data-kodeSupplier="<?= $row->kode_supplier ?>" data-namaSupplier="<?= $row->nama ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                </tbody>
                            <?php } ?>
                        </table>
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

    <?php $this->load->view("_partials/v_js.php") ?>
    <script>
        $(function() {

            $("#supp").hide();

            $("#role_id").change(function() {
                kodeSupplier = $("#kode_supplier").val();
                role_id = $("#role_id").val();
                if (role_id == 4) {
                    $("#supp").show();

                    $("#submit").click(function() {
                        if (kodeSupplier == "") {
                            swal.fire('', 'Supplier Tidak Boleh Kosong!', 'warning')
                            return false;
                        } else {
                            return true;
                        }
                    });
                } else {
                    $("#supp").hide();
                }
            });

            $("#nama_supplier").click(function() {
                $("#modal_supplier").modal("show");
            });

            $(".pilih").click(function() {
                kodeSupplier = $(this).attr("data-kodeSupplier");
                namaSupplier = $(this).attr("data-namaSupplier");

                $("#kode_supplier").val(kodeSupplier);
                $("#nama_supplier").val(namaSupplier);
                $("#modal_supplier").modal("hide");
            });
        });
    </script>
</body>

</html>