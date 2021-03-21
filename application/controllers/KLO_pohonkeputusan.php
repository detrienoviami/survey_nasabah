<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KLO_pohonkeputusan extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('MKLO_Pohonkeputusan');
		$this->load->model('M_Pohonkeputusan');
    $this->load->library('form_validation');
  }

	public function index()
	{
		$data['title']	  = 'Hasil Pohon Keputusan';
		$data['content']  = 'KLO/pohonkeputusan.php';
		$this->load->view('klo/main_admin',$data);
	}




}
