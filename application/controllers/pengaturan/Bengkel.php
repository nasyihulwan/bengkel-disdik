<?php

class Bengkel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Pengaturan');
        is_logged_in();
        access_menu_s2();
    }

    public function index()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengaturan';
        $this->load->view("pengaturan/company_profile", $data);
    }
    public function fungsi_update()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['company'] = $this->db->get('company_info')->row_array();;
        $data['title'] = 'Pengaturan';
        $this->form_validation->set_rules('nama', 'Nama Bengkel', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view("pengaturan/company_profile", $data);
        } else {
            $nama = $this->input->post('nama');
            $no_telp = $this->input->post('no_telp');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            // check gambar yg akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['upload_path'] = './dist/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['company']['image'];
                    if ($old_image != 'company_default.jpg') {
                        unlink(FCPATH . 'dist/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pengaturan/bengkel');
                }
            }
            $updateCompany = array(
                'nama' => $nama,
                'no_telp' => $no_telp,
                'email' => $email,
                'alamat' => $alamat
            );
            $this->db->update('company_info', $updateCompany);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your company profile has been updated!</div>');
            redirect('pengaturan/bengkel');
        }
    }
}
