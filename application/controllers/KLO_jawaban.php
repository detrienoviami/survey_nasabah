<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_jawaban extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('MKLO_Jawaban');
		$this->load->model('MKLO_Kuisioner');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	 	= 'Hasil Survey Nasabah';
		$data['content'] 	= 'KLO/jawaban.php';
		$this->load->view('klo/main_admin',$data);
		// $this->load->view('template',$data);
		// $this->load->view('templates/admin/main_admin',$data);

    // $data['judul'] = "Kuisioner Result";
		// $data['kuisioner'] = $this->MKLO_Jawaban->getKuisioner();
		// $this->template->load('template','KLO/jawaban', $data);
	}

	public function datatables()
    {
	    $kuisioner_result = $this->MKLO_Jawaban->get_datatables();
	    // echo "<pre>";
	    // print_r($hasil);die();
	    $data = array();
	    $no = $_POST['start']+1;

	    foreach ($kuisioner_result as $field) {

	        $row = array();
	        $row[] = $no++;
	        // $row[] = $field->id_kuisioner_result;
	        // $row[] = $field->kode_survey;
	        $row[] = $field->no_kuisioner;
	        $row[] = $field->nama;
	        $row[] = $field->jk;
	        $row[] = $field->nohp;
	        $row[] = $field->jawaban;
					$row[] = $field->nama_karyawan;
					$row[] = $field->tgl_jawaban;

	        $data[] = $row;
	    }

	    $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->MKLO_Jawaban->count_all(),
          "recordsFiltered" => $this->MKLO_Jawaban->count_filtered(),
          "data" => $data,
	    );

	    //output to json format
	    echo json_encode($output);
    }

    // public function tambah()
    // {
    //
    //     $data = array(
    //         'kuisioner' => $this->input->post('kuisioner')
    //     );
    //
    //     $insert = $this->M_Kuisioner->save($data); // simpan data ke model
    //
    //     echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()
    //
    // }


    // public function destroy($id)
    // {
    //     $data = $this->M_Kuisioner->edit_by_id($id); // get id dari database melalui model
    //
    //     $this->M_Kuisioner->delete_by_id($id);
    //
    //     echo json_encode(array("status" => TRUE));
    // }

}
