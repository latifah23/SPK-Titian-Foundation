<?php

class Data_nilai extends CI_Controller
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
        $data['hasil_nilai'] = $this->titian_model->get_data_nilai();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai/data_nilai', $data);
        $this->load->view('template/footer');
    }

    public function add_nilai()
    {
        $data['siswa']      = $this->titian_model->get_data('siswa')->result();
        $data['kriteria']    = $this->titian_model->get_data('kriteria')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai/add_nilai', $data);
        $this->load->view('template/footer');
    }

    public function add_nilai_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add_nilai();
        } else {
            $id_kriteria    = $this->input->post('id_kriteria');
            $nilai          = $this->input->post('nilai');
            foreach ($id_kriteria as $key => $id_kriteriax) {
                $data = array(
                    'id_siswa' => $this->input->post('id_siswa'),
                    'id_kriteria' => $id_kriteriax,
                    'nilai' => $nilai[$key],
                );
                $this->titian_model->insert_data($data, 'nilai_alternatif');
            }
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data nilai berhasil ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
            redirect('admin/data_nilai');
        }
    }

    public function update_nilai($id)
    {
        // $where = array('id_siswa' => $id);
        $data['id_siswa']       = $id;
        $data['nilai']          = $this->db->query("SELECT * FROM nilai_alternatif WHERE id_siswa = '$id'")->result();
        $data['siswa']          = $this->titian_model->get_data('siswa')->result();
        $data['kriteria']       = $this->titian_model->get_data('kriteria')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai/update_nilai', $data);
        $this->load->view('template/footer');
    }

    public function update_nilai_aksi()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     redirect(site_url('update_nilai' . $id));
        // } else {
        $id_nilai   = $this->input->post('id_nilai');
        $data       = array();
        foreach ($id_nilai as $key => $value) {
            $data[] = array(
                "id_nilai"      => $id_nilai[$key],
                "nilai"         => $_POST['nilai'][$key],
                "id_kriteria"   => $_POST['id_kriteria'][$key],
            );
        } 
        $this->db->update_batch('nilai_alternatif', $data, 'id_nilai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data nilai berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
            redirect('admin/data_nilai');
        // }
    }

    public function delete_nilai($id)
    {
        $where = array('id_siswa' => $id);
        $this->titian_model->delete_data($where, 'nilai_alternatif');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data nilai berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/data_nilai');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'required');
    }
}
