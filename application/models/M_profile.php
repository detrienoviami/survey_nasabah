<?php
class MKaryawan_profile extends CI_Model{
    var $table = 't_user'; //nama tabel dari database
    var $column_order = array(null, 'id_user', 'nama','username', 'password'); //field yang ada di table atribut
    // var $order = array('id_user' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save($data)
    {
        $this->db->insert('t_user', $data);
        return $this->db->insert_id();
    }

    public function get_db(){

    }
}
