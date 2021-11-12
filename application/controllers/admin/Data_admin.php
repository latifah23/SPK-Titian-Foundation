<?php 

class Data_admin extends CI_Controller
{
    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        else if ($this->session->userdata('akses')!= 'manajer') {
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
            ); redirect(base_url('login'));
            
        }
	}
 

    public function index()
    {
        $data['admin'] = $this->titian_model->get_data('admin')->result();      
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/data_admin',$data);
        $this->load->view('template/footer');
    }

    public function add_admin()
    {
        $data['admin'] = $this->titian_model->get_data('admin')->result();      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/add_admin',$data);
        $this->load->view('template/footer');
    }
    public function add_admin_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->add_admin();
        }else{
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

        $this->titian_model->insert_data($data,'admin');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data admin berhasil ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_admin');
        }
    }

    public function update_admin($id)
    {
        $where = array('id_admin' => $id);
        $data['admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id'")->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/update_admin',$data);
        $this->load->view('template/footer');
    }

    public function update_admin_aksi()
    {
        $this->_rules();
        $id             = $this->input->post('id_admin');
        
        if($this->form_validation->run() == FALSE)
        {
            redirect(site_url('update_admin'.$id));
            
        }else{
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
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data admin berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_admin');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('status','Status','required');
    }

    public function delete_admin($id){
        $where = array('id_admin' => $id);
        $this->titian_model->delete_data($where, 'admin');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data admin berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_admin');
    }
}