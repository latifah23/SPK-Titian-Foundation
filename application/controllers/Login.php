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
		$this->load->view('template/header');;
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
			'password' => md5($password)
		);
		$cek = $this->m_login->cek_login("admin", $where)->num_rows();

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
		}
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
}
