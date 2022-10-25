<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kendaraan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Kendaraan');
		$this->load->model('M_Pengaturan');
		$this->load->model("datatables");
		error_reporting(E_ALL & ~E_NOTICE);
		is_logged_in();
		access_menu_s2();
	}

	public function index()
	{
		$queryCompany = $this->M_Pengaturan->getDataCompany();
		$queryAllKendaraan = $this->M_Kendaraan->getDataKendaraan();
		$DATA = array(
			'tampilKendaraan' => $queryAllKendaraan,
			'tampilCompany' => $queryCompany
		);
		$DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view("master/data_kendaraan/data_kendaraan", $DATA);
	}
	public function tambah_kendaraan()
	{
		$queryCompany = $this->M_Pengaturan->getDataCompany();
		$DATA = array('tampilCompany' => $queryCompany);
		$DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("master/data_kendaraan/tambah_kendaraan", $DATA);
	}
	public function update_kendaraan($no_regis)
	{
		$queryCompany = $this->M_Pengaturan->getDataCompany();
		$queryKendaraanDetail = $this->M_Kendaraan->getDataKendaraanDetail($no_regis);
		$DATA = array(
			'updateKendaraan' => $queryKendaraanDetail,
			'tampilCompany' => $queryCompany
		);
		$DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view("master/data_kendaraan/update_kendaraan", $DATA);
	}
	public function fungsi_tambah()
	{
		$no_regis = $this->input->post('no_regis');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$alamat = $this->input->post('alamat');
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

		$insertData = array(
			'no_regis' => $no_regis,
			'nama_pemilik' => $nama_pemilik,
			'alamat' => $alamat,
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
			'berlaku_sampai' => $berlaku_sampai
		);

		$this->M_Kendaraan->insertDataKendaraan($insertData);
		redirect(site_url('master/kendaraan'));
	}
	public function fungsi_update()
	{
		$no_regis = $this->input->post('no_regis');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$alamat = $this->input->post('alamat');
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
		$pemegang = $this->input->post('pemegang');

		$updateData = array(
			'nama_pemilik' => $nama_pemilik,
			'alamat' => $alamat,
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
			'kode_pemegang' => $pemegang
		);

		$this->M_Kendaraan->updateDataKendaraan($no_regis, $updateData);
		redirect(site_url('master/kendaraan'));
	}
	public function fungsi_delete($no_regis)
	{
		$this->M_Kendaraan->deleteDataKendaraan($no_regis);
		redirect(site_url('master/kendaraan'));
	}
	public function export_excel()
	{
		require 'vendor/autoload.php';
		if (isset($_POST['submit'])) {
			$err        = "";
			$ekstensi   = "";
			$success    = "";

			$conn = mysqli_connect('localhost', 'root', '', 'bengkel_disdik');
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
					// DD / MM / YYYY -> YYYY / MM / DD
					$berlaku_sampai =  $sheetData[$i][16];
					$date_explode = explode("/", $berlaku_sampai);
					$berlaku_sampai = $date_explode[2] . "-" . $date_explode[1] . "-" . $date_explode[0];

					$kilomter = 0;
					if ($sheetData[$i][17] == "" || $sheetData[$i][17] == null) {
						$kilomter = 2000;
					} else {
						$kilomter = $sheetData[$i][17];
					}

					$insertData = array(
						'no_regis' => preg_replace('/\s+/', '', $sheetData[$i][0]),
						'nama_pemilik' => $sheetData[$i][1],
						'alamat' => $sheetData[$i][2],
						'merk' => $sheetData[$i][3],
						'tipe' => $sheetData[$i][4],
						'jenis' => $sheetData[$i][5],
						'thn_pembuatan' => $sheetData[$i][6],
						'silinder' => $sheetData[$i][7],
						'no_rangka' => $sheetData[$i][8],
						'no_mesin' => $sheetData[$i][9],
						'warna' => $sheetData[$i][10],
						'bahan_bakar' => $sheetData[$i][11],
						'warna_tnkb' => $sheetData[$i][12],
						'thn_registrasi' => $sheetData[$i][13],
						'no_bpkb' => $sheetData[$i][14],
						'kd_lokasi' => $sheetData[$i][15],
						'berlaku_sampai' => $berlaku_sampai,
						'kilometer' => $kilomter
					);

					$this->db->insert('kendaraan', $insertData);
					$jml_data = $jml_data + 1;
				}
				// if ($jml_data > 0) {
				//     $success = "$jml_data baris berhasil dimasukkan ke Database";
				// }
			}
		}
		redirect('master/kendaraan');
	}

	// load data pemegang kendaraan
	public function json_pemegang($nomorplat = null)
	{
		$this->datatables->setSelect("
            no_regis_kendaraan as noregis,
            kode_pemegang as kodepemegang,
            nama_pemegang as namapemegang,
            alamat_pemegang as alamat,
			no_telp as notelp
        ");
		$this->datatables->setTable("pemegang_kendaraan");
		$this->datatables->setWhere("no_regis_kendaraan", $nomorplat);
		$this->datatables->setColumn([
			'<index>',
			'<get-kodepemegang>',
			'<get-namapemegang>',
			'<get-alamat>',
			'<get-notelp>',
			' <div class="text-center"> <a href="#" class="btn btn-sm btn-primary tambahPemegang" data-plat="<get-noregis>" data-kdpemegang="<get-kodepemegang>" ><i class="fa fa-plus"></i></a>
			</div> ',
		]);
		$this->datatables->generate();
	}

	// Tambah data pemegang
	public function tambahpemegang()
	{
		$no_regis = $this->input->post('nomor_plat');
		$kode_pemegang = $this->input->post('kode_pemegang');

		$this->db->set('kode_pemegang', $kode_pemegang);
		$this->db->where('no_regis', $no_regis);
		$this->db->update('kendaraan');
	}
}
