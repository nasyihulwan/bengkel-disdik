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
                                    <a href="<?= site_url('master/supplier/tambah') ?>" class="btn-lg btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                                </div>
                                <div class="card-header">
                                    <?= form_open_multipart('master/supplier/export_excel'); ?>
                                    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                                    <div class="input-group">
                                        <div class="custom-file col-auto">
                                            <input type="file" name="filexls" class="custom-file-input" id="formFile">
                                            <label class="custom-file-label" for="filexls">Upload File XLS/XLSX</label>
                                        </div>
                                        <div class="col-auto">
                                            <input class="btn btn-primary float-right" type="submit" name="submit" id="formFile" value="Import Data Excel">
                                        </div>
                                    </div>
                                    </form>
                                    <a href="<?= base_url('/template-excel/NTRD Garage Template Data Supplier.xlsx') ?>" class="btn btn-secondary mt-2 col-lg" download>Download template excel</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>KODE SUPPLIER</th>
                                                <th>ID USER</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($tampilSupplier as $row) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?> </td>
                                                    <td><?= $row->kode_supplier ?> </td>
                                                    <td><?= $row->id_user ?> </td>
                                                    <td><?= $row->nama ?></td>
                                                    <td><?= $row->email ?></td>
                                                    <td><?= $row->alamat ?></td>
                                                    <td><?= $row->no_telp ?></td>
                                                    <td>
                                                        <div class="btn-group container">
                                                            <?php if ($row->id_user == "") { ?>
                                                                <a href="<?= site_url('master/supplier/update') ?>/<?= $row->kode_supplier ?>" class=" btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Tambah Akun</a>
                                                            <?php } ?>
                                                            <a href="<?= site_url('master/supplier/update') ?>/<?= $row->kode_supplier ?>" class=" btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                                            <?php if ($this->session->userdata('role_id') == 1) { ?>
                                                                <a href="<?= site_url('master/supplier/fungsi_delete') ?>/<?= $row->kode_supplier ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                                            <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
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
                "scrollX": true,
                "buttons": [
                    "copy",
                    {
                        extend: 'excel',
                        text: 'Export',
                        className: 'btn btn-primary',
                        exportOptions: {
                            columns: ":visible th:not(:last-child)",
                        }
                    },
                    "print",
                    "colvis",
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;
        });
        $('.dataTables_length').addClass('bs-select');
    </script>
</body>

</html>