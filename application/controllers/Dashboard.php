<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pengaturan');
		$this->load->model('M_User');
		$this->load->model('M_Transaksi');
		is_logged_in();
	}

	public function index()
	{
		$queryCompany = $this->M_Pengaturan->getDataCompany();
		$data = array('tampilCompany' => $queryCompany);
		$user_role = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['profile_role'] = $this->M_User->getRole($user_role['role_id']);

		$data['jmlPenjualan'] = $this->M_Transaksi->getDataPenjualanHariIni()->num_rows();
		$data['jmlBayarPenjualan'] = $this->M_Transaksi->getBayarPenjHariIni()->row_array();
		$data['jmlTagihan'] = $this->M_Transaksi->getPembelianHariIni()->row_array();
		$data['terjual'] = $this->M_Transaksi->getItemTerjualHariIni()->row_array();


		$data['jmlService'] = $this->M_Transaksi->getDataServiceHariIni()->num_rows();
		$data['serviceSelesai'] = $this->M_Transaksi->getServiceSelesaiHariIni()->num_rows();
		$data['servicePending'] = $this->M_Transaksi->getServicePending()->num_rows();
		$data['jmlBayarService'] = $this->M_Transaksi->getBayarServiceHariIni()->row_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rekapPenjualan'] = $this->M_Transaksi->getPenjualanPerBulan()->result();
		$data['rekapPenjualanSupplier'] = $this->M_Transaksi->getPenjualanPerBulanSupplier()->result();


		// $data['rekapTrxService'] = $this->M_Transaksi->getTransaksiServicePerBulan()->result();
		if ($this->session->userdata('role_id') == 1) {
			$this->load->view("overview", $data);
		} else if ($this->session->userdata('role_id') == 4) {
			$this->load->view("o_supplier", $data);
		}
	}
	public function contact()
	{
		$queryCompany = $this->M_Pengaturan->getDataCompany();
		$data = array('tampilCompany' => $queryCompany);
		$data['title'] = 'Company Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view("contact", $data);
	}
}
