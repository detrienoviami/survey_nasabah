<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
		{
			parent::__construct();
			$this->load->model('MNasabah_Kuisioner_Result');
		 $this->load->model('M_Kuisioner');
			$this->load->library('form_validation');
		}
		
	public function index()
	{
		$data['kuisioner'] = $this->db->get('t_kuisioner')->result();
		 $data['kode'] = $this->MNasabah_Kuisioner_Result->get_no_kuisioner();

		$this->load->view('kuisioner/index',$data);
	}
}
