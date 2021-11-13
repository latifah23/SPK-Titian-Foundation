<?php 

class Dashboard extends CI_Controller{
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
        }
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
    }
}
?>