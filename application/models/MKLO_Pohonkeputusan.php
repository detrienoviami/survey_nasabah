<?php
class MKLO_Pohonkeputusan extends CI_Model{
  public function getPohonkeputusan()
  {
    return $this->db->get('')->result_array();
  }


  }
?>
