<?php
class M_profile extends CI_Model{
    //ar $table = 't_user'; //nama tabel dari database
    //var $column_order = array(null, 'id_user', 'nama','username', 'password');
    // var $table = 't_karyawan';
    // var $column_order = array(null, 'id_user', 'nip','nama', 'tgl_lahir', 'email', 'agama', 'alamat', 'no_hp', 'status');

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

    // public function get_db(){
    //   $this->db->select('t_user.*,t_profile.*');
    //   $this->db->from('t_user');
    //   $this->db->join('t_karyawan',
    //                   't_user.id_user = t_karyawan.id_user',
    //                   't_user.nama = t_karyawan.nama','left');
    //
    //   $this->db->join('t_user',
    //                   't_profile.nip = t_user.nip',
    //                   't_user','t_profile.nama = t_user.nama',
    //                   't_user','t_profile.tgl_lahir = t_user.tgl_lahir',
    //                   't_user','t_profile.email = t_user.email',
    //                   't_user','t_profile.agama = t_user.agama',
    //                   't_user','t_profile.alamat = t_user.alamat',
    //                   't_user','t_profile.no_hp = t_user.no_hp',
    //                   't_user','t_profile.status = t_user.status', 'left');
    //   $query = $this->db->get();
    //   return $query->result_array();
    // } //only for belajar join table

    public function get_karyawan()
    {
      $query = $this->db->select('*')
                      ->from('t_user a')
                      ->join('t_karyawan b', 'a.id_user = b.id_user')
                      ->where('a.id_user', $this->session->userdata('id_user'))
                      ->get();
        // echo "<pre>";
        // echo $this->db->last_query();
        //return $query->result();
        return $query->row_array();

    }
}
?>
