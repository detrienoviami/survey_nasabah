<?php
class M_Jamu extends CI_Model{
  public function getJamu()
  {
    return $this->db->get('t_jamu')->result_array();
  }

  public function getJamuByKd($kd)
  {
    return $this->db->get_where('t_jamu', ['kd_jamu' => $kd])->result_array();
  }
  public function get_expopak()
  {
      return $this->db->get("t_jamu");
  }

  public function tambah()
  {
    $data = [
      "kd_jamu" => $this->input->post('kd_jamu'),
      "nama_jamu" => $this->input->post('nama_jamu', true),
      "harga" => $this->input->post('harga', true),
      "stok" =>$this->input->post('stok', true),
    ];

    $this->db->insert('t_jamu', $data);
  }

  public function hapusData($kd)
  {
    $this->db->where('kd_jamu', $kd);
    $this->db->delete('t_jamu');
  }

  public function ubah()
  {
    $data = [
      "nama_jamu" => $this->input->post('nama_jamu', true),
      "harga" => $this->input->post('harga', true),
      "stok" => $this->input->post('stok', true),
    ];
    $this->db->where('kd_jamu', $this->input->post('kd_jamu'));
    $this->db->update('t_jamu', $data);
  }

  public function update_stok_keluar()
  {
    $jumlah = $this->input->post('jumlah');
    $kd_jamu = $this->input->post('kd_jamu');
    $query = "UPDATE t_jamu SET stok = stok - '$jumlah' WHERE kd_jamu = '$kd_jamu'";
    $this->db->query($query);
  }

  public function update_stok_masuk()
  {
    $jumlah = $this->input->post('jumlah');
    $kd_jamu = $this->input->post('kd_jamu');
    $query = "UPDATE t_jamu SET stok = stok + '$jumlah' WHERE kd_jamu = '$kd_jamu'";
    $this->db->query($query);
  }

  public function jmlhjamu()
  {
    $query = $this->db->get('t_jamu');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }


}

?>
