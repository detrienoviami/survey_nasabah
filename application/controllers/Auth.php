<?php

class Auth extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_Auth');
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
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'nama' => $user['nama'],
                'level' => $user['level']
            ];
            $this->session->set_userdata($data);
            if($user['level'] == 'KLO')
            {
              redirect('dashboard');
            }else{
              redirect('dashboard');
            }

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

  public function registrasi() {
    $data['judul'] = 'Registrasi';

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_user.username]',[
      'is_unique' => 'Username Ini Sudah digunakan!!!']);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password Tidak Sesuai!',
			'min_length' => 'Password Terlalu Pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if( $this->form_validation->run() == FALSE ){
			$this->load->view('auth/registrasi',$data);
		}else{
			$this->M_Auth->registrasi();
      $this->session->set_flashdata('flash','Registrasi Akun Berhasil');
      redirect('auth');
    }
  }

  // public function registrasi() {
  //   $data['judul'] = 'Registrasi';
  //
  //   $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
  //   $this->form_validation->set_rules('username', 'Username', 'required|trim|valid_username|is_unique[t_user.username]',[
	// 		'is_unique' => 'Nama Pegawai Ini Sudah digunakan!!!']);
  //   $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confirmpassword]',[
	// 		'matches' => 'Password Tidak Sesuai!',
	// 		'min_length' => 'Password Terlalu Pendek!'
	// 	]);
	// 	$this->form_validation->set_rules('confirmpassword', 'Password', 'required|trim|matches[password]');
  //
	// 	if( $this->form_validation->run() == FALSE ){
  //     $data['title'] = 'Registrasi';
	// 		$this->load->view('auth/registrasi',$data);
	// 	}else{
	// 		// $this->M_Auth->registrasi();
  //     // $this->session->set_flashdata('flash','Registrasi Akun Berhasil');
  //     // redirect('auth');
  //     $data = [
  //     'nama'=> htmlspecialchars($this->input->post('nama', true)),
  //     'username'=> htmlspecialchars($this->input->post('username', true)),
  //     'password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
  //   ];
  //
  //     $this->db->insert('t_user',$data);
  //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email Anda</div>');
  //
  //     redirect('auth');
  //   }
  // }
  //
  // public function register_proses($username){
  //   $data['user'] = $this->db->get_where('t_user', ['sha1(md5(email))' => $username])->row();
  //   $id_user = $data['user']->user_id;
  //
  //   if ($data['user']->level == 'pimpinan' && $data['user']->status == 'tidak aktif') {
  //
  //   $data = array(
  //     'status' => 'tidak aktif',
  //   );
  //
  //
	// 	$update = $this->db->update('t_user', $data, ['user_id' => $id_user, 'status' => 'tidak aktif']);
  //   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda sudah di aktivasi, silahkan login</div>');
  //   redirect('Auth');
  //   }else{
  //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aktivitas tidak dikenal</div>');
  //     redirect('Auth');
  //   }
  //
  //   // $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
  //   // $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[user.email]');
  //   // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');
  //   //
  //   // if ($this->form_validation->run() == TRUE ) {
  //   //
  //   //      if($this->m_user->m_register()){
  //   //
  //   //          $this->session->set_flashdata('pesan', 'Register berhasil, silahkan  Sign In.');
  //   //          redirect('/','refresh');
  //   //
  //   //      }else{
  //   //
  //   //          $this->session->set_flashdata('pesan', 'Register user gagal!');
  //   //          redirect('/','refresh');
  //   //
  //   //      }
  //   //
  //   // } else {
  //   //
  //   //   $this->template->load('role','user/form_register');
  //   // }
  // }
  //
  // public function destroy()
	// {
	// 	$this->session->sess_destroy();
  //
  //       redirect('auth');
	// }
  //
	// public function forgot_pass()
	// {
	// 	$data ['title'] = 'Form Login';
  //
  //       $this->load->view('auth/forgot_password');
  //
	// }
  //
  // public function action_set_password()
	// {
	// 	$email = $this->input->post('email');
	// 	$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
  //
	// 	$cek = $this->db->get_where('t_user', ['email' => $email])->row();
  //
  //
	// 	if ($cek == true) {
  //
	// 		$data = array('password' => $password);
  //
	// 		if ($data) {
	// 			$this->db->where('user_id', $cek->user_id);
	// 			$this->db->update('t_user', $data);
  //
	// 			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Dirubah</div>');
	// 	            redirect('Auth');
	// 		}else{
	// 			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Gagal Dirubah</div>');
	// 	            redirect('Auth');
	// 		}
	// 	}else{
	// 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email Anda Tidak Terdaftar</div>');
	// 	            redirect('Auth');
	// 	}
  //
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
