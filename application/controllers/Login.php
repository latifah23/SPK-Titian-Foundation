<?php

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	function index()
	{
		$this->load->view('template/header');
		$this->load->view('v_login');
		$this->load->view('template/footer');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$where = array(
			'username' => $username,
			'level' => $level,
			'password' => md5($password)
		);
		//cek status admin aktif/ tidak aktif
		$cek = $this->m_login->cek_login("admin", $where)->num_rows();
		$data = $this->db->query("SELECT status FROM admin WHERE username = '$username'")->row_array();
		if ($data['status'] == "0") {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Maaf akun anda sudah tidak aktif, silahkan hubungi admin
                </div>
                </div>'
			);
			redirect(base_url('login'));
		}
		if ($level == 'admin') {
			if ($cek > 0) {

				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'akses' => "admin"
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("admin/dashboard"));
			} else {
				// echo "Username dan password salah !";
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Username dan password salah !
                </div>
                </div>'
				);
				redirect(base_url('login'));
			}
		} elseif ($level == 'manajer') {
			if ($cek > 0) {

				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'akses' => "manajer"
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("admin/dashboard"));
			} else {
				// echo "Username dan password salah !";
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Username dan password salah !
                </div>
                </div>'
				);
				redirect(base_url('login'));
			}
		} elseif ($level == 'superadmin') {
			if ($cek > 0) {

				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'akses' => "superadmin"
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("admin/dashboard"));
			} else {
				// echo "Username dan password salah !";
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Username dan password salah !
                </div>
                </div>'
				);
				redirect(base_url('login'));
			}
		}
	}
	function aksi_daftar()
	{
		$nama           	= $this->input->post('nama');
		$username       	= $this->input->post('username');
		$password       	= md5($this->input->post('password'));
		$passwordConfirm 	= md5($this->input->post('confirm-password'));
		if ($password != $passwordConfirm) {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Password tidak sesuai
                </div>
                </div>'
			);
			redirect(base_url('login/register'));
		}
		$data = array(
			'nama'          => $nama,
			'username'      => $username,
			'password'      => $password,
			'status'        => 1 //Aktif
		);

		$this->titian_model->insert_data($data, 'admin');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data admin berhasil ditambahkan, Silahkan Login !!!
                </div>
                </div>'
		);
		redirect(base_url('login'));
	}
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-primary alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Berhasil Logout
                </div>
                </div>'
		);
		redirect(base_url('login'));
	}
	function register()
	{
		$this->load->view('template/header');
		$this->load->view('v_register');
		$this->load->view('template/footer');
	}
}
