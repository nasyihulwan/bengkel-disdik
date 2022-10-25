<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Barang');
        $this->load->model('M_Pengaturan');
        is_logged_in();
        access_menu_s2();
    }
    public function index()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('master/data_barang/sparepart', $data);
    }
    public function mobil()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryBarangMobil = $this->M_Barang->getDataBarangMobil();
        $data = array(
            'tampilBarang' => $queryBarangMobil,
            'tampilCompany' => $queryCompany
        );
        $data['title'] = 'Data Barang (Mobil)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('master/data_barang/sparepart_mobil', $data);
    }
    public function motor()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $queryBarangMotor = $this->M_Barang->getDataBarangMotor();
        $data = array(
            'tampilBarang' => $queryBarangMotor,
            'tampilCompany' => $queryCompany
        );
        $data['title'] = 'Data Barang (Motor)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('master/data_barang/sparepart_motor', $data);
    }

    public function tambah_sparepart()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $getLastNumber = $this->db->query('SELECT * FROM barang ORDER BY kode_barang desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_barang'];
        $autoKode = buatKode($lastNumber, 'BR', 5);

        $data['kode_barang'] = $autoKode;

        $data['title'] = 'Tambah Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('master/data_barang/tambah_sparepart', $data);
    }
    public function update_sparepart($kode_barang)
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $getDataBarangDetail = $this->M_Barang->getDataBarangDetail($kode_barang);
        $data = array(
            'updateBarang' => $getDataBarangDetail,
            'tampilCompany' => $queryCompany
        );
        $data['title'] = 'Update Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/data_barang/update_sparepart', $data);
    }


    public function fungsi_tambah()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama = $this->input->post('nama');
        $jenis_barang = $this->input->post('jenis_barang');
        $merk = $this->input->post('merk');
        $model = $this->input->post('model');
        $harga_beli = $this->input->post('harga_beli');
        $harga_jual = $this->input->post('harga_jual');
        $supplier = $this->input->post('supplier');
        $stok = $this->input->post('stok');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');


        $insertData = array(
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama,
            'jenis_barang' => $jenis_barang,
            'merk' => $merk,
            'model' => $model,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'supplier' => $supplier,
            'stok' => $stok,
            'jenis_kendaraan' => strtolower($jenis_kendaraan)
        );

        $this->M_Barang->insertDataBarang($insertData);
        redirect(site_url('master/barang/' . $jenis_kendaraan));
    }
    public function fungsi_update()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama = $this->input->post('nama');
        $jenis_barang = $this->input->post('jenis_barang');
        $merk = $this->input->post('merk');
        $model = $this->input->post('model');
        $harga_beli = $this->input->post('harga_beli');
        $harga_jual = $this->input->post('harga_jual');
        $supplier = $this->input->post('supplier');
        $stok = $this->input->post('stok');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');

        $updateData = array(
            'nama_barang' => $nama,
            'tipe_barang' => $jenis_barang,
            'merk' => $merk,
            'model' => $model,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'supplier' => $supplier,
            'stok' => $stok,
            'jenis_kendaraan' => strtolower($jenis_kendaraan)
        );
        $this->M_Barang->updateDataBarang($kode_barang, $updateData);
        redirect(site_url('master/barang/' . $jenis_kendaraan));
    }

    public function fungsi_deleteMobil($kode_barang)
    {
        $this->M_Barang->deleteDataBarang($kode_barang);
        redirect(site_url('master/barang/mobil'));
    }
    public function fungsi_deleteMotor($kode_barang)
    {
        $this->M_Barang->deleteDataBarang($kode_barang);
        redirect(site_url('master/barang/motor'));
    }
    public function export_excel_motor()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

            $getLastNumber = $this->db->query('SELECT * FROM barang ORDER BY kode_barang desc LIMIT 1')->row_array();
            $lastNumber = $getLastNumber['kode_barang'];
            $autoKode = buatKode($lastNumber, 'BR', 5);

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
                        'kode_barang' => $autoKode++,
                        'nama_barang' => $sheetData[$i][0],
                        'tipe_barang' => $sheetData[$i][1],
                        'merk' => $sheetData[$i][2],
                        'model' => $sheetData[$i][3],
                        'harga_beli' => $sheetData[$i][4],
                        'harga_jual' => $sheetData[$i][5],
                        'supplier' => $sheetData[$i][6],
                        'stok' => $sheetData[$i][7],
                        'jenis_kendaraan' => strtolower($sheetData[$i][8])
                    );

                    $this->db->insert('barang', $insertData);
                    $jml_data = $jml_data + 1;
                };
                // if ($jml_data > 0) {
                //     $success = "$jml_data baris berhasil dimasukkan ke Database";
                // }
            }
        }
        redirect('master/barang/motor');
    }
    public function export_excel_mobil()
    {
        require 'vendor/autoload.php';
        if (isset($_POST['submit'])) {
            $err        = "";
            $ekstensi   = "";
            $success    = "";

            $getLastNumber = $this->db->query('SELECT * FROM barang ORDER BY kode_barang desc LIMIT 1')->row_array();
            $lastNumber = $getLastNumber['kode_barang'];
            $autoKode = buatKode($lastNumber, 'BR', 5);

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
                        'kode_barang' => $autoKode++,
                        'nama_barang' => $sheetData[$i][0],
                        'tipe_barang' => $sheetData[$i][1],
                        'merk' => $sheetData[$i][2],
                        'model' => $sheetData[$i][3],
                        'harga_beli' => $sheetData[$i][4],
                        'harga_jual' => $sheetData[$i][5],
                        'supplier' => $sheetData[$i][6],
                        'stok' => $sheetData[$i][7],
                        'jenis_kendaraan' => strtolower($sheetData[$i][8])
                    );

                    $this->db->insert('barang', $insertData);
                    $jml_data = $jml_data + 1;
                };
                // if ($jml_data > 0) {
                //     $success = "$jml_data baris berhasil dimasukkan ke Database";
                // }
            }
        }
        redirect('master/barang/mobil');
    }
}
