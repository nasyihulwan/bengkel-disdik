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
              <h1 class="m-0">Data Kendaraan</h1>
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
                  <a href="<?= site_url('master/kendaraan/tambah_kendaraan') ?>" class="btn-lg btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-header">
                  <?= form_open_multipart('master/kendaraan/export_excel'); ?>
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
                  <a href="<?= base_url('/template-excel/NTRD Garage Template Data Kendaraan.xlsx') ?>" class="btn btn-secondary mt-2 col-lg" download>Download template excel</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>No. Registrasi</th>
                        <th>Pemilik</th>
                        <th>Alamat</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Jenis</th>
                        <th>Thn. Pembuatan</th>
                        <th>CC</th>
                        <th>No. Rangka</th>
                        <th>No. Mesin</th>
                        <th>Warna</th>
                        <th>Bahan Bakar</th>
                        <th>Warna TNKB</th>
                        <th>Thn. Registrasi</th>
                        <th>NOMOR BPKB</th>
                        <th>KODE LOKASI</th>
                        <th>Berlaku Sampai</th>
                        <th>Terakhir Service</th>
                        <th>Kilometer</th>
                        <th>Kode Pemegang</th>
                        <th class="notexport">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($tampilKendaraan as $row) {
                        $no++;
                      ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $row->no_regis ?></td>
                          <td><?= $row->nama_pemilik ?></td>
                          <td><?= $row->alamat ?></td>
                          <td><?= $row->merk ?></td>
                          <td><?= $row->tipe ?></td>
                          <td><?= $row->jenis ?></td>
                          <td><?= $row->thn_pembuatan ?></td>
                          <td><?= $row->silinder ?></td>

                          <td><?= $row->no_rangka ?></td>
                          <td><?= $row->no_mesin ?></td>
                          <td><?= $row->warna ?></td>
                          <td><?= $row->bahan_bakar ?></td>
                          <td><?= $row->warna_tnkb ?></td>
                          <td><?= $row->thn_registrasi ?></td>
                          <td><?= $row->no_bpkb ?></td>
                          <td><?= $row->kd_lokasi ?></td>
                          <td><?= $row->berlaku_sampai ?></td>
                          <td><?= $row->service_terakhir ?></td>
                          <td><?= $row->kilometer ?></td>
                          <td style="text-align: center;" class="exclude">
                            <?php if ($row->kode_pemegang == "" || $row->kode_pemegang == null) { ?>
                              <a href="#" class="btn btn-sm btn-secondary pilihPemegang" data-platKend="<?= $row->no_regis ?>"> <i class="fa fa-plus"></i> </a>
                            <?php } else { ?>
                              <a href="<?= site_url() ?>master/pemegang/update_pemegang/<?= $row->kode_pemegang ?>" target="_blank" class="btn btn-sm btn-primary"><?= $row->kode_pemegang ?></a>
                            <?php } ?>
                          </td>
                          <td>
                            <div class="btn-group container">
                              <a href="<?= site_url('master/kendaraan/update_kendaraan') ?>/<?= $row->no_regis ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                              <?php if ($this->session->userdata('role_id') == 1) { ?>
                                <a href="<?= site_url('master/kendaraan/fungsi_delete') ?>/<?= $row->no_regis ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a>
                              <?php } ?>
                            </div>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>No. Registrasi</th>
                        <th>Pemilik</th>
                        <th>Alamat</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Jenis</th>
                        <th>Thn. Pembuatan</th>
                        <th>CC</th>
                        <th>No. Rangka</th>
                        <th>No. Mesin</th>
                        <th>Warna</th>
                        <th>Bahan Bakar</th>
                        <th>Warna TNKB</th>
                        <th>Thn. Registrasi</th>
                        <th>NOMOR BPKB</th>
                        <th>KODE LOKASI</th>
                        <th>Berlaku Sampai</th>
                        <th>Terakhir Service</th>
                        <th>Kilometer</th>
                        <th>Kode Pemegang</th>
                        <th>AKSI</th>
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
            <table class="table table-striped table-bordered" id="tablePemegang">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pemegang</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Aksi</th>
                </tr>
              </thead>
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
        "scrollX": true,
        "lengthChange": true,
        "autoWidth": true,
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
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $("#tablePemegang").DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": true,
        autoWidth: false,
        info: false,
        filter: false,
        lengthChange: false,
        paging: false,
        "ajax": {
          "url": "<?= base_url("master/kendaraan/json_pemegang"); ?>"
        }
      });

      $("body").on("click", ".tambahPemegang", function() {
        var pk = jQuery(this).attr("data-plat");
        var kdpemegang = jQuery(this).attr("data-kdpemegang");

        $.ajax({
          type: 'POST',
          url: '<?= site_url() ?>master/kendaraan/tambahpemegang',
          data: {
            nomor_plat: pk,
            kode_pemegang: kdpemegang
          },
          cache: false,
          success: function(respond) {
            $("#modal_pemegang").modal('hide');
            Swal.fire({
              title: 'Success!',
              text: 'Data Pemegang Kendaraan Berhasil Ditambahkan!',
              icon: 'success',
              confirmButtonText: 'OK',
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })
          }
        });
      });

      $(".pilihPemegang").click(function() {
        var platkend = $(this).attr("data-platKend");

        jQuery("#tablePemegang").DataTable().ajax.url("<?= base_url("master/kendaraan/json_pemegang"); ?>/" + platkend).load();
        jQuery("#modal_pemegang").modal("toggle");
      });

    });
  </script>
</body>

</html>