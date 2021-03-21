<?php
class M_Auth extends CI_Model{
  public function get_close()
  {
      $username = $this->session->userdata('username');
      if (empty($username))
      {
        $this->session->sess_destroy();
        redirect('auth');
      }
  }

  public function registrasi()
{
  $data = [
    'nama' => $this->input->post('nama', true),
    'username' => $this->input->post('username', true),
    'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
  ];
  $this->db->insert('t_user', $data);
}

}

?>
