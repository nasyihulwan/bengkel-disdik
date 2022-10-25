<?php

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Pengaturan');
        $this->load->model('M_Booking');
        $this->load->model("datatables");
        error_reporting(E_ALL & ~E_NOTICE);
        is_logged_in();
        access_menu_s1();
    }

    public function index()
    {
    }
    public function pending()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $DATA = array('tampilCompany' => $queryCompany);
        $DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $DATA['title'] = 'Booking Service Pending';
        $this->load->view("booking/pending", $DATA);
    }
    public function antri()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $DATA = array('tampilCompany' => $queryCompany);
        $DATA['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $DATA['title'] = 'Antrian Booking Service';
        $this->load->view("booking/antri", $DATA);
    }
    public function json_pending()
    {
        $this->datatables->setSelect("
            nama_pemegang as namapemegang,
            no_regis_kendaraan as noplat,
            nip,
            alamat_pemegang as alamatpemegang,
            email,
            no_telp as notelp,
            booking_date as tglbooking
        ");
        $this->datatables->setTable("b_service");
        $this->datatables->setWhere("status", 'Pending');
        $this->datatables->setColumn([
            '<index>',
            '<get-namapemegang>',
            '<get-noplat>',
            '<get-nip>',
            '<get-alamatpemegang>',
            '<get-email>',
            '<get-notelp>',
            '<get-tglbooking>',
            '<div class="text-center">
            
                <button type="button" class="btn btn-sm btn-primary btn-view approve" data-platkend="<get-noplat>" ><i class="fa fa-check "></i></button>
                <button type="button" class="btn btn-sm btn-warning btn-view detailPending" data-platkend="<get-noplat>" ><i class="fa fa-eye"></i></button>
            </div>'
        ]);
        $this->datatables->generate();
    }
    public function json_details()
    {
        $this->datatables->setSelect("
            kilometer,
            jenis_service as jenisservice,
            ket_booking as ketbooking
        ");
        $this->datatables->setTable("b_service");
        $this->datatables->setColumn([
            '<get-kilometer>',
            '<get-jenisservice>',
            '<get-ketbooking>'
        ]);
        $this->datatables->generate();
    }


    public function json_antri()
    {
        $this->datatables->setSelect("
            kode_pemegang as kodepemegang,
            b_service.kode_antri as kodeantri,
            b_service.nama_pemegang as namapemegang,
            b_service.no_regis_kendaraan as noplat,
            b_service.nip,
            b_service.alamat_pemegang as alamatpemegang,
            b_service.email,
            b_service.no_telp as notelp,
            booking_date as tglbooking,
            kode_antri as kodeantri
        ");
        $this->datatables->setTable("b_service");
        $this->datatables->setJoin("pemegang_kendaraan", 'b_service.no_regis_kendaraan = pemegang_kendaraan.no_regis_kendaraan', NULL);
        $this->datatables->setWhere("status", 'Antri');
        $this->datatables->setColumn([
            '<index>',
            '<get-kodeantri>',
            '<get-kodepemegang>',
            '<get-namapemegang>',
            '<get-noplat>',
            '<get-nip>',
            '<get-alamatpemegang>',
            '<get-email>',
            '<get-notelp>',
            '<get-tglbooking>',
            '<div class="text-center">
                <button type="button" class="btn btn-sm btn-primary btn-view editTglBooking" data-tglbooking="<get-tglbooking>" data-platkend="<get-noplat>" data-nip="<get-nip>" ><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-sm btn-warning btn-view detailAntri" data-platkend="<get-noplat>" ><i class="fa fa-eye"></i></button>
                <button type="button" class="btn btn-sm btn-info btn-view tambahTransaksi" data-kodeantri="<get-kodeantri>" data-kodepemegang="<get-kodepemegang>" data-tglbooking="<get-tglbooking>" ><i class="fa fa-plus"></i></button>
            </div>'
        ]);
        $this->datatables->generate();
    }

    public function approve()
    {
        $nomor_plat = $this->input->post('nomor_plat');
        $data = array('nomor_plat' => $nomor_plat);
        $this->M_Booking->approveBooking($data);
    }

    public function update_tglbooking()
    {
        $plat_nomor = $this->input->post('plat_nomor');
        $nip = $this->input->post('nip');
        $booking_date = $this->input->post('booking_date');
        $new_booking = $this->input->post('new_booking');

        $whereArr = array(
            'no_regis_kendaraan' => $plat_nomor,
            'nip' => $nip,
            'booking_date' => $booking_date,
            'status' => 'Antri'
        );

        $this->db->set('booking_date', $new_booking);
        $this->db->where($whereArr);
        $this->db->update('b_service');
    }

    public function cek()
    {
        $data = array(
            'nip' => '202020',
            'no_regis_kendaraan' => 'D666GOG'
        );
        $checkPemegang = $this->db->get_where('pemegang_kendaraan', array('nip' => $data['nip'], 'no_regis_kendaraan' => $data['no_regis_kendaraan']));
        if ($checkPemegang->num_rows() > 1) {
            echo 'LEBIH DARI SATU';
        } else {
            echo $checkPemegang->num_rows();
        }
    }
}
