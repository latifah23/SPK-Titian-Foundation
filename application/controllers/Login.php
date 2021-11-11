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
				echo "Username dan password salah !";
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
				echo "Username dan password salah !";
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
