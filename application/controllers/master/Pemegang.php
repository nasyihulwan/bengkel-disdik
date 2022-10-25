<?php

class Pemegang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Pengaturan');
        $this->load->model('M_Pemegang');
        is_logged_in();
        access_menu_s2();
    }

    public function index()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $DATA = array(
            'tampilCompany' => $queryCompany
        );
        $DATA['title'] = 'Data Pemegang Kendaraan';
        $DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view("master/data_pemegang/pemegang", $DATA);
    }
    public function mobil()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryPemegang = $this->M_Pemegang->getDataPemegangMobil();
        $DATA = array(
            'tampilCompany' => $queryCompany,
            'tampilPemegang' => $queryPemegang
        );
        $DATA['title'] = 'Data Pemegang Mobil';
        $DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view("master/data_pemegang/pemegang_mobil", $DATA);
    }
    public function motor()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryPemegang = $this->M_Pemegang->getDataPemegangMotor();
        $DATA = array(
            'tampilCompany' => $queryCompany,
            'tampilPemegang' => $queryPemegang
        );
        $DATA['title'] = 'Data Pemegang Motor';
        $DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view("master/data_pemegang/pemegang_motor", $DATA);
    }
    public function tambah_pemegang()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $DATA = array(
            'tampilCompany' => $queryCompany
        );

        $getLastNumber = $this->db->query('SELECT * FROM pemegang_kendaraan ORDER BY kode_pemegang desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_pemegang'];
        $autoKodeService = buatKode($lastNumber, 'PM', 5);

        $DATA['kode_pemegang'] = $autoKodeService;

        $DATA['title'] = 'Tambah Data Pemegang';
        $DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view("master/data_pemegang/tambah_pemegang", $DATA);
    }
    public function fungsi_tambah()
    {
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $no_regis_kendaraan = $this->input->post('no_regis_kendaraan');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');

        $insertData = array(
            'nama' => $nama,
            'nip' => $nip,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp,
            'no_regis_kendaraan' => $no_regis_kendaraan,
            'jenis_kendaraan' => strtolower($jenis_kendaraan),
            'foto_pemegang' => 'pemegang_default.jpg',
            'foto_kendaraan' => 'kendaraan_default.jpg'
        );
        $this->M_Pemegang->insertDataPemegang($insertData);
        redirect(site_url('master/pemegang/' . $jenis_kendaraan));
    }

    public function update_pemegang($id)
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryPemegangDetail = $this->M_Pemegang->getPemegangDetail($id);
        $DATA = array(
            'tampilCompany' => $queryCompany,
            'pemegangDetail' => $queryPemegangDetail
        );
        $DATA['title'] = 'Update Data Pemegang';
        $DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view("master/data_pemegang/update_pemegang", $DATA);
    }
    public function fungsi_update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $no_regis_kendaraan = $this->input->post('no_regis_kendaraan');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');

        $updateData = array(
            'nama' => $nama,
            'nip' => $nip,
            'alamat' => $alamat,
            'email' => $email,
            'no_telp' => $no_telp,
            'no_regis_kendaraan' => $no_regis_kendaraan,
            'jenis_kendaraan' => strtolower($jenis_kendaraan)
        );
        $this->M_Pemegang->updateDataPemegang($id, $updateData);
        redirect(site_url('master/pemegang/' . $jenis_kendaraan));
    }

    public function fungsi_deleteMobil($id)
    {
        $this->M_Pemegang->deleteDataPemegang($id);
        redirect(site_url('master/pemegang/mobil'));
    }
    public function fungsi_deleteMotor($id)
    {
        $this->M_Pemegang->deleteDataPemegang($id);
        redirect(site_url('master/pemegang/motor'));
    }
    public function export_excel_motor()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

            $getLastNumber = $this->db->query('SELECT * FROM pemegang_kendaraan ORDER BY kode_pemegang desc LIMIT 1')->row_array();
            $lastNumber = $getLastNumber['kode_pemegang'];
            $autoKode = buatKode($lastNumber, 'PM', 5);

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
                        'kode_pemegang' => $autoKode++,
                        'nama_pemegang' => $sheetData[$i][0],
                        'nip' => $sheetData[$i][1],
                        'alamat_pemegang' => $sheetData[$i][2],
                        'email' => $sheetData[$i][3],
                        'no_telp' => $sheetData[$i][4],
                        'no_regis_kendaraan' =>  $sheetData[$i][5],
                        'nama_tipe_kendaraan' => $sheetData[$i][6],
                        'jenis_kendaraan' => ($sheetData[$i][7]),
                        'foto_pemegang' => 'pemegang_default.jpg',
                        'foto_kendaraan' => 'kendaraan_default.jpg'
                    );


                    $this->db->insert('pemegang_kendaraan', $insertData);
                    $jml_data = $jml_data + 1;
                }
                // if ($jml_data > 0) {
                //     $success = "$jml_data baris berhasil dimasukkan ke Database";
                // }
            }
        }
        redirect('master/pemegang/motor');
    }
    public function export_excel_mobil()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

            $getLastNumber = $this->db->query('SELECT * FROM pemegang_kendaraan ORDER BY kode_pemegang desc LIMIT 1')->row_array();
            $lastNumber = $getLastNumber['kode_pemegang'];
            $autoKode = buatKode($lastNumber, 'PM', 5);

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
                        'kode_pemegang' => $autoKode++,
                        'nama_pemegang' => $sheetData[$i][0],
                        'nip' => $sheetData[$i][1],
                        'alamat_pemegang' => $sheetData[$i][2],
                        'email' => $sheetData[$i][3],
                        'no_telp' => $sheetData[$i][4],
                        'no_regis_kendaraan' =>  $sheetData[$i][5],
                        'nama_tipe_kendaraan' => $sheetData[$i][6],
                        'jenis_kendaraan' => strtolower($sheetData[$i][7]),
                        'foto_pemegang' => 'pemegang_default.jpg',
                        'foto_kendaraan' => 'kendaraan_default.jpg'
                    );

                    $this->db->insert('pemegang_kendaraan', $insertData);
                    $jml_data = $jml_data + 1;
                }
                // if ($jml_data > 0) {
                //     $success = "$jml_data baris berhasil dimasukkan ke Database";
                // }
            }
        }
        redirect('master/pemegang/mobil');
    }
}
