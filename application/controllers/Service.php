<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Booking');
    }

    public function index()
    {
        $this->load->view('service/index');
    }

    public function simpanBooking()
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $nip = $this->input->post('nip');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $plat_nomor = $this->input->post('plat_nomor');
        $nama_tipe_kendaraan = $this->input->post('nama_tipe_kendaraan');
        $jenis_kend = $this->input->post('jenis_kend');
        $alamat_pemegang = $this->input->post('alamat_pemegang');
        $no_regis = $this->input->post('no_regis');
        $nama_pemilik = $this->input->post('nama_pemilik');
        $alamat_stnk = $this->input->post('alamat_stnk');
        $merk = $this->input->post('merk');
        $tipe = $this->input->post('tipe');
        $jenis = $this->input->post('jenis');
        $thn_pembuatan = $this->input->post('thn_pembuatan');
        $silinder = $this->input->post('silinder');
        $no_rangka = $this->input->post('no_rangka');
        $no_mesin = $this->input->post('no_mesin');
        $warna = $this->input->post('warna');
        $bahan_bakar = $this->input->post('bahan_bakar');
        $warna_tnkb = $this->input->post('warna_tnkb');
        $thn_registrasi = $this->input->post('thn_registrasi');
        $no_bpkb = $this->input->post('no_bpkb');
        $kd_lokasi = $this->input->post('kd_lokasi');
        $berlaku_sampai = $this->input->post('berlaku_sampai');
        $kilometer = $this->input->post('kilometer');
        $booking_date = $this->input->post('booking_date');
        $jenis_service = $this->input->post('jenis_service');
        $ket_booking = $this->input->post('ket_booking');

        $data = array(
            'nama_pemegang' => $nama_lengkap,
            'nip' => $nip,
            'alamat_pemegang' => $alamat_pemegang,
            'email' => $email,
            'no_telp' => $no_telp,
            'no_regis_kendaraan' => $plat_nomor,
            'nama_tipe_kendaraan' => $nama_tipe_kendaraan,
            'jenis_kendaraan' => $jenis_kend,
            'no_regis' => $no_regis,
            'nama_pemilik' => $nama_pemilik,
            'alamat_stnk' => $alamat_stnk,
            'merk' => $merk,
            'tipe' => $tipe,
            'jenis' => $jenis,
            'thn_pembuatan' => $thn_pembuatan,
            'silinder' => $silinder,
            'no_rangka' => $no_rangka,
            'no_mesin' => $no_mesin,
            'warna' => $warna,
            'bahan_bakar' => $bahan_bakar,
            'warna_tnkb' => $warna_tnkb,
            'thn_registrasi' => $thn_registrasi,
            'no_bpkb' => $no_bpkb,
            'kd_lokasi' => $kd_lokasi,
            'berlaku_sampai' => $berlaku_sampai,
            'kilometer' => $kilometer,
            'booking_date' => $booking_date,
            'jenis_service' => $jenis_service,
            'ket_booking' => $ket_booking,
            'status' => 'Pending'
        );

        $checkPending = $this->db->get_where('b_service', array(
            'no_regis_kendaraan' => $data['no_regis_kendaraan'],
            'status' => 'Pending'
        ));
        $checkAntri = $this->db->get_where('b_service', array(
            'no_regis_kendaraan' => $data['no_regis_kendaraan'],
            'status' => 'Antri'
        ));

        // if ($checkPending) {
        //     echo 1;
        // } else if ($checkAntri) {
        //     echo 2;
        // } else {

        // }
        $this->M_Booking->insertDataBooking($data);
    }
}
