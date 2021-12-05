<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_rangking extends CI_Controller
{

    public function __construct()
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
        } else if ($this->session->userdata('akses') != 'manajer' && $this->session->userdata('akses') != 'superadmin') {
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

        $this->load->model('hitung_model');
    }
    public function index()
    {
        if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            $data = $this->hitung_model->hitung($tahun);
            $where = array('id_periode ' => $tahun);
            $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
            foreach ($periodeSiswa as $p) {
                $thn = $p->tahun;
            }
            $ket = 'Data Siswa periode ' . $thn;
        } else {
            $thn = date("Y");
            $where = array('tahun ' => $thn);
            $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
            foreach ($periodeSiswa as $p) {
                $tahun = $p->id_periode;
            }
            $data = $this->hitung_model->hitung($tahun);
            $ket = 'Data Siswa periode ' . $thn;
        }
<<<<<<< HEAD
        // $sis  = $this->titian_model->get_where_data($where, 'siswa')->result();
        // foreach ($sis as $s) {            
            // if ($data['siswa']>1) {
                $data['ket'] = $ket;
                $data['thn'] = $thn;
                $data['option_tahun'] = $this->titian_model->get_data('periode')->result();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('rank/data_rank', $data);
                $this->load->view('template/footer');
            // }else{
            //     redirect(base_url('admin/data_nilai_alternatif'));
            // }
        // }
=======
        $data['ket'] = $ket;
        $data['thn'] = $thn;
        $data['id_thn'] = $tahun;
        $data['option_tahun'] = $this->titian_model->get_data('periode')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rank/data_rank', $data);
        $this->load->view('template/footer');
>>>>>>> 2a69229089e583c2b7cbf6538e8a05ec7e7223af
    }

    public function keputusan()
    {
        if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            $data = $this->hitung_model->hitung($tahun);
            $where = array('id_periode ' => $tahun);
            $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
            foreach ($periodeSiswa as $p) {
                $thn = $p->tahun;
            }
            $ket = 'Data Siswa periode ' . $thn;
            $url_cetak = 'admin/data_rangking/cetak?tahun=' . $tahun;
            $transaksi = $this->titian_model->view_by_year($tahun)->result();
        } else {
            $thn = date("Y");
            $where = array('tahun ' => $thn);
            $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
            foreach ($periodeSiswa as $p) {
                $tahun = $p->id_periode;
            }
            $data = $this->hitung_model->hitung($tahun);
            $ket = 'Data Siswa periode ' . $thn;
            $url_cetak = 'admin/data_rangking/cetak?tahun=' . $tahun;
            $transaksi = $this->titian_model->view_by_year($tahun)->result();
        }
        $data['ket'] = $ket;
        $data['thn'] = $thn;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;
        $data['id_thn'] = $tahun;
        $data['option_tahun'] = $this->titian_model->get_data('periode')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rank/data_keputusan', $data);
        $this->load->view('template/footer');
    }
    public function cetak()
    {
        if (isset($_GET['tahun']) && !empty($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
            $data = $this->hitung_model->hitung($tahun);
            $where = array('id_periode ' => $tahun);
            $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
            foreach ($periodeSiswa as $p) {
                $thn = $p->tahun;
                $gen = $p->generasi;
            }
            $ket = 'Data Siswa periode ' . $thn;
        } else {
            $thn = date("Y");
            $where = array('tahun ' => $thn);
            $periodeSiswa  = $this->titian_model->get_where_data($where, 'periode')->result();
            foreach ($periodeSiswa as $p) {
                $tahun = $p->id_periode;
                $gen = $p->generasi;
            }
            $data = $this->hitung_model->hitung($tahun);
            $ket = 'Data Siswa periode ' . $thn;
        }
        $data['ket'] = $ket;
        $data['thn'] = $thn;
        $data['gen'] = $gen;
        $w = array('periode.id_periode ' => $tahun);
        $data['nama'] = $this->titian_model->joinNilaiAlternatifWhere($w);
        $data['kriteria']    = $this->titian_model->get_data('kriteria')->result();
        $this->load->view('rank/print', $data);
    }
    public function insert()
    {
        $id_rank    = $this->input->post('id_rank');
        $id_siswa    = $this->input->post('id_siswa');
        $cek = $this->db->get_where('keputusan', array('id_siswa' => $id_siswa[0]));
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
            redirect('admin/data_rangking/keputusan');
        }
        foreach ($id_rank as $key => $value) {
            $data = array(
                "keputusan"         => $id_rank[$key],
                "id_siswa"          => $_POST['id_siswa'][$key],
                "nilai"             => $_POST['nilai'][$key],
                "keputusan"         => $_POST['keputusan'][$key],
                'tanggal'           => date('Y-m-d H:i:s'),
            );
<<<<<<< HEAD
            echo json_encode($data);
            $this->titian_model->insert_data($data, 'keputusan');
=======
            $this->titian_model->insert_data($data, 'rangking');
>>>>>>> 2a69229089e583c2b7cbf6538e8a05ec7e7223af
        }
        redirect('admin/data_rangking/keputusan');
    }
    public function update()
    {
        $tahun = $_POST['tahun'];
        $id_rank    = $this->input->post('id_rank');
        if(!$id_rank){
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data keputusan belum di simpan!
                </div>
                </div>'
            );            
            redirect('admin/data_rangking/keputusan?tahun=' . $tahun);
        }
        $datar = array();
        foreach ($id_rank as $key => $value) {
            $datar[] = array(
<<<<<<< HEAD
                "id_keputusan"          => $id_rank[$key],
                // "nama_siswa"        => $_POST['id_siswa'][$key],
                // "nilai"             => $_POST['nilai'][$key],
=======
                "id_rangking"          => $id_rank[$key],
>>>>>>> 2a69229089e583c2b7cbf6538e8a05ec7e7223af
                "keputusan"         => $_POST['keputusan'][$key],
            );
        }
        $this->db->update_batch('keputusan', $datar, 'id_keputusan');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data keputusan berhasil di Update!
                </div>
                </div>'
        );
        redirect('admin/data_rangking/keputusan?tahun=' . $tahun);
    }
    public function delete($id)
    {
        $where = array('id_keputusan' => $id);
        $this->titian_model->delete_data($where, 'keputusan');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Data keputusan berhasil di Hapus!
                </div>
                </div>'
        );
        redirect('admin/data_rangking/keputusan');
    }
}
