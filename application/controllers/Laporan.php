<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Pengaturan');
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Barang');
        $this->load->model('M_Service');
        $this->load->model('M_Transaksi');
        $this->load->model('M_Pemegang');
        $this->load->model('M_Supplier');
        error_reporting(E_ALL & ~E_NOTICE);
        is_logged_in();
    }
    public function index()
    {
    }

    // Penjualan barang
    public function penjualan()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Cetak Laporan Penjualan';
        $this->load->view("laporan/laporan_penjualan", $data);
    }
    public function cetakLaporanPenjualan()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['laporanPenjualan'] = $this->M_Transaksi->getLaporanPenjualan($dari, $sampai)->result();
        if (isset($_POST['export'])) {
            // Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");

            // Mendefinisikan nama file ekspor "hasil-export.xls"
            header("Content-Disposition: attachment; filename=Laporan Penjualan periode '$dari' - '$sampai'.xls");
            $this->load->view("laporan/exportexcel_laporan", $data);
        }
        if (isset($_POST['submit'])) {
            $this->load->view("laporan/cetak_laporan_penjualan", $data);
        }
    }


    // Service
    public function service()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Cetak Laporan Service';
        $this->load->view("laporan/laporan_service", $data);
    }
    public function cetakLaporanService()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['laporanService'] = $this->M_Transaksi->getLaporanService($dari, $sampai)->result();

        if (isset($_POST['export'])) {
            // Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");

            // Mendefinisikan nama file ekspor "hasil-export.xls"
            header("Content-Disposition: attachment; filename=Laporan Penjualan periode '$dari' - '$sampai'.xls");
            $this->load->view("laporan/exportexcel_service", $data);
        }
        if (isset($_POST['submit'])) {
            $this->load->view("laporan/cetak_laporan_service", $data);
        }
    }

    public function pembelian()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->M_Supplier->getDataSupplier();
        $data['title'] = 'Cetak Laporan Pembelian';
        $this->load->view("laporan/laporan_pembelian", $data);
    }

    public function cetakLaporanPembelian()
    {
        $supplier = $this->input->post('kode_supplier');
        $nama_supplier = $this->input->post('nama_supplier');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $data['supplier'] = $supplier;
        $data['nama_supplier'] = $nama_supplier;
        $data['dari'] = $dari;
        $data['sampai'] = $sampai;
        $data['laporanPembelian'] = $this->M_Transaksi->getLaporanPembelian($supplier, $dari, $sampai)->result();

        if (isset($_POST['export'])) {
            // Fungsi header dengan mengirimkan raw data excel
            header("Content-type: application/vnd-ms-excel");

            // Mendefinisikan nama file ekspor "hasil-export.xls"
            header("Content-Disposition: attachment; filename=Laporan Penjualan '$supplier' periode '$dari' - '$sampai'.xls");
            $this->load->view("laporan/exportexcel_pembelian", $data);
        }
        if (isset($_POST['submit'])) {
            $this->load->view("laporan/cetak_laporan_pembelian", $data);
        }
    }
}
