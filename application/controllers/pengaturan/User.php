<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_User');
        $this->load->model('M_Pengaturan');
        $this->load->model('M_Supplier');
        is_logged_in();
        access_menu_s3();
    }

    public function index()
    {
    }
    public function profile()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_role = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile_role'] = $this->M_User->getRole($user_role['role_id']);
        $data['title'] = 'My Profile';
        $this->load->view('pengaturan/user_profile', $data);
    }
    public function edit_profile()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('pengaturan/edit_profile', $data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $role_id = $this->input->post('role_id');
            $alamat = $this->input->post('alamat');
            // check gambar yg akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['upload_path'] = './dist/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'dist/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pengaturan/user/edit_profile');
                }
            }
            $updateProfile = array(
                'nama' => $nama,
                'email' => $email,
                'no_telp' => $no_telp,
                'role_id' => $role_id,
                'alamat' => $alamat
            );
            $this->db->where('email', $email);
            $this->db->update('user', $updateProfile);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('pengaturan/user/edit_profile');
        }
    }
    public function list()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array(
            'tampilCompany' => $queryCompany
        );

        $data['tampilUser'] = $this->M_User->getDataUser()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'List User';

        $this->load->view('pengaturan/list_user', $data);
    }

    public function update_role()
    {
        $id_user = $this->input->post('id_user');
        $newrole = $this->input->post('new_role');

        $data = array(
            'role_id' => $newrole
        );

        $this->db->where('id', $id_user);
        $this->db->update('user', $data);
    }

    public function tambah_user()
    {
        $queryCompany = $this->M_Pengaturan->getDataCompany();
        $data = array('tampilCompany' => $queryCompany);
        $data['supplier'] = $this->M_Supplier->getDataSupplierNoAcc();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah terdaftar! Silahkan Login.'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah User Baru';
            $this->load->view('pengaturan/tambah_user', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'role_id' => $this->input->post('role_id'),
                'kode_supplier' => $this->input->post('kode_supplier'),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="card-header"><h3 class="card-title">Data berhasil dibuat!</h3></div>');
            redirect('pengaturan/user/tambah_user');
        }
    }
}
