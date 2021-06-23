<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_karyawan extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('M_Karyawan');
		//$this->load->model('MKLO_Karyawan');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	 = 'Data Karyawan';
		$data['content'] = 'KLO/karyawan.php';

		$this->load->view('klo/main_admin',$data);
	}

	public function datatables()
    {
	    $karyawan = $this->M_Karyawan->get_datatables();
			// echo "<pre>";
			// print_r($karyawan);die;
	    $data 		= array();
	    $no 			= $_POST['start']+1;

	    foreach ($karyawan as $field){
				 $row = array();
				 $row[] = $no++;
				 // $row[] = $field->id_user; //relasi t_user
				 $row[] = $field->nip;
				 $row[] = $field->nama;
				 $row[] = $field->tgl_lahir;
				 $row[] = $field->email;
				 $row[] = $field->agama;
				 $row[] = $field->alamat;
				 $row[] = $field->no_hp;
				 $row[] = $field->level; //relasi t_user
				 $row[] = $field->status;

				 $row[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)"
				 					 title="Edit" onclick="ajax_edit('."'".$field->id_user."'".')">
				 					 <i class="fa fa-edit"></i>
								 	 </a>

								 	 <a class="btn btn-danger btn-sm" href="javascript:void(0)"
								 					title="Hapus" onclick="ajax_delete('."'".$field->id_user."'".')">
								 					<i class="fa fa-trash"></i>
								 	 </a>';
				 $data[] = $row;
	    }

	    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->M_Karyawan->count_all(),
        "recordsFiltered" => $this->M_Karyawan->count_filtered(),
        "data" => $data,
	    );
	    //output to json format
	    echo json_encode($output);
    }

    public function tambah()
    {
			$data1 = array(
					'nama' 				=> $this->input->post('nama'),
					'username' 		=> $this->input->post('nama'),
					'level' 			=> $this->input->post('level'),
					'status' 			=> $this->input->post('status'),
					'password'		=> password_hash('12345678',PASSWORD_DEFAULT)
			);

			$this->db->insert('t_user',$data1);
			$insert1 = $this->db->insert_id();

			if ($insert1) {

				$c_t = microtime(true);
        $c_micro = sprintf("%06d",($c_t - floor($c_t)) * 1000000);
        $c_datetime = new DateTime( date('Y-m-d H:i:s.'.$c_micro, $c_t) );
        $nip = "KRY".$c_datetime->format("YmdHisu");

				$data = array(
						'id_user' 	  => $insert1,
						'nip' 				=> $nip,
						'nama' 				=> $this->input->post('nama'),
						'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
						'email' 			=> $this->input->post('email'),
						'agama' 			=> $this->input->post('agama'),
						'alamat' 			=> $this->input->post('alamat'),
						'no_hp' 			=> $this->input->post('no_hp'),
						'status'			=> $this->input->post('status')
	      );

	      $insert = $this->M_Karyawan->save($data); // simpan data ke model
	      echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()
			}else{
				echo json_encode(array('status' => 'Gagal Insert User')); // akan muncul notif ini di kirim ke view, function ajax_save()
			}

    }

    public function edit($id)
    {
			$this->db->select('b.id_user,b.nip,b.nama,b.tgl_lahir,b.email,b.agama,b.alamat,b.no_hp,a.level,a.status');
			$this->db->from('t_user a');
			$this->db->join('t_karyawan b','a.id_user = b.id_user');
      $this->db->where('b.id_user',$id);
			$data = $this->db->get()->row();
			// echo "<pre>";
			// print_r($data);die;
			echo json_encode($data);
    }

    public function update()
    {
			$data1 = array(
					'nama' 				=> $this->input->post('nama'),
					'level' 			=> $this->input->post('level'),
					'status' 			=> $this->input->post('status'),
			);

			$id = array('id_user' => $this->input->post('id_user'));

			$update_user = $this->db->where($id)
															->update('t_user',$data1);

			if ($update_user) {
				$data = array(

						'nama' 				=> $this->input->post('nama'),
						'tgl_lahir' 	=> $this->input->post('tgl_lahir'),
						'email' 			=> $this->input->post('email'),
						'agama' 			=> $this->input->post('agama'),
						'alamat' 			=> $this->input->post('alamat'),
						'no_hp' 			=> $this->input->post('no_hp'),
						'status'			=> $this->input->post('status')
				);

	      // $id = array('id_user' => $this->input->post('id_user'));
	      $this->M_Karyawan->update($id, $data);
	      echo json_encode(array("status" => TRUE));
			}else{
				echo json_encode(array("status" => 'Gagal Update user'));
			}

    }

    public function destroy($id)
    {
			$delete = $this->db->where('id_user', $id)
												 ->delete('t_karyawan');
			echo json_encode(array("status" => TRUE));
    }

}
