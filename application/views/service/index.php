<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/v_head.php") ?>


  <link rel="stylesheet" href="<?= base_url('dist/service/style.css') ?> ">
</head>

<body>
  <!-- partial:index.partial.html -->

  <!--PEN HEADER-->
  <header class="header">
    <h1 class="header__title">Form Transaksi Service</h1>
  </header>
  <!--PEN CONTENT     -->
  <div class="content">
    <!--content inner-->
    <div class="content__inner">
      <div class="container" hidden>
        <!--content title-->
        <h2 class="content__title content__title--m-sm">Pick animation type</h2>
        <!--animations form-->
        <form class="pick-animation my-4">
          <div class="form-row">
            <div class="col-5 m-auto">
              <select class="pick-animation__select form-control">
                <option value="scaleIn" selected="selected">ScaleIn</option>
                <option value="scaleOut">ScaleOut</option>
                <option value="slideHorz">SlideHorz</option>
                <option value="slideVert">SlideVert</option>
                <option value="fadeIn">FadeIn</option>
              </select>
            </div>
          </div>
        </form>
        <!--content title-->
        <h2 class="content__title">Click on steps or 'Prev' and 'Next' buttons</h2>
      </div>
      <div class="container overflow-hidden">
        <!--multisteps-form-->
        <div class="multisteps-form">
          <!--progress bar-->
          <div class="row">
            <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
              <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Pemegang Kendaraan</button>
                <button class="multisteps-form__progress-btn" type="button" title="Address" id="stepKendaraan">Kendaraan</button>
                <button class="multisteps-form__progress-btn" type="button" title="Booking Info" id="stepBookingInfo">Booking Info</button>
                <button class="multisteps-form__progress-btn" type="button" title="Comments" id="stepKeterangan">Keterangan </button>
              </div>
            </div>
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-8 m-auto">
              <form class="multisteps-form__form">
                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">Data Anda</h3>
                  <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="nmLengkap" id="nmLengkap" placeholder="Full Name" required>
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="nip" id="nip" placeholder="NIP" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="no_telp" id="no_telp" placeholder="No. Telp" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="email" name="email" id="email" placeholder="Email" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="plat_nomor" id="plat_nomor" placeholder="Plat Nomor Kendaraan" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="nama_tipe_kendaraan" id="nama_tipe_kendaraan" placeholder="Nama Tipe Kendaraan" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-12">
                        <input class="multisteps-form__input form-control" type="text" name="jenis_kend" id="jenis_kend" placeholder="Jenis Kendaraan" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-12">
                        <textarea class="multisteps-form__input form-control" type="text" name="alamat_pemegang" id="alamat_pemegang" placeholder="Alamat" cols="15" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" id="pemegangNext">Selanjutnya</button>
                    </div>
                  </div>
                </div>
                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">Data Kendaraan Anda</h3>
                  <h6 class="form-text text-muted">Memasukkan Data Sesuai Dengan Yang Ada Pada STNK.</h6>

                  <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="no_regis" id="no_regis" placeholder="Plat Nomor Kendaraan" value="" readonly />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="alamat_stnk" id="alamat_stnk" placeholder="Alamat" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="merk" id="merk" placeholder="Merk" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="tipe" id="tipe" placeholder="Tipe" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="jenis" id="jenis" placeholder="Jenis" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="thn_pembuatan" id="thn_pembuatan" placeholder="Tahun Pembuatan" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="silinder" id="silinder" placeholder="Silinder" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="no_rangka" id="no_rangka" placeholder="No Rangka" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="no_mesin" id="no_mesin" placeholder="No Mesin" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="warna" id="warna" placeholder="Warna" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="bahan_bakar" id="bahan_bakar" placeholder="Jenis Bahan Bakar" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="warna_tnkb" id="warna_tnkb" placeholder="Warna TNKB / PLAT" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="thn_registrasi" id="thn_registrasi" placeholder="Tahun Registrasi" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="no_bpkb" id="no_bpkb" placeholder="Nomor BPKB" />
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="kd_lokasi" id="kd_lokasi" placeholder="Kode Lokasi" />
                      </div>
                    </div>
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control" type="text" name="berlaku_sampai" id="berlaku_sampai" placeholder="Berlaku Sampai">
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control" type="text" name="kilometer" id="kilometer" placeholder="Kilometer" />
                      </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Selanjutnya</button>
                    </div>
                  </div>
                </div>
                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                  <h3 class="multisteps-form__title mb-4">Booking Info</h3>
                  <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                      <div class="col-12 col-sm-12">
                        <h6 class="form-text text-muted">Booking Service Untuk Tanggal</h6>
                        <input class="multisteps-form__input form-control" type="date" name="booking_date" id="booking_date" min="2022-10-08" placeholder="Pilih Tanggal Booking" />
                      </div>
                    </div>
                    <div class="pick-animation my-4">
                      <div class="form-row mt-4">
                        <h6 class="form-text text-muted">Konfirmasi Kembali Jenis Service</h6>
                        <div class="col-12 m-auto mt-3">
                          <select class="form-control" id="jenisService">
                            <option value="Perawatan Rutin">Perawatan Rutin</option>
                            <option value="Service Ringan">Service Ringan</option>
                            <option value="Service Besar">Service Besar</option>
                            <option value="Lainnya">Lainnya (Tulis Di Keterangan)</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" id="bookingInfoNext">Selanjutnya</button>
                    </div>
                  </div>
                </div>
                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">Keterangan</h3>
                  <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                      <textarea class="multisteps-form__textarea form-control" placeholder="Keterangan Tambahan (Opsional)" id="ket_booking" cols="15" rows="5"></textarea>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Sebelumnya</button>
                      <a href="#" class="btn btn-success ml-auto" type="button" title="Send" id="booking">Kirim</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Script -->
  <?php $this->load->view("_partials/v_js.php") ?>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'></script>
  <script src=" <?= base_url('dist/service/script.js') ?>"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      flatpickr(document.getElementById('berlaku_sampai'), {});
    });
    document.addEventListener("DOMContentLoaded", function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = yyyy + '-' + mm + '-' + dd;
      flatpickr(document.getElementById('booking_date'), {
        minDate: today
      });
    });
    $(function() {

      $("#stepKendaraan,#pemegangNext").click(function() {
        var plat_nomor = $("#plat_nomor").val();
        document.getElementById("no_regis").value = plat_nomor;
      });

      $("#booking").click(function() {

        var namaLengkap = $("#nmLengkap").val();
        var nip = $("#nip").val();
        var no_telp = $("#no_telp").val();
        var email = $("#email").val();
        var plat_nomor = $("#plat_nomor").val();
        var nama_tipe_kendaraan = $("#nama_tipe_kendaraan").val();
        var jenis_kend = $("#jenis_kend").val();
        var alamat_pemegang = $("#alamat_pemegang").val();

        var no_regis = $("#no_regis").val();
        document.getElementById("no_regis").value = plat_nomor;

        var nama_pemilik = $("#nama_pemilik").val();
        var alamat_stnk = $("#alamat_stnk").val();
        var merk = $("#merk").val();
        var tipe = $("#tipe").val();
        var jenis = $("#jenis").val();
        var thn_pembuatan = $("#thn_pembuatan").val();
        var silinder = $("#silinder").val();
        var no_rangka = $("#no_rangka").val();
        var no_mesin = $("#no_mesin").val();
        var warna = $("#warna").val();
        var bahan_bakar = $("#bahan_bakar").val();
        var warna_tnkb = $("#warna_tnkb").val();
        var thn_registrasi = $("#thn_registrasi").val();
        var no_bpkb = $("#no_bpkb").val();
        var kd_lokasi = $("#kd_lokasi").val();
        var berlaku_sampai = $("#berlaku_sampai").val();
        var kilometer = $("#kilometer").val();
        var booking_date = $("#booking_date").val();
        var jenisService = $("#jenisService").val();
        var ket_booking = $("#ket_booking").val();

        $.ajax({
          type: 'POST',
          url: '<?= site_url() ?>service/simpanBooking',
          data: {
            nama_lengkap: namaLengkap,
            nip: nip,
            no_telp: no_telp,
            email: email,
            plat_nomor: plat_nomor,
            nama_tipe_kendaraan: nama_tipe_kendaraan,
            jenis_kend: jenis_kend,
            alamat_pemegang: alamat_pemegang,
            no_regis: no_regis,
            nama_pemilik: nama_pemilik,
            alamat_stnk: alamat_stnk,
            merk: merk,
            tipe: tipe,
            jenis: jenis,
            thn_pembuatan: thn_pembuatan,
            silinder: silinder,
            no_rangka: no_rangka,
            no_mesin: no_mesin,
            warna: warna,
            bahan_bakar: bahan_bakar,
            warna_tnkb: warna_tnkb,
            thn_registrasi: thn_registrasi,
            no_bpkb: no_bpkb,
            kd_lokasi: kd_lokasi,
            berlaku_sampai: berlaku_sampai,
            kilometer: kilometer,
            booking_date: booking_date,
            jenis_service: jenisService,
            ket_booking: ket_booking
          },
          cache: false,
          success: function(respond) {
            if (respond == 1) {
              Swal.fire('', 'Kendaraan anda sedang dalam status Pending, Mohon tunggu informasi selanjutnya', 'warning');
            } else if (respond == 2) {
              Swal.fire('', 'Kendaraan anda sedang dalam status Antri, Mohon tunggu proses service anda hingga selesai', 'warning');
            } else {
              Swal.fire({
                title: 'Terimakasih!',
                text: 'Pengajuan Booking Service Anda Sudah Terkirim <small>Anda Akan Diinfokan Untuk Pemberitahuan Selanjutnya</small>',
                icon: 'success',
                confirmButtonText: 'OK',
              }).then((result) => {
                if (result.isConfirmed) {
                  location.href = "<?= site_url() ?>";
                }
              })
            }
          }
        });
      });
    });
  </script>
</body>

</html>