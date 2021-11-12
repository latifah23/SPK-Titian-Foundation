<?php 

class Data_periode extends CI_Controller
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
        $data['periode'] = $this->titian_model->get_data('periode')->result();      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('periode/data_periode',$data);
        $this->load->view('template/footer');
    }
    public function add_periode()
    {
        $data['periode'] = $this->titian_model->get_data('periode')->result();      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('periode/add_periode',$data);
        $this->load->view('template/footer');
    }
    public function add_periode_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == TRUE)
        {
            $this->add_periode();
        }else{
            $id_periode           = $this->input->post('id_periode');
            $generasi               = $this->input->post('generasi');
            $tahun       = $this->input->post('tahun');

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
            'id_periode'          => $kode,
            'generasi'              => $generasi,
            'tahun'      => $tahun,
           
        );
    
        $this->titian_model->insert_data($data,'periode');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data periode berhasil ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_periode');
        }
    }

    public function update_periode($id)
    {
        $where = array('id_periode' => $id);
        $data['periode'] = $this->db->query("SELECT * FROM periode WHERE id_periode = '$id'")->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('periode/update_periode',$data);
        $this->load->view('template/footer');
    }

    public function update_periode_aksi()
    {
        $this->_rules();
        $id             = $this->input->post('id_periode');
        
        if($this->form_validation->run() == FALSE)
        {
            redirect(site_url('update_periode'.$id));
            
        }else{
            $id_periode           = $this->input->post('id_periode');
            $generasi               = $this->input->post('generasi');
            $tahun       = $this->input->post('tahun');
           
        $data = array(
            'id_periode'          => $id_periode,
            'generasi'              => $generasi,
            'tahun'      => $tahun,
            
        );

        $where = array(
            'id_periode' => $id
        );

        $this->titian_model->update_data('periode', $data, $where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data periode berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_periode');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_periode','Id_periode','required');
        $this->form_validation->set_rules('generasi','Generasi','required');
        $this->form_validation->set_rules('tahun','Tahun','required');
        
    }

    public function delete_periode($id){
        $where = array('id_periode' => $id);
        $this->titian_model->delete_data($where, 'periode');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data periode berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_periode');
    }
}
?>