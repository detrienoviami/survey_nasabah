<?php

class Auth extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Auth');
    $this->load->model('M_Registrasi');
    // $this->load->model('M_User');
    $this->load->library('form_validation');
  }

  public function index() {
    $data['judul'] = 'Login';

    $this->form_validation->set_rules('username', 'username','required');
    $this->form_validation->set_rules('password', 'Password','required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('auth/login',$data);
    }else {
      $this->_login();
    }
  }

  private function _login()
	{
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $user = $this->db->get_where('t_user', ['username' => $username])->row_array();

		// jika user ada
		if($user){
			// jika user aktif
			if($user['status'] == 'aktif'){
				// cek password
          if(password_verify($password, $user['password'])){
            $data = [
                'id_user'   => $user['id_user'],
                'username'  => $user['username'],
                'nama'      => $user['nama'],
                // 'level'     => $user['level']
            ];
            $this->session->set_userdata($data);
            if($user['level'] == 'KLO')
            {
              redirect('dashboard');
            }else{
              redirect('dashboard');
            }

            // $this->session->set_userdata($data);
            // if($user['level'] == 'Teller')
            // {
            //   redirect('karyawan/karywan');
            // }else{
            //   redirect('auth');
            // }

        }else{
  					$this->session->set_flashdata('message','Password Salah');
  					redirect('auth');
  			}
			}else{
				$this->session->set_flashdata('message','Nama Pegawai Tidak Aktif');
				redirect('auth');
			}

		}else{
			$this->session->set_flashdata('message','Nama Pegawai Tidak Terdaftar');
			redirect('auth');
		}
	}

  // public function registrasi() {
  //   $data['judul'] = 'Registrasi';
  //
  //   $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
  //   $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_user.username]',[
  //     'is_unique' => 'Username Ini Sudah digunakan!!!']);
  //   // $this->form_validation->set_rules('level', 'Level', 'required');
  //   $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
	// 		'matches' => 'Password Tidak Sesuai!',
	// 		'min_length' => 'Password Terlalu Pendek!'
	// 	]);
	// 	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
  //
	// 	if( $this->form_validation->run() == FALSE ){
	// 		$this->load->view('auth/registrasi',$data);
	// 	}else{
	// 		$this->M_Auth->registrasi();
  //     $this->session->set_flashdata('flash','Registrasi Akun Berhasil');
  //     redirect('auth');
  //   }
  // }

    public function destroy()
  {
      $this->session->sess_destroy();

      redirect('auth');
  }

  public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('message','
		<div class="alert alert-success alert-dismissible fade show" role="alert">Anda Telah Logout
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		');
		redirect('auth');

	}
}

?>
