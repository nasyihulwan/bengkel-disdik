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
                            <h1 class="m-0"><?= $title; ?></h1>
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
                                    <a href="<?= site_url('pengaturan/user/tambah_user') ?>" class="btn-lg btn-primary"><i class="fas fa-plus"></i> Tambah User</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>No. HP</th>
                                                <th>Alamat</th>
                                                <th>Dibuat Sejak</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($tampilUser as $row) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><img src="<?= base_url('dist/img/') . $row->image ?>" alt="User Image" class="card-image" style="max-height: 80px; max-width: 80px;"></td>
                                                    <td><?= $row->nama ?></td>
                                                    <td><?= $row->role_name ?></td>
                                                    <td><?= $row->email ?></td>
                                                    <td><?= $row->no_telp ?></td>
                                                    <td><?= $row->alamat ?></td>
                                                    <td><?= date('d F Y', $row->date_created) ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary updateRole" data-roleId="<?= $row->id_role ?>" data-idUser="<?= $row->iduser ?>" data-roleName="<?= $row->role_name ?>" data-nama="<?= $row->nama ?>">Update Role</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th>No. HP</th>
                                                <th>Alamat</th>
                                                <th>Dibuat Sejak</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
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
                        <h5 class="modal-title">Update Role User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Nama User</label>
                            <input type="text" class="form-control" name="username" id="username" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="role_name">Role</label>
                            <input type="text" id="id_user" value="">
                            <input type="text" id="role_id" value="">
                            <input type="text" class="form-control" name="role_name" id="role_name" value="" readonly>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role" id="select_role">
                                <option value="role" id="roleOption" style="text-align: center;">---Role---</option>
                                <option value="1" id="administrator">Administrator</option>
                                <option value="2" id="admin">Admin</option>
                                <option value="3" id="staff">Staff</option>
                                <option value="4" id="supplier">Supplier</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="#" class="btn btn-primary simpanRole">Update Role</a>
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
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
                    "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $(".updateRole").click(function() {
                var iduser = $(this).attr("data-idUser");
                var rolename = $(this).attr("data-roleName");
                var nama = $(this).attr("data-nama");
                var idrole = $(this).attr("data-roleId");

                if (iduser == 1 && rolename == 'Administrator') {
                    swal.fire('403', 'Akses Terlarang! <br> Role Untuk User Ini Tidak Dapat Diubah!', 'warning');
                } else if (iduser == 2) {
                    swal.fire('403', 'Akses Terlarang! <br> Role Untuk User Ini Tidak Dapat Diubah!', 'warning');
                } else if (iduser == 3) {
                    swal.fire('403', 'Akses Terlarang! <br> Role Untuk User Ini Tidak Dapat Diubah!', 'warning');
                } else if (iduser == 4) {
                    swal.fire('403', 'Akses Terlarang! <br> Role Untuk User Ini Tidak Dapat Diubah!', 'warning');
                } else {
                    $("#modalUpdate").modal("show");
                    $("#username").val(nama);
                    $("#role_name").val(rolename);
                    $("#role_id").val(idrole);
                    $("#id_user").val(iduser);

                }
            });

            $(".simpanRole").click(function() {
                var role = $("#select_role").val();
                var roleoption = $("#roleOption").val();
                var curr_role = $("#role_id").val();

                if (role == 'role') {
                    swal.fire('Oops!', 'Silahkan Pilih Role User!', 'warning');
                } else if (role == curr_role) {
                    swal.fire('Oops!', 'Role Tidak Boleh Sama Dari Sebelumnya!', 'warning');
                } else {
                    id_user = $('#id_user').val();
                    newrole = $('#select_role').val();
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url() ?>pengaturan/user/update_role',
                        data: {
                            id_user: id_user,
                            new_role: newrole,
                        },
                        cache: false,
                        success: function(respond) {
                            $("#modalUpdate").modal('hide');
                            Swal.fire({
                                title: 'Success!',
                                text: 'User Role Berhasil Diupdate',
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
            })
        });
    </script>
</body>

</html>