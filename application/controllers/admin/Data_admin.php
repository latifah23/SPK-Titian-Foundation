<?php

class Data_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Login terlebih dahulu
                </div>
                </div>'
            );
            redirect(base_url("login"));
        } else if ($this->session->userdata('akses') != 'manajer' && $this->session->userdata('akses') != 'superadmin') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Anda tidak bisa akses halaman ini!!!
                </div>
                </div>'
            );
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['admin'] = $this->titian_model->get_data('admin')->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/data_admin', $data);
        $this->load->view('template/footer');
    }

    public function add_admin()
    {
        $data['admin'] = $this->titian_model->get_data('admin')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/add_admin', $data);
        $this->load->view('template/footer');
    }
    public function add_admin_aksi()
    {
        $cek = $this->db->get_where('admin', array('nama' => $this->input->post('nama')));
        if ($cek->num_rows() != 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Maaf Data sudah ada!
                    </div>
                </div>'
            );
            redirect('admin/data_admin');
        }
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add_admin();
        } else {
            $nama           = $this->input->post('nama');
            $username       = $this->input->post('username');
            $password       = md5($this->input->post('password'));
            $status         = $this->input->post('status');

            $data = array(
                'nama'          => $nama,
                'username'      => $username,
                'password'      => $password,
                'status'        => $status
            );

            $this->titian_model->insert_data($data, 'admin');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data admin berhasil ditambahkan!
                </div>
                </div>'
            );
            redirect('admin/data_admin');
        }
    }

    public function update_admin($id)
    {
        // $where = array('id_admin' => $id);
        $data['admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id'")->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/update_admin', $data);
        $this->load->view('template/footer');
    }

    public function update_admin_aksi()
    {
        $id             = $this->input->post('id_admin');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update_admin($id);
        } else {
            $id             = $this->input->post('id_admin');
            $nama           = $this->input->post('nama');
            $username       = $this->input->post('username');
            $password       = md5($this->input->post('password'));
            $status         = $this->input->post('status');

            $data = array(
                'nama'          => $nama,
                'username'      => $username,
                'password'      => $password,
                'status'        => $status
            );

            $where = array(
                'id_admin' => $id
            );

            $this->titian_model->update_data('admin', $data, $where);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data admin berhasil di Update!
                </div>
                </div>'
            );
            redirect('admin/data_admin');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }

    public function delete_admin($id)
    {
        $where = array('id_admin' => $id);
        $this->titian_model->delete_data($where, 'admin');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data admin berhasil dihapus!
                </div>
                </div>'
        );
        redirect('admin/data_admin');
    }
}
