<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_total extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    //$this->load->model('MKLO_total');
		$this->load->model('M_Total');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	  = 'Kelompok Nilai';
		$data['content']  = 'KLO/total.php';
		$this->load->view('klo/main_admin',$data);
	}

	public function datatables()
    {
	    $total = $this->M_Total->get_datatables();
	    $data = array();
	    $no = $_POST['start']+1;

	    foreach ($total as $field) {
	        $row = array();
	        $row[] = $no++;
	        $row[] = $field->id_kuisioner;
	        $row[] = $field->stp;
					$row[] = $field->tp;
					$row[] = $field->cp;
					$row[] = $field->p;
					$row[] = $field->sp;
					$row[] = $field->entrophy;
					$row[] = $field->gain;
					$row[] = $field->jawaban;
					//$row[] = $field->total;

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
        "recordsTotal" => $this->M_Total->count_all(),
        "recordsFiltered" => $this->M_Total->count_filtered(),
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
      $insert = $this->M_Total->save($data); // simpan data ke model
      echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()
    }

    public function edit($id)
    {
        $data = $this->M_Total->edit_by_id($id); // get data dari database melalui model
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'kuisioner' => $this->input->post('kuisioner'),
        );

        $id = array('id_total' => $this->input->post('id_total'));
        $this->M_Total->update($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
        $data = $this->M_Total->edit_by_id($id); // get id dari database melalui model
        $this->M_Total->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}
