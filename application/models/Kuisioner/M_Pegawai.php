<?php
class M_Pegawai extends CI_Model{
  public function getPegawai()
  {
    return $this->db->get('t_pegawai')->result_array();
  }

  public function get_expopeg()
  {
      return $this->db->get("t_pegawai");
  }
  
  public function getPegawaiByKd($kd)
  {
    return $this->db->get_where('t_pegawai', ['kd_pemasok' => $kd])->result_array();
  }

  public function hapus($kd)
  {
    $this->db->where('kd_pegawai', $kd);
    $this->db->delete('t_pegawai');
  }

  public function ubah()
  {
    $row = $this->db->get_where('t_pegawai', 
    ['kd_pegawai' => $this->input->post('kd_pegawai')])->row_array();

    if ($this->input->post('password1') == "") {
      $pwd = $row['password'];
    }else {
      $pwd = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
    }

    $data = [
      'nama_pegawai' => $this->input->post('nama_pegawai', true),
      'password' => $pwd,
      'level' => $this->input->post('level', true),
    ];

    $this->db->where('kd_pegawai', $this->input->post('kd_pegawai'));
    $this->db->update('t_pegawai', $data);
  }

  public function registrasi()
  {
    $data = [
      'nama_pegawai' => $this->input->post('nama_pegawai', true),
      'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
    ];
    $this->db->insert('t_pegawai', $data);
  }


}

?>
