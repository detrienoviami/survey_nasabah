<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_profile extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('M_profile');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['profile'] = $this->M_profile->get_karyawan();
		// var_dump($data['profile']);
		// echo "<pre>";
		// print(empty($data['profile']));die;
		// echo "<pre>";										//codingan ajaib buat cek data
		// print_r($data['profile']);die;	//codingan ajaib buat cek data
		$data['title']	 = 'Profile Kayawan';
		$data['content'] = 'karyawan/profile.php';
		$this->load->view('klo/main_admin',$data);
	}

    public function edit_profile()
    {
      	$data = array(
						'nama' 				=> $this->input->post('nama'),
						'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
						'email' 			=> $this->input->post('email'),
						'agama' 			=> $this->input->post('agama'),
						'alamat' 			=> $this->input->post('alamat'),
						'no_hp' 			=> $this->input->post('no_hp'),
				);
				$update = $this->db->where('nip', $this->input->post('nip'))
													 ->update('t_karyawan', $data);

				// berhasil
				if ($update) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
															<i class="icon fas fa-exclamation-triangle"></i>
															Selamat!!! Data Profile Berhasil di Perbaharui
															</div>');

						redirect('karyawan_profile');
				}else{
					// gagal
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
	                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                              <i class="icon fas fa-exclamation-triangle"></i>
																Gagal!!! Data Gagal di Perbaharui
	                            </div>');
					redirect('karyawan_profile');
				}
    }

		public function edit_password()
		{
				if ($this->input->post('password1') != $this->input->post('password2')) {
					$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
															<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
															<i class="icon fas fa-exclamation-triangle"></i>
															Peringatan !!! Password dan konfirmasi password tidak sesuai
															</div>');
				}else{
						// panjang karakter kurang dari 6
						if (strlen($this->input->post('password1')) < 6) {
							$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
																	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																	<i class="icon fas fa-exclamation-triangle"></i>
																	Peringatan !!! Password minimal 6 karakter
																	</div>');


						}else{
							// karakter lebih dari 6
							$data = array(
									'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),

							);

							$update = $this->db->where('username', $this->input->post('username'))
																 ->update('t_user', $data);

							// berhasil
							if ($update) {
								$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
																		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																		<i class="icon fas fa-exclamation-triangle"></i>
																		Selamat!!! Password Berhasil di Perbaharui
																		</div>');


							}else{
								// gagal
								$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
																			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																			<i class="icon fas fa-exclamation-triangle"></i>
																			Gagal!!! Password Tidak Dapat di Perbaharui
																		</div>');

							}
						}
				}

				redirect('karyawan_profile');
		}

		// public function profile() {
		// 	$data['judul'] = 'Profile';
		// 	$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		// 	$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_user.username]',[
		// 		'is_unique' => 'Username Ini Sudah digunakan!!!']);
		// 	// $this->form_validation->set_rules('level', 'Level', 'required');
		// 	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
		// 		'matches' => 'Password Tidak Sesuai!',
		// 		'min_length' => 'Password Terlalu Pendek!'
		// 	]);
		// 	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		//
		// 	if( $this->form_validation->run() == FALSE ){
		// 		$this->load->view('auth/registrasi',$data);
		// 	}else{
		// 		$this->M_Auth->registrasi();
		// 		$this->session->set_flashdata('flash','Profile Berhasil di Perbaharui');
		// 		redirect('auth');
		// 	}
		// }

		public function destroy()
		{
				$this->session->sess_destroy();
				redirect('auth');
		}
}
