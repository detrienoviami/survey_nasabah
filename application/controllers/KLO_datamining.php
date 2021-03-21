<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_datamining extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    // $this->load->model('MKLO_Datamining');
		// $this->load->model('M_Datamining');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	= 'Pembuatan Pohon Keputusan (C45)';
		$data['content'] = 'KLO/datamining.php';
		$this->load->view('klo/main_admin',$data);
	}

	public function datamining(){
   $data['datamining'] = $this->MKLO_Datamining->data_dataming()->result();
   $data['atribut'] 	 = $this->MKLO_Datamining->data_atribut()->result();
   $data['join_datamining_atribut'] = $this->anggota_model->data_join2table()->result();
   $this->load->view('klo/datamining',$data);
	}

	public function datatables()
    {
	    $kuisioner_result = $this->MKLO_Datamining->get_datatables();
	    // echo "<pre>";
	    // print_r($hasil);die();
	    $data = array();
	    $no = $_POST['start']+1;

	    foreach ($join_anggota_simpanan as $field) {
	        $row = array();
	        $row[] = $no++;
	        $row[] = $field->id_atribut;
	        $row[] = $field->atribut;
	        $row[] = $field->nilai_atribut;
	        $row[] = $field->jml_jawaban;
	        $row[] = $field->entrophy;
	        $row[] = $field->gain;
	        $data[] = $row;
	    }

	    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->MKLO_Datamining->count_all(),
          "recordsFiltered" => $this->MKLO_Datamining->count_filtered(),
          "data" => $data,
	    );

	    echo json_encode($output);
    }
}
