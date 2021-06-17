<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_kuisioner extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('MKLO_Kuisioner');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	  = 'Kuisioner';
		$data['content']  = 'KLO/kuisioner.php';
		$this->load->view('klo/main_admin',$data);
		// $this->load->view('templates/admin/main_admin',$data);
    // $data['judul'] = "Kuisioner";
		// $data['kuisioner'] = $this->MKLO_Kuisioner->getKuisioner();
		// $this->template->load('template','KLO/kuisioner', $data);
	}

	public function datatables()
    {
	    $kuisioner = $this->MKLO_Kuisioner->get_datatables();
	    // echo "<pre>";
	    // print_r($kuisioner);die();
	    $data = array();
	    $no = $_POST['start']+1;

	    foreach ($kuisioner as $field) {
	        $row = array();
	        $row[] = $no++;
	        $row[] = $field->id_kuisioner;
	        $row[] = $field->kuisioner;

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
        "recordsTotal" => $this->MKLO_Kuisioner->count_all(),
        "recordsFiltered" => $this->MKLO_Kuisioner->count_filtered(),
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
      $insert = $this->MKLO_Kuisioner->save($data); // simpan data ke model
      echo json_encode(array('status' => TRUE)); // akan muncul notif ini di kirim ke view, function ajax_save()
    }

    public function edit($id)
    {
        $data = $this->MKLO_Kuisioner->edit_by_id($id); // get data dari database melalui model
        echo json_encode($data);
    }

    public function update()
    {

        $data = array(
            'kuisioner' => $this->input->post('kuisioner'),
        );
        $id = array('id_kuisioner' => $this->input->post('id_kuisioner'));
        $this->MKLO_Kuisioner->update($id, $data);

        echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
        $data = $this->MKLO_Kuisioner->edit_by_id($id); // get id dari database melalui model
        $this->MKLO_Kuisioner->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


	// public function tambah()
	// {
	//     $data['judul'] = "Kuisioner";
	// 		$data['kuisioner'] = $this->MKLO_Kuisioner->getKuisioner();

	// 		$this->form_validation->set_rules('kuisioner', 'Kuisioner','required');
	// 		// $this->form_validation->set_rules('kd_pemasok', 'kd_pemasok', 'required');

	// 		if( $this->form_validation->run() == FALSE ){
	//  		 $this->template->load('template','kuisioner/tambah', $data);
	//  	 }else{
	// 		 $this->MKLO_Kuisioner->tambah();
	//  		 $this->session->set_flashdata('flash','Kuisioner Berhasil Ditambah');
	//  		 redirect('KLO_kuisioner');
	//  	 }
	// }

// 	public function ubah($kd)
// 	{
//     $data['judul'] = "Kuisioner";
// 		$data['jamu'] = $this->db->get_where('t_jamu', ['kd_jamu' => $kd])->row_array();
// 		$data['pemasok'] = $this->M_Pemasok->getPemasok();
//
// 		$this->form_validation->set_rules('nama_jamu', 'Nama Kuisioner', 'required');
// 		$this->form_validation->set_rules('harga', 'Harga', 'required');
// 		$this->form_validation->set_rules('stok', 'Stok');
//
// 		if( $this->form_validation->run() == FALSE ){
//  		 $this->template->load('template','jamu/ubah', $data);
//  	 }else{
// 		 $this->M_Jamu->ubah();
//  		 $this->session->set_flashdata('flash','Data jamu Berhasil Diubah');
//  		 redirect('jamu');
//  	 }
// 	}

// 	public function hapus($kd)
//   {
//     $this->db->where('kd_jamu', $kd);
//     $this->db->delete('t_jamu');
// 		redirect('jamu');
//   }
//   public function exportjamu() {
//
// 	$jamu = $this->M_Jamu->get_vPembelian();
// 	$tanggal = date('d-m-Y');
//
// 	$pdf = new \TCPDF();
// 	$pdf->AddPage();
// 	$pdf->SetFont('', 'B', 20);
// 	$pdf->Cell(115, 0, "Report list data jamu - ".$tanggal, 0, 1, 'L');
// 	$pdf->SetAutoPageBreak(true, 0);
//
// 	// Add Header
// 	$pdf->Ln(10);
// 	$pdf->SetFont('', 'B', 12);
// 	$pdf->Cell(10, 8, "No", 1, 0, 'C');
// 	$pdf->Cell(55, 8, "nama jamu", 1, 0, 'C');
// 	$pdf->Cell(35, 8, "harga", 1, 0, 'C');
// 	$pdf->Cell(50, 8, "stok", 1, 1, 'C');
// 	$pdf->SetFont('', '', 12);
// 	foreach($jamu->result_array() as $k => $order) {
// 		$this->addRowP($pdf, $k+1, $order);
// 	}
// 	$tanggal = date('d-m-Y');
// 	$pdf->Output('Laporan Order - '.$tanggal.'.pdf');
// }
}
