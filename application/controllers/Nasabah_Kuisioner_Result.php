<!-- Nasabah_kuisioner_result -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah_Kuisioner_Result extends CI_Controller {
	public function __construct()
  {
    parent::__construct();
    $this->load->model('MNasabah_Kuisioner_Result');
		$this->load->model('M_Kuisioner');
    $this->load->library('form_validation');
  }

	public function index()
	{
    $data['judul'] 			= "Kuisioner Result";
    $data['kuisioner']  = $this->db->get('t_kuisioner')->result();
    $data['kode'] 			= $this->MNasabah_Kuisioner_Result->get_no_kuisioner();
		$data['nama_karyawan'] =  $this->db->get_where('t_user',['level' => 'Teller'])->result();
		// $data['nama_karyawan'] =  $this->db->select('*')->from('t_user')->where('level','Teller')->get()->result();
		
    $this->load->view('kuisioner/index',$data);
	}

	// public function datatables()
  //   {
	//     $kuisioner = $this->M_Kuisioner->get_datatables();
	//     // echo "<pre>";
	//     // print_r($kuisioner);die();
	//     $data = array();
	//     $no = $_POST['start']+1;
  //
	//     foreach ($kuisioner as $field) {
  //
	//         $row = array();
	//         $row[] = $no++;
	//         $row[] = $field->id_kuisioner;
	//         $row[] = $field->kuisioner;
  //
	//         $row[] = '<a class="btn btn-warning btn-sm" href="javascript:void(0)"
	//                   title="Edit" onclick="ajax_edit('."'".$field->id_kuisioner."'".')">
	//                   <i class="fa fa-edit"></i>
	//            </a>
	//            <a class="btn btn-danger btn-sm" href="javascript:void(0)"
	//                   title="Hapus" onclick="ajax_delete('."'".$field->id_kuisioner."'".')">
	//                   <i class="fa fa-trash"></i>
	//            </a>';
  //
	//         $data[] = $row;
  //
	//     }
  //
  //
	//     $output = array(
	//                     "draw" => $_POST['draw'],
	//                     "recordsTotal" => $this->M_Kuisioner->count_all(),
	//                     "recordsFiltered" => $this->M_Kuisioner->count_filtered(),
	//                     "data" => $data,
	//     );
  //
	//     //output to json format
	//     echo json_encode($output);
  //   }


    public function tambah()
    {

       $insert = $this->MNasabah_Kuisioner_Result->tambah();
       // $this->session->set_flashdata('flash','Data kuisioner berhasil');
			 redirect('Nasabah_Kuisioner_Result/selesai');

    }

    public function edit($id)
    {
        $data = $this->MNasabah_Kuisioner_Result->edit_by_id($id); // get data dari database melalui model
        echo json_encode($data);
    }

    public function update()
    {
        $data = array(
            'Kuisioner' => $this->input->post('Kuisioner'),
        );

        $id = array('id_jawaban' => $this->input->post('id_jawaban'));
        $this->MNasabah_Kuisioner_Result->update($id, $data);
        echo json_encode(array("status" => TRUE));
    }

    public function destroy($id)
    {
        $data = $this->MNasabah_Kuisioner_Result->edit_by_id($id); // get id dari database melalui model

        $this->MNasabah_Kuisioner_Result->delete_by_id($id);

        echo json_encode(array("status" => TRUE));
    }


		public function selesai()
		{
			$this->load->view('kuisioner/selesai');
		}

	}
