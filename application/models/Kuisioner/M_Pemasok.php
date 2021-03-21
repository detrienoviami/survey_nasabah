<?php
class M_Pemasok extends CI_Model{
  
  public function getPemasok()
  {
    return $this->db->get('t_pemasok')->result_array();
  }
  public function get_expopem()
  {
      return $this->db->get("t_pemasok");
  }
  public function getPemasokByKd($kd)
  {
    return $this->db->get_where('t_pemasok', ['kd_pemasok' => $kd])->result_array();
  }


  public function tambah()
  {
    $data = [
      "nama_pemasok" => $this->input->post('nama_pemasok', true),
      "almt_pemasok" => $this->input->post('almt_pemasok', true),
      "tlp_pemasok" => $this->input->post('tlp_pemasok', true),
      "keterangan" => $this->input->post('keterangan', true),
    ];

    $this->db->insert('t_pemasok', $data);
  }

  public function hapusData($kd)
  {
    $this->db->where('kd_pemasok', $kd);
    $this->db->delete('t_pemasok');
  }

  public function ubah()
  {
    $data = [
      "nama_pemasok" => $this->input->post('nama_pemasok', true),
      "almt_pemasok" => $this->input->post('almt_pemasok', true),
      "tlp_pemasok" => $this->input->post('tlp_pemasok', true),
      "keterangan" => $this->input->post('keterangan', true),
    ];

    $this->db->where('kd_pemasok', $this->input->post('kd_pemasok'));
    $this->db->update('t_pemasok', $data);
  }

  public function jmlhPemasok()
  {
    $query = $this->db->get('t_pemasok');
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
