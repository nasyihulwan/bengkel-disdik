<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Service');
        $this->load->model('M_Pengaturan');
        is_logged_in();
        access_menu_s2();
    }
    public function index()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['title'] = 'Data Service';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('master/data_service/service', $data);
    }
    public function motor()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryServiceMotor = $this->M_Service->getDataServiceMotor();
        $data = array(
            'tampilService' => $queryServiceMotor,
            'tampilCompany' => $queryCompany
        );
        $data['title'] = 'Data Service Motor';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('master/data_service/service_motor', $data);
    }
    public function mobil()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryServiceMobil = $this->M_Service->getDataServiceMobil();
        $data = array(
            'tampilService' => $queryServiceMobil,
            'tampilCompany' => $queryCompany
        );
        $data['title'] = 'Data Service Mobil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('master/data_service/service_mobil', $data);
    }
    public function tambah_service()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['title'] = 'Tambah Data Service';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $getLastNumber = $this->db->query('SELECT * FROM service ORDER BY kode_service desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_service'];
        $autoKodeService = buatKode($lastNumber, 'SR', 5);

        $data['kode_service'] = $autoKodeService;
        $this->load->view('master/data_service/tambah_service', $data);
    }
    public function update_service($kode_service)
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $getDataServiceDetail = $this->M_Service->getDataServiceDetail($kode_service);
        $data = array('updateService' => $getDataServiceDetail, 'tampilCompany' => $queryCompany);
        $data['title'] = 'Update Data Service';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_service/update_service', $data);
    }
    public function fungsi_tambah()
    {
        $kode_service = $this->input->post('kode_service');
        $nama = $this->input->post('nama');
        $tipe_kendaraan = $this->input->post('tipe_kendaraan');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $insertData = array(
            'kode_service' => $kode_service,
            'nama_service' => $nama,
            'tipe_kendaraan' => $tipe_kendaraan,
            'harga' => $harga,
            'jenis_kendaraan' => strtolower($jenis)
        );

        $this->M_Service->insertDataService($insertData);
        redirect(site_url('master/service/' . $jenis));
    }
    public function fungsi_update()
    {
        $kode_service = $this->input->post('kode_service');
        $nama = $this->input->post('nama');
        $tipe_kendaraan = $this->input->post('tipe_kendaraan');
        $harga = $this->input->post('harga');
        $jenis = $this->input->post('jenis');

        $updateData = array(
            'nama_service' => $nama,
            'tipe_kendaraan' => $tipe_kendaraan,
            'harga' => $harga,
            'jenis_kendaraan' => strtolower($jenis)
        );
        $this->M_Service->updateDataService($kode_service, $updateData);
        redirect(site_url('master/service/' . $jenis));
    }

    public function fungsi_deleteMotor($kode_service)
    {
        $this->M_Service->deleteDataService($kode_service);
        redirect(site_url('master/service/motor'));
    }
    public function fungsi_deleteMobil($kode_service)
    {
        $this->M_Service->deleteDataService($kode_service);
        redirect(site_url('master/service/mobil'));
    }
    public function export_excel_motor()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

            $getLastNumber = $this->db->query('SELECT * FROM service ORDER BY kode_service desc')->row_array();
            $lastNumber = $getLastNumber['kode_service'];
            $autoKodeService = buatKode($lastNumber, 'SR', 5);

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
                        'kode_service' => $autoKodeService++,
                        'nama_service' => $sheetData[$i][0],
                        'jenis_kendaraan' => strtolower($sheetData[$i][1]),
                        'tipe_kendaraan' => $sheetData[$i][2],
                        'harga' => $sheetData[$i][3]
                    );
                    $this->db->insert('service', $insertData);
                    $jml_data = $jml_data + 1;
                };
                // if ($jml_data > 0) {
                //     $success = "$jml_data baris berhasil dimasukkan ke Database";
                // }
            }
        }
        redirect(site_url('master/service/motor'));
    }
    public function export_excel_mobil()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

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
                        'kode_service' => $autoKodeService++,
                        'nama_service' => $sheetData[$i][0],
                        'jenis_kendaraan' => strtolower($sheetData[$i][1]),
                        'tipe_kendaraan' => $sheetData[$i][2],
                        'harga' => $sheetData[$i][3]
                    );

                    $query = $this->db->insert('service', $insertData);
                    if ($query) {
                        redirect('master/service/mobil');
                    }
                    $jml_data = $jml_data + 1;
                };
                // if ($jml_data > 0) {
                //     $success = "$jml_data baris berhasil dimasukkan ke Database";
                // }
            }
        }
    }
}
