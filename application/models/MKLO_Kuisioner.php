<?php
class MKLO_Kuisioner extends CI_Model{
  public function getKuisioner()
  {
    return $this->db->get('t_kuisioner')->result_array();
  }

  public function getKuisionerById($id)
  {
    return $this->db->get_where('t_kuisioner', ['id_kuisioner' => $id])->result_array();
  }

  public function get_expopak()
  {
      return $this->db->get("t_kuisioner");
  }

  public function tambah()
  {
    $data = [
      // "id_kuisioner" => $this->input->post('id_kuisioner'),
      "kuisioner" => $this->input->post('kuisioner', true),
    ];

    $this->db->insert('t_kuisioner', $data);
  }
  }
?>
