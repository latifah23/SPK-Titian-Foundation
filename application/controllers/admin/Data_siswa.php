<?php 

class Data_siswa extends CI_Controller
{

    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
        else if ($this->session->userdata('akses')!= 'admin') {
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
        $data['siswa'] = $this->titian_model->get_data('siswa')->result();      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa/data_siswa',$data);
        $this->load->view('template/footer');
    }
    public function add_siswa()
    {
        $data['siswa'] = $this->titian_model->get_data('siswa')->result();      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa/add_siswa',$data);
        $this->load->view('template/footer');
    }
    public function add_siswa_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == TRUE)
        {
            $this->add_siswa();
        }else{
            $id_siswa           = $this->input->post('id_siswa');
            $nama               = $this->input->post('nama');
            $asal_sekolah       = $this->input->post('asal_sekolah');

            $dom_kode = $this->titian_model->get_urutan_kode_terakhir();
            $dom_kode = substr($dom_kode, 1);
            if (!empty($dom_kode)) {
                $dom_kode = (int)$dom_kode;
                $dom_kode++;
                $kode = "A".sprintf("%02s", $dom_kode);
            } else{
                $kode = "A01";
            }

        $data = array(
            'id_siswa'          => $kode,
            'nama'              => $nama,
            'asal_sekolah'      => $asal_sekolah,
           
        );
    
        $this->titian_model->insert_data($data,'siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data siswa berhasil ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_siswa');
        }
    }

    public function update_siswa($id)
    {
        $where = array('id_siswa' => $id);
        $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE id_siswa = '$id'")->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa/update_siswa',$data);
        $this->load->view('template/footer');
    }

    public function update_siswa_aksi()
    {
        $this->_rules();
        $id             = $this->input->post('id_siswa');
        
        if($this->form_validation->run() == FALSE)
        {
            redirect(site_url('update_siswa'.$id));
            
        }else{
            $id_siswa           = $this->input->post('id_siswa');
            $nama               = $this->input->post('nama');
            $asal_sekolah       = $this->input->post('asal_sekolah');
           
        $data = array(
            'id_siswa'          => $id_siswa,
            'nama'              => $nama,
            'asal_sekolah'      => $asal_sekolah,
            
        );

        $where = array(
            'id_siswa' => $id
        );

        $this->titian_model->update_data('siswa', $data, $where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data siswa berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_siswa');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_siswa','Id_siswa','required');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('asal_sekolah','Asal_sekolah','required');
        
    }

    public function delete_siswa($id){
        $where = array('id_siswa' => $id);
        $this->titian_model->delete_data($where, 'siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data siswa berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_siswa');
    }
}
?>