<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengaturan');
        $this->load->model('M_Supplier');
        is_logged_in();
        access_menu_s2();
    }
    public function index()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $querySupplier = $this->M_Supplier->getDataSupplier();
        $data = array(
            'tampilCompany' => $queryCompany,
            'tampilSupplier' => $querySupplier
        );
        $data['title'] = "Data Supplier";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_supplier/supplier', $data);
    }
    public function tambah()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array(
            'tampilCompany' => $queryCompany
        );

        $getLastNumber = $this->db->query('SELECT * FROM supplier ORDER BY kode_supplier desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_supplier'];
        $autoKode = buatKode($lastNumber, 'SUP', 5);

        $data['kode_supplier'] = $autoKode;

        $data['title'] = "Tambah Data Supplier";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_supplier/tambah_supplier', $data);
    }
    public function update($kode_supplier)
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $querySupplierDetail = $this->M_Supplier->getDataSupplierDetail($kode_supplier);
        $data = array(
            'updateSupplier'  => $querySupplierDetail,
            'tampilCompany' => $queryCompany
        );
        $data['title'] = "Update Data Supplier";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_supplier/update_supplier', $data);
    }
    public function fungsi_tambah()
    {
        $kode_supplier = $this->input->post('kode_supplier');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

        $insertData = array(
            'kode_supplier' => $kode_supplier,
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'no_telp' => $no_telp
        );

        $this->M_Supplier->insertDataSupplier($insertData);
        redirect(site_url('master/supplier'));
    }
    public function fungsi_update()
    {
        $kode_supplier = $this->input->post('kode_supplier');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

        $updateData = array(
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'no_telp' => $no_telp
        );

        $this->M_Supplier->updateDataSupplier($kode_supplier, $updateData);
        redirect(site_url('master/supplier'));
    }
    public function fungsi_delete($kode_supplier)
    {
        $this->M_Supplier->deleteDataSupplier($kode_supplier);
        redirect(site_url('master/supplier'));
    }
    public function export_excel()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

            $getLastNumber = $this->db->query('SELECT * FROM supplier ORDER BY kode_supplier desc LIMIT 1')->row_array();
            $lastNumber = $getLastNumber['kode_supplier'];
            $autoKode = buatKode($lastNumber, 'SUP', 5);

            $file_name = $_FILES['filexls']['name'];
            $file_data = $_FILES['filexls']['tmp_name'];

            if (empty($file_name)) {
                $err .= "<li>Silahkan masukkan file yang kamu inginkan.</li>";
            } else {
                $ekstensi .= pathinfo($file_name)['extension'];
            }

            $ekstensi_allowed = array("xls", "xlsx");
            if (!in_array($ekstensi, $ekstensi_allowed)) {
                $err .= "<li>Silahkan masukkan file tipe XLS atau XLSX. File yang kamu masukkan <b>$file_name</b> punya tipe <b>$ekstensi</b> </li>";
            }

            if (empty($err)) {
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
                $spreadsheet = $reader->load($file_data);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $jml_data = 0;
                for ($i = 2; $i < count($sheetData); $i++) {
                    $insertData = array(
                        'kode_supplier' => $autoKode++,
                        'nama' => $sheetData[$i][0],
                        'email' => $sheetData[$i][1],
                        'alamat' => $sheetData[$i][2],
                        'no_telp' => $sheetData[$i][3]
                    );

                    $this->db->insert('supplier', $insertData);
                    $jml_data = $jml_data + 1;
                };
                // if ($jml_data > 0) {
                //     $success = "$jml_data baris berhasil dimasukkan ke Database";
                // }
            }
        }
        redirect('master/supplier');
    }
}
