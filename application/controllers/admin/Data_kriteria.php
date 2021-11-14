<?php 

class Data_kriteria extends CI_Controller
{
    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
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
        $data['kriteria'] = $this->titian_model->get_data('kriteria')->result();      
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kriteria/data_kriteria',$data);
        $this->load->view('template/footer');
    }

    public function add_kriteria()
    {
        $data['kriteria'] = $this->titian_model->get_data('kriteria')->result();      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kriteria/add_kriteria',$data);
        $this->load->view('template/footer');
    }
    public function add_kriteria_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->add_kriteria();
        }else{
            $id_kriteria        = $this->input->post('id_kriteria');
            $nama_kriteria      = $this->input->post('nama_kriteria');
            $atribut            = $this->input->post('atribut');
            $bobot              = $this->input->post('bobot');
        
            $dom_kode = $this->titian_model->get_urutan_kode_terakhir_kriteria();
            $dom_kode = substr($dom_kode, 1);
            if (!empty($dom_kode)) {
                $dom_kode = (int)$dom_kode;
                $dom_kode++;
                $kode = "K".sprintf("%02s", $dom_kode);
            } else{
                $kode = "K01";
            }

        $data = array(

            'id_kriteria'       => $kode,
            'nama_kriteria'     => $nama_kriteria,
            'atribut'           => $atribut,
            'bobot'             => $bobot
        );

        // echo"<pre>";print_r($data);die();
        $this->titian_model->insert_data($data,'kriteria');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data kriteria berhasil di Tambahkan!
                </div>
                </div>'
            );
        redirect('admin/data_kriteria');
        }
    }

    public function update_kriteria($id)
    {
        $where = array('id_kriteria' => $id);
        $data['kriteria'] = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria = '$id'")->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kriteria/update_kriteria',$data);
        $this->load->view('template/footer');
    }

    public function update_kriteria_aksi()
    {
        $this->_rules();
        $id             = $this->input->post('id_kriteria');
        
        if($this->form_validation->run() == FALSE)
        {
            redirect(site_url('update_kriteria'.$id));
            
        }else{
            $id_kriteria        = $this->input->post('id_kriteria');
            $nama_kriteria      = $this->input->post('nama_kriteria');
            $atribut            = $this->input->post('atribut');
            $bobot              = $this->input->post('bobot');
        
        $data = array(
            
            'id_kriteria'       => $id_kriteria,
            'nama_kriteria'     => $nama_kriteria,
            'atribut'           => $atribut,
            'bobot'             => $bobot
        );

        $where = array(
            'id_kriteria' => $id
        );

        $this->titian_model->update_data('kriteria', $data, $where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data kriteria berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_kriteria');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kriteria','Nama_kriteria','required');
        $this->form_validation->set_rules('atribut','Atribut','required');
        $this->form_validation->set_rules('bobot','Bobot','required');

    }

    public function delete_kriteria($id){
        $where = array('id_kriteria' => $id);
        $this->titian_model->delete_data($where, 'kriteria');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data kriteria berhasil di Hapus!
                </div>
                </div>'
        );
        redirect('admin/data_kriteria');
    }
}
?>