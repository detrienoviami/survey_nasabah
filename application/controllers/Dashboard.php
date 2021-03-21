<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title']	= 'Dashboard';
		$data['content'] = 'dashboard/index.php';
		$this->load->view('klo/main_admin',$data);

		// $this->load->view('templates/admin/main_admin',$data);
  	// $data['judul'] = "Dashboard";
		// $this->template->load('template','dashboard/index', $data);
	}
}
