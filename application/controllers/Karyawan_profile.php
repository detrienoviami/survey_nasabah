<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_profile extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
	//	$this->load->model('MKaryawan_profile');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	 = 'Profile Kayawan';
		$data['content'] = 'karyawan/profile.php';
		$this->load->view('klo/main_admin',$data);
	}

    public function edit($id)
    {
      $data = $this->MKLO_Atribut->edit_by_id($id); // get data dari database melalui model
      echo json_encode($data);
    }

		public function profile() {
			$data['judul'] = 'Profile';
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
				$this->M_Auth->registrasi();
				$this->session->set_flashdata('flash','Profile Berhasil di Perbaharui');
				redirect('auth');
			}
		}

		public function destroy()
		{
				$this->session->sess_destroy();
				redirect('auth');
		}
}
