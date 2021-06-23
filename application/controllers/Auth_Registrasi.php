<?php
class Auth_Registrasi extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Registrasi');
    $this->load->library('form_validation');
  }

  public function index()
	{
		// $data['registrasi'] = $this->M_Registrasi->get_data_register();
		$data['title']	 = 'Register';
		$this->load->view('auth/registrasi',$data);
	}

  public function registrasi() {
    $data['judul'] = 'Registrasi';

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_user.username]',[
      'is_unique' => 'Username Ini Sudah digunakan!!!']);
    // $this->form_validation->set_rules('level', 'Level', 'required');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password Tidak Sesuai!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if( $this->form_validation->run() == FALSE ){
		    $this->load->view('auth/registrasi',$data);
		}else{
			$this->M_Registrasi->registrasi();
      $this->session->set_flashdata('flash','Registrasi Akun Berhasil');
      redirect('auth');
    }
  }
}
?>
