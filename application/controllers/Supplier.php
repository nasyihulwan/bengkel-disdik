<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengaturan');
        $this->load->model('M_Supplier');
        $this->load->model('M_User');
        is_logged_in();
        access_menu_s1();
        // access_menu_s2();
    }
    public function index()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_role = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile_role'] = $this->M_User->getRole($user_role['role_id']);
        $data['supplier'] = $this->M_Supplier->getDataSupplier();
        $data['title'] = 'Pilih Supplier';


        $this->load->view('supplier/index', $data);
    }
    public function barang($kode_supplier)
    {
        $kode_supplier = $this->uri->segment(3);

        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_role = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile_role'] = $this->M_User->getRole($user_role['role_id']);
        $data['supplier'] = $this->M_Supplier->getDataSupplier();
        $data['list_barang'] = $this->M_Supplier->getListBarang($kode_supplier)->result();


        $getLastNumber = $this->db->query('SELECT * FROM list_barang_supplier ORDER BY kode_barang desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_barang'];
        $autoKode = buatKode($lastNumber, 'SUPBRG', 5);

        // $data['barang_detail'] = $this->M_Supplier->getListBarangDetail($kode_supplier)->row_array();

        $data['kode_barang'] = $autoKode;
        $data['kode_supplier'] = $kode_supplier;
        $data['title'] = 'Data Barang';

        $this->load->view('supplier/barang', $data);
    }

    public function tambahBarang()
    {
        $kode_barang = $this->input->post('kode_barang');
        $kode_supplier = $this->input->post('kode_supplier');
        $nama_barang = $this->input->post('nama_barang');
        $jenis_barang = $this->input->post('jenis_barang');
        $merk = $this->input->post('merk');
        $model = $this->input->post('model');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');

        $data = array(
            'kode_barang' => $kode_barang,
            'kode_supplier' => $kode_supplier,
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'merk' => $merk,
            'model' => $model,
            'harga' => $harga,
            'stok' => $stok,
            'jenis_kendaraan' => $jenis_kendaraan
        );

        $this->db->insert('list_barang_supplier', $data);
    }

    public function updateBarang()
    {
        $kode_barang = $this->input->post('kode_barang');
        $kode_supplier = $this->input->post('kode_supplier');
        $nama_barang = $this->input->post('nama_barang');
        $jenis_barang = $this->input->post('jenis_barang');
        $merk = $this->input->post('merk');
        $model = $this->input->post('model');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');

        $data = array(
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'merk' => $merk,
            'model' => $model,
            'harga' => $harga,
            'stok' => $stok,
            'jenis_kendaraan' => $jenis_kendaraan
        );

        $this->db->where('kode_barang', $kode_barang);
        $this->db->update('list_barang_supplier', $data);
    }



    public function hapusBarang()
    {
        $kode_barang = $this->input->post('kode_barang');

        $this->db->where('kode_barang', $kode_barang);
        $this->db->delete('list_barang_supplier');
    }
}
