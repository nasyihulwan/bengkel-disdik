<?php

class Transaksi extends CI_Controller
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
        $this->load->model("datatables");
        error_reporting(E_ALL & ~E_NOTICE);
        is_logged_in();
    }

    public function index()
    {
    }

    public function barang()
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);

        $getLastFaktur = $this->M_Transaksi->getLastFakturPenj($hari, $bulan, $tahun)->row_array();
        $lastNumber = $getLastFaktur['no_faktur'];
        $noFaktur = buatKode($lastNumber, 'BRG' . $hari . $bulan . $thn, 4);
        $data['no_faktur'] = $noFaktur;

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->M_Pelanggan->getDataPelanggan();
        $data['barang'] = $this->M_Barang->getDataBarang();
        $data['service'] = $this->M_Service->getDataService();
        $data["barangTemp"] = $this->M_Transaksi->getDataBarangTemp($id_user)->result();
        $data['title'] = 'Tambah Transaksi Barang';
        $this->load->view("transaksi/transaksi_barang", $data);
    }
    public function transaksi_barang_pending()
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksiBarangPending'] = $this->M_Transaksi->updateStatusPenj($id_user)->result();
        $data['title'] = 'Bayar Transaksi Barang';
        $this->load->view("transaksi/transaksi_barang_pending", $data);
    }
    public function select_pemegang()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pilih Pemegang Kendaraan';
        $data['pemegang'] = $this->M_Pemegang->getDataPemegangKendaraan();
        $this->load->view("transaksi/input_pemegang", $data);
    }
    public function redirect_pemegang()
    {
        $kode_pemegang = $this->input->post('kode_pemegang');
        redirect('penjualan/transaksi/service/' . $kode_pemegang);
    }
    public function service($kode_pemegang)
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);

        $getLastNumber = $this->db->query('SELECT * FROM service ORDER BY kode_service desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_service'];
        $autoKodeService = buatKode($lastNumber, 'SR', 5);
        $data['kodeServiceTemp'] = $autoKodeService;

        $getLastFaktur = $this->M_Transaksi->getLastFakturService($hari, $bulan, $tahun)->row_array();
        $lastNumber = $getLastFaktur['no_faktur'];
        $noFaktur = buatKode($lastNumber, 'SRV' . $hari . $bulan . $thn, 4);
        $data['no_faktur'] = $noFaktur;

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemegang'] = $this->M_Pemegang->getDataPemegangKendaraan();
        $data['service'] = $this->M_Service->getDataService();

        $kode_pemegang = $this->uri->segment(4);
        $data['kendaraan'] = $this->M_Transaksi->getDataKendaraan($kode_pemegang)->result();
        $data['kendaraan_tipekendaraan'] = $this->M_Transaksi->getDataKendaraan($kode_pemegang)->row();
        $data["serviceTemp"] = $this->M_Transaksi->getDataServiceTemp($id_user)->result();

        $data['title'] = 'Tambah Transaksi Service';
        $this->load->view("transaksi/transaksi_service", $data);
    }
    public function service_checkin($kode_antri)
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);

        $getLastNumber = $this->db->query('SELECT * FROM service ORDER BY kode_service desc LIMIT 1')->row_array();
        $lastNumber = $getLastNumber['kode_service'];
        $autoKodeService = buatKode($lastNumber, 'SR', 5);


        $getLastFaktur = $this->M_Transaksi->getLastFakturService($hari, $bulan, $tahun)->row_array();
        $lastNumber = $getLastFaktur['no_faktur'];

        $noFaktur = buatKode($lastNumber, 'SRV' . $hari . $bulan . $thn, 4);

        $data['no_faktur'] = $noFaktur;
        $data['kodeServiceTemp'] = $autoKodeService;

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['service'] = $this->M_Service->getDataService();

        $kode_antri = $this->uri->segment(4);
        $data['kendaraan'] = $this->M_Transaksi->getDataKendaraanBooking($kode_antri)->row();
        $data["serviceTemp"] = $this->M_Transaksi->getDataServiceTemp($id_user)->result();

        $data['title'] = 'Tambah Transaksi Service';
        $this->load->view("transaksi/service_checkin", $data);
    }

    public function cekBarang()
    {
        $jmlData = $this->M_Transaksi->cekBarang()->num_rows();
        echo $jmlData;
    }

    // Data sementara 
    //barang
    public function simpanBarangTemp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $harga = $this->input->post('harga');
        $tipe_barang = $this->input->post('tipe_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');

        $cekBarangTemp = $this->M_Transaksi->cekBarangTemp($kode_barang, $id_user)->num_rows();
        if ($cekBarangTemp > 0) {
            echo "1";
        } else {
            $data = array(
                'kode_barang'  => $kode_barang,
                'jenis_transaksi' => 'Barang',
                'tipe' => $tipe_barang,
                'harga_barang'  => $harga,
                'qty'  => $qty,
                'id_user'  => $id_user
            );
            $this->M_Transaksi->insertBarangTemp($data);
        }
    }
    public function getDataBarangTemp()
    {
        $id_user = $this->input->post('id_user');
        $data["barangTemp"] = $this->M_Transaksi->getDataBarangTemp($id_user)->result();
        $this->load->view('transaksi/barang_detail_temp', $data);
    }
    public function hapusBarangTemp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $id_user = $this->input->post('id_user');
        $hapus = $this->M_Transaksi->deleteBarangTemp($kode_barang, $id_user);
        echo $hapus;
    }
    //.
    //service
    public function simpanServiceTemp()
    {
        $kode_service = $this->input->post('kode_service');
        $harga = $this->input->post('harga_service');
        $id_user = $this->input->post('id_user');

        $cekServiceTemp = $this->M_Transaksi->cekServiceTemp($kode_service, $id_user)->num_rows();
        if ($cekServiceTemp > 0) {
            echo "1";
        } else {
            $data = array(
                'kode_service'  => $kode_service,
                'jenis_transaksi' => 'Service',
                'harga_service'  => $harga,
                'qty' => 1,
                'id_user'  => $id_user
            );
            $simpan = $this->M_Transaksi->insertServiceTemp($data);
        }
    }

    public function getDataServiceTemp()
    {
        $id_user = $this->input->post('id_user');
        $data["serviceTemp"] = $this->M_Transaksi->getDataServiceTemp($id_user)->result();
        $this->load->view('transaksi/service_detail_temp', $data);
    }

    public function hapusServiceTemp()
    {
        $kode_service = $this->input->post('kode_service');
        $id_user = $this->input->post('id_user');
        $hapus = $this->M_Transaksi->deleteServiceTemp($kode_service, $id_user);
        echo $hapus;
    }
    //.
    //. data sementara

    // Simpan data barang ke penjualan
    public function simpanPenjBarang()
    {
        $no_faktur = $this->input->post('noFaktur');
        $tgl_transaksi = $this->input->post('tglTransaksi');
        $kode_pelanggan = $this->input->post('kodePelanggan');
        $id_user = $this->input->post('idUser');

        $cekNoFakturPenj = $this->M_Transaksi->cekNoFakturPenj($no_faktur, $id_user)->num_rows();
        if ($cekNoFakturPenj > 0) {
            echo "1";
        } else {
            $data = array(
                'no_faktur' => $no_faktur,
                'tgl_transaksi' => $tgl_transaksi,
                'tunai' => 0,
                'status' => 'Pending',
                'kode_pelanggan' => $kode_pelanggan,
                'jenis_transaksi' => 'Barang',
                'id_user' => $id_user
            );
            $this->M_Transaksi->insertPenjualan($data, $id_user, $no_faktur);
        }
    }

    // Simpan data service ke transaksi_service
    public function simpanTransaksiService()
    {

        $no_faktur = $this->input->post('no_faktur');
        $tgl_transaksi = $this->input->post('tglTransaksi');
        $tunai = $this->input->post('tunai');
        $kode_pemegang = $this->input->post('kodePemegang');
        $noPlatKend = $this->input->post('noPlatKend');
        $jenisKend = $this->input->post('jenisKend');
        $initial_km = $this->input->post('kilometer');
        $current_km = $this->input->post('currKM');
        $next_service = $this->input->post('nextService');
        $id_user = $this->input->post('id_user');

        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        $cekNoFakturService = $this->M_Transaksi->cekNoFakturService($no_faktur, $id_user)->num_rows();
        if ($cekNoFakturService > 0) {
            echo "1";
        } else {
            $data = array(
                'no_faktur' => $no_faktur,
                'tgl_transaksi' => $tgl_transaksi,
                'tunai' => $tunai,
                'kode_pemegang' => $kode_pemegang,
                'nomor_plat_kendaraan' => $noPlatKend,
                'jenis_kendaraan' => $jenisKend,
                'status' => 'Proses',
                'jam_masuk' => $now,
                'initial_km' => $initial_km,
                'current_km' => $current_km,
                'next_service' => $next_service,
                'id_user' => $id_user
            );
            $this->M_Transaksi->insertTransaksiService($data, $id_user, $no_faktur);
        }
    }
    // Update statuas pembayaran
    public function bayarPenjualanBarang()
    {
        $noFaktur = $this->input->post('noFaktur');
        $tunai = $this->input->post('tunai');

        $data = array(
            'status' => 'Selesai',
            'tunai' => $tunai
        );
        $this->db->where('no_faktur', $noFaktur);
        $this->db->update('penjualan', $data);
    }


    public function updateSelesai()
    {
        $no_faktur = $this->input->post('no_faktur');
        $status = $this->input->post('status');
        $jam_keluar = $this->input->post('jam_keluar');

        $data = array(
            'status' => $status,
            'jam_keluar' => $jam_keluar
        );
        $this->db->where('no_faktur', $no_faktur);
        $this->db->update('t_service', $data);
    }


    public function updateStatus()
    {
        $no_faktur = $this->input->post('no_faktur');
        $status = $this->input->post('status');

        $data = array(
            'status' => $status,
        );

        $this->db->where('no_faktur', $no_faktur);
        $this->db->update('t_service', $data);
    }

    // Menampilkan histori penjualan
    public function histori_penjualan()
    {
        $id_user = $this->session->userdata('id_user');
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["historiPenjualan"] = $this->M_Transaksi->getHistoriPenjualan($id_user)->result();
        $data['title'] = 'Histori Penjualan';
        $this->load->view("transaksi/histori_penjualan", $data);
    }
    // Menampilkan status service
    public function service_pending()
    {
        $id_user = $this->session->userdata('id_user');
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["historiServicePending"] = $this->M_Transaksi->getHistoriServicePending($id_user)->result();
        $data["historiServiceProses"] = $this->M_Transaksi->getHistoriServiceProses($id_user)->result();
        $data["historiServiceSelesai"] = $this->M_Transaksi->getHistoriServiceSelesai($id_user)->result();
        $data['title'] = 'Service Pending';
        $this->load->view("transaksi/pending", $data);
    }
    public function service_proses()
    {
        $id_user = $this->session->userdata('id_user');
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["historiServiceProses"] = $this->M_Transaksi->getHistoriServiceProses($id_user)->result();
        $data["historiServiceSelesai"] = $this->M_Transaksi->getHistoriServiceSelesai($id_user)->result();
        $data['title'] = 'Service Proses';
        $this->load->view("transaksi/proses", $data);
    }
    public function service_selesai()
    {
        $id_user = $this->session->userdata('id_user');
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["historiServiceProses"] = $this->M_Transaksi->getHistoriServiceProses($id_user)->result();
        $data["historiServiceSelesai"] = $this->M_Transaksi->getHistoriServiceSelesai($id_user)->result();
        $data['title'] = 'Service Selesai';
        $this->load->view("transaksi/selesai", $data);
    }

    // Menampilkan semua periode histori service kendaraan
    public function histori_service_kendaraan()
    {

        $nomor_plat = $this->uri->segment(4);

        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $data['serviceKendaraan'] = $this->M_Transaksi->getServiceKendaraan()->result();
        // $data['modalServiceKendaraan'] =
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Histori Service Kendaraan';

        $this->load->view("transaksi/histori_service_kendaraan", $data);
    }

    // Mencetak detail faktur penjualan
    public function cetakPenjualan()
    {
        $no_faktur = $this->uri->segment(4);
        $data['penjualan'] = $this->M_Transaksi->getPenjualan($no_faktur)->row_array();
        $data['detail'] = $this->M_Transaksi->getDetailPenjualan($no_faktur)->result();
        $this->load->view('transaksi/cetak_penjualan', $data);
    }
    // Mencetak faktur service
    public function cetakService()
    {
        $no_faktur = $this->uri->segment(4);
        $data['service'] = $this->M_Transaksi->getService($no_faktur)->row_array();
        $data['detail'] = $this->M_Transaksi->getDetailService($no_faktur)->result();
        $this->load->view('transaksi/cetak_service', $data);
    }

    // Load data table histori service kendaraan
    public function json_service()
    {
        $this->datatables->setSelect("
            kendaraan.no_regis as nomorplat,
            kilometer,
            service_terakhir as lastservice,
            pemegang_kendaraan.kode_pemegang as kodepemegang,
            pemegang_kendaraan.nama_pemegang as namapemegang,
            pemegang_kendaraan.jenis_kendaraan as jeniskend
        ");
        $this->datatables->setTable("kendaraan");
        $this->datatables->setJoin("pemegang_kendaraan", "kendaraan.no_regis = pemegang_kendaraan.no_regis_kendaraan", NULL);
        $this->datatables->setWhere("check_service", 1);
        $this->datatables->setColumn([
            '<index>',
            '<get-nomorplat>',
            '<get-kodepemegang>',
            '<get-namapemegang>',
            '<get-jeniskend>',
            '<get-lastservice>',
            '[format_angka=<get-kilometer>] KM',
            '<div class="text-center">
                <button type="button" class="btn btn-sm btn-warning btn-view" data-platkend="<get-nomorplat>" ><i class="fa fa-eye"></i></button>
            </div>'
        ]);
        $this->datatables->generate();
    }
    public function json_service_details($nomorplat = null)
    {
        $this->datatables->setSelect("
            t_service.no_faktur as nofaktur,
            tgl_transaksi as tgltransaksi,
            current_km as currentkm
        ");
        $this->datatables->setTable("t_service");
        $this->datatables->setWhere("nomor_plat_kendaraan", $nomorplat);
        $this->datatables->setColumn([
            '<index>',
            '<get-nofaktur>',
            '<get-tgltransaksi>',
            '<get-currentkm>'
        ]);
        // $this->datatables->setSearchField("name");
        $this->datatables->generate();
    }

    // Tambah data service baru di modal service harga
    public function tambahServiceBaru()
    {
        $kode_service = $this->input->post('kode_service');
        $nama_service = $this->input->post('nama_service');
        $tipe_kendaraan = $this->input->post('tipe_kendaraan');
        $harga_service = $this->input->post('harga_service');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');
        $insertData = array(
            'kode_service' => $kode_service,
            'nama_service' => $nama_service,
            'tipe_kendaraan' => $tipe_kendaraan,
            'harga' => $harga_service,
            'jenis_kendaraan' => strtolower($jenis_kendaraan)
        );
        $this->db->insert('service', $insertData);
    }


    // Transaksi Pembelian Stok
    public function cekPembelian()
    {
        $jmlData = $this->M_Transaksi->cekPembelian()->num_rows();
        echo $jmlData;
    }

    public function select_supplier()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pilih Supplier Barang';
        $data['supplier'] = $this->M_Supplier->getDataSupplier();
        $this->load->view("transaksi/input_supplier", $data);
    }

    public function redirect_supplier()
    {
        $kode_supplier = $this->input->post('kode_supplier');
        redirect('penjualan/transaksi/pembelian/' . $kode_supplier);
    }

    public function pembelian($kode_supplier)
    {
        $kode_supplier = $this->uri->segment(4);
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);

        $getLastFaktur = $this->M_Transaksi->getLastFakturPembelian($hari, $bulan, $tahun)->row_array();
        $lastNumber = $getLastFaktur['no_faktur'];
        $noFaktur = buatKode($lastNumber, 'STCK' . $hari . $bulan . $thn, 4);
        $data['no_faktur'] = $noFaktur;

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['supplier'] = $this->db->get_where('supplier', ['kode_supplier' => $kode_supplier])->row_array();

        // $data['barang'] = $this->M_Barang->getDataBarang();
        $data['sup_barang'] = $this->M_Supplier->getListBarang($kode_supplier)->result();

        $data["pembelianTemp"] = $this->M_Transaksi->getDataPembelianTemp($id_user)->result();

        $data['title'] = 'Tambah Pembelian Barang';
        $this->load->view("transaksi/pembelian_barang", $data);
    }

    public function getDataPembelianTemp()
    {
        $id_user = $this->input->post('id_user');
        $data["pembelianTemp"] = $this->M_Transaksi->getDataPembelianTemp($id_user)->result();
        $this->load->view('transaksi/pembelian_detail_temp', $data);
    }

    public function simpanPembelianTemp()
    {
        $kode_barang_temp = $this->input->post('kode_barang');
        $kode_supplier = $this->input->post('kode_supplier');
        $jenis_kendaraan = $this->input->post('jenis_kendaraan');
        $jenis_barang = $this->input->post('jenis_barang');
        $harga = $this->input->post('harga');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');

        $cekServiceTemp = $this->M_Transaksi->cekPembelianTemp($kode_barang_temp, $id_user)->num_rows();
        if ($cekServiceTemp > 0) {
            echo "1";
        } else {
            $data = array(
                'kode_supplier'  => $kode_supplier,
                'kode_barang_temp'  => $kode_barang_temp,
                'jenis_kendaraan'  => $jenis_kendaraan,
                'jenis_barang'  => $jenis_barang,
                'harga_barang' => $harga,
                'qty' => $qty,
                'id_user'  => $id_user
            );
            $simpan = $this->M_Transaksi->insertPembelianTemp($data);
        }
    }

    public function hapusPembelianTemp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $id_user = $this->input->post('id_user');

        $hapus = $this->M_Transaksi->deletePembelianTemp($kode_barang, $id_user);

        echo $hapus;
    }

    public function simpanPembelianBarang()
    {
        $no_faktur = $this->input->post('noFaktur');
        $tgl_transaksi = $this->input->post('tglTransaksi');
        $kode_supplier = $this->input->post('kodeSupplier');
        $id_user = $this->input->post('idUser');

        $cekNoFakturPenj = $this->M_Transaksi->cekNoFakturPenj($no_faktur, $id_user)->num_rows();
        if ($cekNoFakturPenj > 0) {
            echo "1";
        } else {
            $data = array(
                'no_faktur' => $no_faktur,
                'tgl_transaksi' => $tgl_transaksi,
                'kode_supplier' => $kode_supplier,
                'id_user' => $id_user
            );
            $this->M_Transaksi->insertPembelian($data, $id_user, $no_faktur);
        }
    }

    // Menampilkan histori penjualan
    public function histori_pembelian()
    {
        $id_user = $this->session->userdata('id_user');
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data["historiPembelian"] = $this->M_Transaksi->getHistoriPembelian($id_user)->result();

        $data['title'] = 'Histori Pembelian Barang';
        $this->load->view("transaksi/histori_pembelian", $data);
    }

    // Mencetak detail faktur pembelian
    public function cetakPembelian()
    {
        $no_faktur = $this->uri->segment(4);

        $data['pembelian'] = $this->M_Transaksi->getPembelian($no_faktur)->row_array();
        $data['detail'] = $this->M_Transaksi->getDetailPembelian($no_faktur)->result();

        $this->load->view('transaksi/cetak_pembelian', $data);
    }
}
