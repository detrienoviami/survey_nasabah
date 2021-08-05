<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_total extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    // $this->load->model('MKLO_total');
		$this->load->model('MNasabah_Kuisioner_Result');
		$this->load->model('MKLO_Total');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	  = 'Algoritma C45';
		$data['content']  = 'KLO/total.php';
		$data['total'] 		= $this->MKLO_Total->get_db();
	  $data['entrophy'] = $this->MKLO_Total->hitung_entropy();
		$data['gain'] = $this->MKLO_Total->hitungNilai();

		//hitung atribut waktu
		$data['kesimpulan'] = $this->MKLO_Total->simpulan();
		

		$data['waktu'] = $this->MKLO_Total->get_db_waktu();
		$data['waktu_layanan'] = $this->MKLO_Total->get_layananwaktu();
		$data['entrophy_waktu'] = $this->MKLO_Total->hitung_entropy_waktu();

		//hitung atribut akurat
		$data['akurat'] = $this->MKLO_Total->get_db_akurat();
		$data['akurat_layanan'] = $this->MKLO_Total->get_layananakurat();
		$data['entrophy_akurat'] = $this->MKLO_Total->hitung_entropy_akurat();

		//hitung atribut fokus
		$data['fokus'] = $this->MKLO_Total->get_db_fokus();
		$data['fokus_layanan'] = $this->MKLO_Total->get_layananfokus();
		$data['entrophy_fokus'] = $this->MKLO_Total->hitung_entropy_fokus();

	 //hitung atribut kepuasan
	 $data['kepuasan'] = $this->MKLO_Total->get_db_kepuasan();
	 $data['kepuasan_layanan'] = $this->MKLO_Total->get_layanankepuasan();
	 $data['entrophy_kepuasan'] = $this->MKLO_Total->hitung_entropy_kepuasan();

		$data['jawaban'] 	= $this->MKLO_Total->count();
		$data['all_puas'] = $this->MKLO_Total->countWaktupuas();
		$data['all_tidak_puas'] = $this->MKLO_Total->countWaktutidakpuas();
		$data['entrophi'] 	= $this->MKLO_Total->entrophi();
		//$data['gain'] 	= $this->MKLO_Total->gain();

		$this->load->view('klo/main_admin',$data);
	}

	public function datatables()
    {
	    $total 	= $this->MKLO_Total->get_datatables();
	    $data		= array();
	    $no   	= $_POST['start']+1;

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
        "recordsTotal" => $this->MKLO_Total->count_all(),
        "recordsFiltered" => $this->MKLO_Total->count_filtered(),
        "data" => $data,
	    );
	    //output to json format
	    echo json_encode($output);
    }

    public function tambah()
    {
			$data = [
        "id_kuisioner" => $this->input->post('id_kuisioner', true),
        "stp" => $this->input->post('stp', true),
        "tp" => $this->input->post('tp', true),
        "cp" => $this->input->post('cp', true),
        "p" => $this->input->post('p', true),
        "sp" => $this->input->post('sp', true),
        "entrophy" => $this->input->post('entrophy', true),
        "gain" => $this->input->post('gain', true),
      ];
      return $insert = $this->MKLO_Total->save($data); // simpan data ke model
      echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()
    }

    public function edit($id)
    {
        $data = $this->MKLO_Total->edit_by_id($id); // get data dari database melalui model
        echo json_encode($data);
    }

    public function update()
    {
			$data = [
				"id_kuisioner" => $this->input->post('id_kuisioner', true),
				"stp" 				 => $this->input->post('stp', true),
				"tp"					 => $this->input->post('tp', true),
				"cp" 					 => $this->input->post('cp', true),
				"p" 					 => $this->input->post('p', true),
				"sp"					 => $this->input->post('sp', true),
				"entrophy"		 => $this->input->post('entrophy', true),
				"gain"				 => $this->input->post('gain', true),
			];

        $id = array('id_kuisioner' => $this->input->post('id_kuisioner'));
        $this->MKLO_Total->update($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
        $data = $this->MKLO_Total->edit_by_id($id); // get id dari database melalui model
        $this->MKLO_Total->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}
