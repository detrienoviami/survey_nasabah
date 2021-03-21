<?php
class MKLO_Total extends CI_Model{
  public function getTotal()
  {
    return $this->db->get('t_total')->result_array();
  }

  public function getKuisionerById($id)
  {
    return $this->db->get_where('t_total', ['id_toal' => $id])->result_array();
  }

  public function get_expopak()
  {
      return $this->db->get("t_total");
  }

  public function tambah()
  {
    $data = [
      // "id_toal" => $this->input->post('id_toal'),
      "toal" => $this->input->post('toal', true),
    ];

    $this->db->insert('t_total', $data);
  }
  }
?>
