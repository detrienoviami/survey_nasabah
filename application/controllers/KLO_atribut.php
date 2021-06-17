<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_atribut extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
		$this->load->model('MKLO_Atribut');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	 = 'Data Atribut';
		$data['content'] = 'KLO/atribut.php';
		$this->load->view('klo/main_admin',$data);
	}

	public function datatables()
    {
	    $atribut = $this->MKLO_Atribut->get_datatables();
	    $data = array();
	    $no = $_POST['start']+1;

	    foreach ($atribut as $field) {
	        $row = array();
	        $row[] = $no++;
	        $row[] = $field->id_atribut;
	        $row[] = $field->atribut;
	        $row[] = $field->nilai_atribut;

	        $row[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)"
	                  title="Edit" onclick="ajax_edit('."'".$field->id_atribut."'".')">
	                  <i class="fa fa-edit"></i>
	           </a>
	           <a class="btn btn-danger btn-sm" href="javascript:void(0)"
	                  title="Hapus" onclick="ajax_delete('."'".$field->id_atribut."'".')">
	                  <i class="fa fa-trash"></i>
	           </a>';
	        $data[] = $row;
	    }

	    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->MKLO_Atribut->count_all(),
        "recordsFiltered" => $this->MKLO_Atribut->count_filtered(),
        "data" => $data,
	    );

	    //output to json format
	    echo json_encode($output);
    }

    public function tambah()
    {
      $data = array(
					'id_atribut' 	  => $this->input->post('id_atribut'),
					'atribut' 			=> $this->input->post('atribut'),
					'nilai_atribut' => $this->input->post('nilai_atribut')
      );

      $insert = $this->MKLO_Atribut->save($data); // simpan data ke model
      echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()
    }

    public function edit($id)
    {
      $data = $this->MKLO_Atribut->edit_by_id($id); // get data dari database melalui model
      echo json_encode($data);
    }

    public function update()
    {
      $data = array(
					'id_atribut' 			=> $this->input->post('id_atribut'),
					'atribut' 		  	=> $this->input->post('atribut'),
					'nilai_atribut' 	=> $this->input->post('nilai_atribut'),
      );

      $id = array('id_atribut' => $this->input->post('id_atribut'));
      $this->MKLO_Atribut->update($id, $data);
      echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
      $data = $this->MKLO_Atribut->edit_by_id($id); // get id dari database melalui model
      $this->MKLO_Atribut->delete_by_id($id);
      echo json_encode(array("status" => TRUE));
    }
}
