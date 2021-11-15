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
        } 
        else if ($this->session->userdata('akses') != 'manajer') {
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
        else if ($this->session->userdata('akses') != 'superadmin') {
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

        $data = $this->hitung_model->hitung();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rank/data_rank', $data);
        $this->load->view('template/footer');
    }

    public function keputusan()
    {
        $data = $this->hitung_model->hitung();
        // if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
        //     $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        //     if ($filter == '1') { // Jika filter nya 1 (per tanggal)
        //         $tgl = $_GET['tanggal'];

        //         $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
        //         $url_cetak = 'admin/data_rangking/cetak?filter=1&tanggal=' . $tgl;
        //         $transaksi = $this->titian_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di titian_model
        //     } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
        //         $bulan = $_GET['bulan'];
        //         $tahun = $_GET['tahun'];
        //         $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        //         $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
        //         $url_cetak = 'admin/data_rangking/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
        //         $transaksi = $this->titian_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di titian_model
        //     } else { // Jika filter nya 3 (per tahun)
        //         $tahun = $_GET['tahun'];

        //         $ket = 'Data Tahun ' . $tahun;
        //         $url_cetak = 'admin/data_rangking/cetak?filter=3&tahun=' . $tahun;
        //         $transaksi = $this->titian_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di titian_model
        //     }
        // } else { // Jika user tidak mengklik tombol tampilkan
        //     $ket = 'Semua Data';
        //     $url_cetak = 'admin/data_rangking/cetak';
        //     $transaksi = $this->titian_model->view_all(); // Panggil fungsi view_all yang ada di titian_model
        // }
        if (isset($_GET['tahun']) && !empty($_GET['tahun'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $tahun = $_GET['tahun'];
                $ket = 'Data Tahun ' . $tahun;
                $url_cetak = 'admin/data_rangking/cetak?tahun=' . $tahun;
                $transaksi = $this->titian_model->view_by_year($tahun)->result(); // Panggil fungsi view_by_year yang ada di titian_model
        } else { 
        // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data';
            $url_cetak = 'admin/data_rangking/cetak';
            $transaksi = $this->titian_model->view_all(); // Panggil fungsi view_all yang ada di titian_model
        }
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;
        // $data['option_tahun'] = $this->titian_model->option_tahun();
        $data['option_tahun'] = $this->titian_model->get_data('periode')->result();
        // $data['ranks'] = $this->titian_model->get_data('rangking')->result();      
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rank/data_keputusan', $data);
        $this->load->view('template/footer');
    }
    public function cetak()
    {
        if (isset($_GET['tahun']) && !empty($_GET['tahun'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            // $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            // if ($filter == '1') { // Jika filter nya 1 (per tanggal)
            //     $tgl = $_GET['tanggal'];

            //     $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
            //     $transaksi = $this->titian_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di titian_model
            // } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
            //     $bulan = $_GET['bulan'];
            //     $tahun = $_GET['tahun'];
            //     $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

            //     $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
            //     $transaksi = $this->titian_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di titian_model
            // } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Tahun ' . $tahun;
                $transaksi = $this->titian_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di titian_model
            }
        // } else { // Jika user tidak mengklik tombol tampilkan
        //     $ket = 'Semua Data';
        //     $transaksi = $this->titian_model->view_all(); // Panggil fungsi view_all yang ada di titian_model
        // }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        $this->load->view('rank/print', $data);
    }
    public function insert()
    {
        $id_rank    = $this->input->post('id_rank');
        foreach ($id_rank as $key => $value) {
            $data = array(
                "rangking"          => $id_rank[$key],
                "nama_siswa"        => $_POST['id_siswa'][$key],
                "nilai"             => $_POST['nilai'][$key],
                "keputusan"         => $_POST['keputusan'][$key],
                'tanggal'           => date('Y-m-d H:i:s'),
            );
            echo json_encode($data);
            $this->titian_model->insert_data($data, 'rangking');
        }
        redirect('admin/data_rangking/keputusan');
    }
    public function update()
    {
        $id_rank    = $this->input->post('id_rank');
        $datar = array();
        foreach ($id_rank as $key => $value) {
            $datar[] = array(
                "id_rangking"          => $id_rank[$key],
                // "nama_siswa"        => $_POST['id_siswa'][$key],
                // "nilai"             => $_POST['nilai'][$key],
                "keputusan"         => $_POST['keputusan'][$key],
                // 'tanggal'           => date('Y-m-d H:i:s'),
            );
            // $this->titian_model->insert_data($data, 'rangking');
        }
        $this->db->update_batch('rangking', $datar, 'id_rangking');
        echo json_encode($datar);
        redirect('admin/data_rangking/keputusan');
    }
    public function delete($id)
    {
        $where = array('id_rangking' => $id);
        $this->titian_model->delete_data($where, 'rangking');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Rangking berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_rangking/keputusan');
    }
}
