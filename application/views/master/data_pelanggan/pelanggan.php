<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_partials/v_head.php") ?>
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.cs') ?>s">
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
                                    <a href="<?= site_url('master/pelanggan/tambah') ?>" class="btn-lg btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                                </div>
                                <div class="card-header">
                                    <?= form_open_multipart('master/pelanggan/export_excel'); ?>
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
                                    <a href="<?= base_url('/template-excel/NTRD Garage Template Data Pelanggan.xlsx') ?>" class="btn btn-secondary mt-2 col-lg" download>Download template excel</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID PELANGGAN</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($tampilPelanggan as $row) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?> </td>
                                                    <td><?= $row->kode_pelanggan ?> </td>
                                                    <td><?= $row->nama_pelanggan ?></td>
                                                    <td><?= $row->alamat_pelanggan ?></td>
                                                    <td><?= $row->no_telp ?></td>
                                                    <td>
                                                        <div class="btn-group container">
                                                            <a href="<?= site_url('master/pelanggan/update') ?>/<?= $row->kode_pelanggan ?>" class=" btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                                            <?php if ($this->session->userdata('role_id') == 1) { ?>
                                                                <a href="<?= site_url('master/pelanggan/fungsi_delete') ?>/<?= $row->kode_pelanggan ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a>
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
                "buttons": ["copy", "excel", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;
        });
        $('.dataTables_length').addClass('bs-select');
    </script>
</body>

</html>