<?php

class Data_nilai_alternatif extends CI_Controller
{
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
        } else if ($this->session->userdata('akses') != 'admin' && $this->session->userdata('akses') != 'superadmin') {
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
            );
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['hasil_nilai'] = $this->titian_model->get_data_nilai();
        $data['nama'] = $this->titian_model->joinNilaiAlternatif();
        $data['kriteria']    = $this->titian_model->get_data('kriteria')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_alternatif/data_nilai', $data);
        $this->load->view('template/footer');
    }

    public function add_nilai()
    {
        $data['periode']      = $this->titian_model->get_data('periode')->result();
        $data['kriteria']    = $this->titian_model->get_data('kriteria')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_alternatif/add_nilai', $data);
        $this->load->view('template/footer');
    }

    public function add_nilai_aksi()
    {
        $cek = $this->db->get_where('siswa', array('asal_sekolah' => $this->input->post('asal_sekolah')));
        if ($cek->num_rows() != 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Maaf Data sudah ada!
                    </div>
                </div>'
            );
            redirect('admin/data_nilai_alternatif');
        }
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add_nilai();
        } else {
            $dataSiswa = array(
                'nama'              => $this->input->post('nama'),
                'asal_sekolah'              => $this->input->post('asal_sekolah'),
                'id_periode'              => $this->input->post('id_periode'),
            );

            $this->titian_model->insert_data($dataSiswa, 'siswa');
            echo json_encode($dataSiswa);
            $newUserID = $this->db->insert_id();
            $id_kriteria    = $this->input->post('id_kriteria');
            $nilai          = $this->input->post('nilai');
            foreach ($id_kriteria as $key => $id_kriteriax) {
                $data = array(
                    // 'id_siswa' => $this->input->post('id_siswa'),
                    'id_siswa' => $newUserID,
                    'id_kriteria' => $id_kriteriax,
                    'nilai' => $nilai[$key],
                );
                $this->titian_model->insert_data($data, 'nilai_alternatif');
                echo json_encode($data);
            }
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data berhasil di Tambahkan!
                </div>
                </div>'
            );
            redirect('admin/data_nilai_alternatif');
        }
    }

    public function update_nilai($id)
    {
        // $where = array('id_siswa' => $id);
        $data['id_siswa']       = $id;
        $data['nilai']          = $this->db->query("SELECT * FROM nilai_alternatif WHERE id_siswa = '$id'")->result();
        $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE id_siswa = '$id'")->result();
        $data['kriteria']       = $this->titian_model->get_data('kriteria')->result();
        $data['periode']       = $this->titian_model->get_data('periode')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_alternatif/update_nilai', $data);
        $this->load->view('template/footer');
    }

    public function update_nilai_aksi()
    {
        $id = $this->input->post('id_siswa');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update_nilai($id);
        } else {
            $data = array(
                'id_siswa'      => $this->input->post('id_siswa'),
                'nama'          => $this->input->post('nama'),
                'asal_sekolah'  => $this->input->post('asal_sekolah'),
                'id_periode'    => $this->input->post('id_periode'),

            );

            $where = array(
                'id_siswa' => $this->input->post('id_siswa'),
            );

            $this->titian_model->update_data('siswa', $data, $where);
            echo json_encode($data);
            $id_nilai   = $this->input->post('id_nilai');
            $data       = array();
            foreach ($id_nilai as $key => $value) {
                $data[] = array(
                    "id_nilai"      => $id_nilai[$key],
                    "nilai"         => $_POST['nilai'][$key],
                    "id_kriteria"   => $_POST['id_kriteria'][$key],
                );
            }
            echo json_encode($data);
            $this->db->update_batch('nilai_alternatif', $data, 'id_nilai');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data berhasil di Edit!
                </div>
                </div>'
            );
            redirect('admin/data_nilai_alternatif');
        }
    }

    public function delete_nilai($id)
    {
        $where = array('id_siswa' => $id);
        $this->titian_model->delete_data($where, 'siswa');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data berhasil di Hapus!
                </div>
                </div>'
        );
        redirect('admin/data_nilai_alternatif');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal sekolah', 'required');
        $this->form_validation->set_rules('id_periode', 'Periode', 'required');
    }
}
