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

  public function view_by_year($year)
  {
    $this->db->select('*, siswa.nama as nama_siswa');
    $this->db->from('keputusan');
    $this->db->join('siswa', 'siswa.id_siswa = keputusan.id_siswa');
    $this->db->where('siswa.id_periode', $year); // Tambahkan where tahun

    return $this->db->get(); // Tampilkan data keputusan sesuai tahun yang diinput oleh user pada filter
  }

  public function option_tahun()
  {
    $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tanggal
    $this->db->from('keputusan'); // select ke tabel keputusan
    $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
    $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tanggal

    return $this->db->get()->result(); // Ambil data pada tabel keputusan sesuai kondisi diatas
  }

  function joinNilaiAlternatif()
  {
    $this->db->select('nilai_alternatif.id_siswa, nama, tahun');
    $this->db->from('nilai_alternatif');
    $this->db->join('siswa', 'siswa.id_siswa = nilai_alternatif.id_siswa');
    $this->db->join('periode', 'periode.id_periode = siswa.id_periode');
    $this->db->group_by('nilai_alternatif.id_siswa');
    $this->db->order_by('id_siswa');
    return $this->db->get()->result();
  }  
  function joinNilaiAlternatifWhere($where)
  {
    $this->db->select('nilai_alternatif.id_siswa, nama, asal_sekolah, tahun');
    $this->db->from('nilai_alternatif');
    $this->db->join('siswa', 'siswa.id_siswa = nilai_alternatif.id_siswa');
    $this->db->join('periode', 'periode.id_periode = siswa.id_periode');
    $this->db->group_by('nilai_alternatif.id_siswa');
    $this->db->where($where);
    $this->db->order_by('id_siswa');
    return $this->db->get()->result();
  }  
}
