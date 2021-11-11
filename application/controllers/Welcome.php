<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('hitung_model');
	}
	public function index()
	{
		$data = $this->hitung_model->hitung();
		$this->load->view('welcome_message', $data);
	}
}
