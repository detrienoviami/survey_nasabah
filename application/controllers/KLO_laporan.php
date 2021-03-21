<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_laporan extends CI_Controller {
	public function __construct()
  {
	parent::__construct();
	$this->load->helper(array('form', 'url'));
    // $this->load->model('M_Jamu');
		// $this->load->model('M_Pemasok');
		// $this->load->model('M_Pegawai');

    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['judul'] = "Laporan";
		// $data['laporan'] = $this->M_Jamu->getJamu();
		$this->template->load('laporan/index');
	}

	// public function exportpegawai() {
	//
  //       $orders = $this->M_Pegawai->get_expopeg();
  //       $tanggal = date('d-m-Y');
	//
  //       $pdf = new \TCPDF();
  //       $pdf->AddPage();
  //       $pdf->SetFont('', 'B', 20);
  //       $pdf->Cell(115, 0, "Report list data pegawai - ".$tanggal, 0, 1, 'L');
  //       $pdf->SetAutoPageBreak(true, 0);
	//
  //       // Add Header
  //       $pdf->Ln(10);
  //       $pdf->SetFont('', 'B', 12);
  //       $pdf->Cell(10, 8, "No", 1, 0, 'C');
  //       $pdf->Cell(55, 8, "nama pegawai", 1, 0, 'C');
  //       $pdf->Cell(35, 8, "level", 1, 0, 'C');
  //       $pdf->Cell(50, 8, "status", 1, 1, 'C');
  //       $pdf->SetFont('', '', 12);
  //       foreach($orders->result_array() as $k => $order) {
  //           $this->addRow($pdf, $k+1, $order);
  //       }
  //       $tanggal = date('d-m-Y');
  //       $pdf->Output('Laporan Order - '.$tanggal.'.pdf');
  //   }
  //   private function addRow($pdf, $no, $order) {
  //       $pdf->Cell(10, 8, $no, 1, 0, 'C');
  //       $pdf->Cell(55, 8, $order['nama_pegawai'], 1, 0, '');
  //       $pdf->Cell(35, 8, $order['level'], 1, 0, 'C');
  //       $pdf->Cell(50, 8,$order['status'], 1, 1, 'L');
	// }
}
