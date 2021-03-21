<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_karyawan extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('MKLO_Karyawan');
		$this->load->model('M_karyawan');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	  = 'Data Karyawan';
		$data['content']  = 'KLO/karyawan.php';
		$this->load->view('klo/main_admin',$data);
	}

	public function datatables()
    {
	    $kuisioner = $this->M_Karyawan->get_datatables();
	    $data = array();
	    $no = $_POST['start']+1;

	    foreach ($kuisioner as $field) {
	        $row = array();
	        $row[] = $no++;
	        $row[] = $field->id_user;
	        $row[] = $field->nip;
					$row[] = $field->nama;
					$row[] = $field->tgl_lahir;
					$row[] = $field->email;
					$row[] = $field->agama;
					$row[] = $field->alamat;
					$row[] = $field->no_hp;
					$row[] = $field->level;
					$row[] = $field->status;
	        $row[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)"
	                  title="Edit" onclick="ajax_edit('."'".$field->id_kuisioner."'".')">
	                  <i class="fa fa-edit"></i>
	           </a>
	           <a class="btn btn-danger btn-sm" href="javascript:void(0)"
	                  title="Hapus" onclick="ajax_delete('."'".$field->id_kuisioner."'".')">
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

      $data = array(
          'kuisioner' => $this->input->post('kuisioner')
      );

      $insert = $this->M_Karyawan->save($data); // simpan data ke model

      echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()

    }

    public function edit($id)
    {
        $data = $this->M_Karyawan->edit_by_id($id); // get data dari database melalui model

        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'kuisioner' => $this->input->post('kuisioner'),
        );

        $id = array('id_kuisioner' => $this->input->post('id_kuisioner'));
        $this->M_Karyawan->update($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
        $data = $this->M_Karyawan->edit_by_id($id); // get id dari database melalui model
        $this->M_Karyawan->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
