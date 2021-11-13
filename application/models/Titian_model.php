<?php

class Titian_model extends CI_model
{
  public function get_data($table)
  {
    return $this->db->get($table);
  }
  function get_where_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }
  public function insert_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function update_data($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
  }

  public function delete_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function get_urutan_kode_terakhir()
  {
    $sql = "SELECT max(id_siswa) as kode_terbesar FROM siswa";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $result = $query->row_array();
      $query->free_result();
      return $result['kode_terbesar'];
    } else {
      return array();
    }
  }

  public function get_urutan_kode_terakhir_kriteria()
  {
    $sql = "SELECT max(id_kriteria) as kode_terbesar FROM kriteria";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $result = $query->row_array();
      $query->free_result();
      return $result['kode_terbesar'];
    } else {
      return array();
    }
  }

  // public function get_all_data_siswa(){
  //     $sql= "SELECT * FROM siswa";
  //     $query = $this->db->query($sql);
  //     if ($query->num_rows() > 0) {
  //     $result = $query->result_array();
  //     $query->free_result();
  //     return $result;
  //     }else{
  //     return array();
  //     }
  // }

  public function ambil_id_siswa($id)
  {
    $hasil = $this->db->where('id_siswa', $id)->get('siswa');
    if ($hasil->num_rows() > 0) {
      return $hasil->result();
    } else {
      return false;
    }
  }

  public function get_siswa()
  {
    $query = $this->db->get('siswa')->result();
  }


  public function get_data_nilai()
  {
    $data = "SELECT 
        a.id_siswa,
        a.nama,
        b.id_kriteria, 
        b.nilai,
        c.nama_kriteria,
        c.atribut,
        c.bobot
        FROM siswa a
        JOIN nilai_alternatif b ON a.id_siswa = b.id_siswa
        JOIN kriteria c ON b.id_kriteria = c.id_kriteria
        ";

    $query = $this->db->query($data);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  // Filter pencarian berdasarkan tanggal
  public function view_by_date($date)
  {
    $this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya

    return $this->db->get('rangking')->result(); // Tampilkan data rangking sesuai tanggal yang diinput oleh user pada filter
  }

  public function view_by_month($month, $year)
  {
    $this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun

    return $this->db->get('rangking')->result(); // Tampilkan data rangking sesuai bulan dan tahun yang diinput oleh user pada filter
  }

  // public function view_by_year($year)
  // {
  //   $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun

  //   return $this->db->get('rangking')->result(); // Tampilkan data rangking sesuai tahun yang diinput oleh user pada filter
  // }
  public function view_by_year($year)
  {
    $this->db->select('*, siswa.nama as nama_siswa');
    $this->db->from('rangking');
    $this->db->join('siswa', 'siswa.id_siswa = rangking.id_siswa');
    $this->db->where('siswa.periode', $year); // Tambahkan where tahun

    return $this->db->get(); // Tampilkan data rangking sesuai tahun yang diinput oleh user pada filter
  }

  public function view_all()
  {
    $this->db->select('*, siswa.nama as nama_siswa');
    $this->db->from('rangking');
    $this->db->join('siswa', 'siswa.id_siswa = rangking.id_siswa');
    return $this->db->get()->result(); // Tampilkan semua data rangking
  }

  public function option_tahun()
  {
    $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tanggal
    $this->db->from('rangking'); // select ke tabel rangking
    $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
    $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tanggal

    return $this->db->get()->result(); // Ambil data pada tabel rangking sesuai kondisi diatas
  }
}
