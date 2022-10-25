<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengaturan');
        $this->load->model('M_Pelanggan');
        is_logged_in();
        access_menu_s2();
    }
    public function index()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryPelanggan = $this->M_Pelanggan->getDataPelanggan();
        $data = array(
            'tampilCompany' => $queryCompany,
            'tampilPelanggan' => $queryPelanggan
        );
        $data['title'] = "Data Pelanggan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_pelanggan/pelanggan', $data);
    }
    public function tambah()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array(
            'tampilCompany' => $queryCompany
        );

        $getLastNumber = $this->db->query('SELECT * FROM pelanggan ORDER BY kode_pelanggan desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_pelanggan'];
        $autoKode = buatKode($lastNumber, 'CS', 5);

        $data['kode_pelanggan'] = $autoKode;


        $data['title'] = "Tambah Data Pelanggan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_pelanggan/tambah_pelanggan', $data);
    }
    public function update($kode_pelanggan)
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryPelangganDetail = $this->M_Pelanggan->getDataPelangganDetail($kode_pelanggan);
        $data = array(
            'updatePelanggan'  => $queryPelangganDetail,
            'tampilCompany' => $queryCompany
        );
        $data['title'] = "Update Data Pelanggan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_pelanggan/update_pelanggan', $data);
    }
    public function fungsi_tambah()
    {
        $kode_pelanggan = $this->input->post('kode_pelanggan');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

        $insertData = array(
            'kode_pelanggan' => $kode_pelanggan,
            'nama_pelanggan' => $nama,
            'alamat_pelanggan' => $alamat,
            'no_telp' => $no_telp
        );

        $this->M_Pelanggan->insertDataPelanggan($insertData);
        redirect(site_url('master/pelanggan'));
    }
    public function fungsi_update()
    {
        $kode_pelanggan = $this->input->post('kode_pelanggan');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');

        $updateData = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp
        );

        $this->M_Pelanggan->updateDataPelanggan($kode_pelanggan, $updateData);
        redirect(site_url('master/pelanggan'));
    }
    public function fungsi_delete($kode_pelanggan)
    {
        $this->M_Pelanggan->deleteDataPelanggan($kode_pelanggan);
        redirect(site_url('master/pelanggan'));
    }
    public function export_excel()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

            $getLastNumber = $this->db->query('SELECT * FROM pelanggan ORDER BY kode_pelanggan desc LIMIT 1')->row_array();
            $lastNumber = $getLastNumber['kode_pelanggan'];
            $autoKode = buatKode($lastNumber, 'CS', 5);

            $data['kode_pelanggan'] = $autoKode;

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
                        'kode_pelanggan' => $autoKode++,
                        'nama_pelanggan' => $sheetData[$i][0],
                        'alamat_pelanggan' => $sheetData[$i][1],
                        'no_telp' => $sheetData[$i][2]
                    );

                    $this->db->insert('pelanggan', $insertData);

                    $jml_data = $jml_data + 1;
                }
            }
        }
        redirect('master/pelanggan');
    }
}
