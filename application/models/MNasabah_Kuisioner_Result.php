<?php
class MNasabah_Kuisioner_Result extends CI_Model{
  public function getKuisioner()
  {
    return $this->db->get('t_kuisioner_result')->result_array();
  }

  public function getKuisionerById($id)
  {
    return $this->db->get_where('t_kuisioner_result', ['id_kuisioner' => $id])->result_array();
  }

  // public function get_expopak()
  // {
  //     return $this->db->get("t_kuisioner_result");
  // }

  function get_no_kuisioner(){
        $q = $this->db->query("SELECT MAX(RIGHT(id_kuisioner_result,4)) AS kd_max FROM t_kuisioner_result");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $kodetampil = "SRVY".$kd;
        return $kodetampil;
    }

    public function addKuisAnswer($id_soal_kuis, $id_user, $answer){
        $id_soal_kuis = $_POST['id_kuisioner'];
        $i=1;
    while(isset($_POST['jawaban'.$i])){
         $answer = $_POST['jawaban'.$i];
      //         var_dump($answer);
      // $this->MNasabah_Kuisioner_Result->tambah($id_soal_kuis, $id_user, $answer);
             $i++;
        }

             echo " <script>
                alert('Jawaban Tugas Tersimpan!');
                history.go(-2);
                </script>";

      }

      function get_all_attribut()
    {
        $query = $this->db->get('t_atribut');
        $data = array();

        foreach($query as $attr)
        {
               $row = array();
               $row = $attr->id_atribut; // add each user id to the array
               $row = $attr->atribut;
               $row = $attr->nilai_atribut;
               $data[] = $row;
        }

        $output = array(
          "data" => $data,
  	    );

  	    //output to json format
  	    echo json_encode($output);

    }

  public function tambah()
  {
      $get_soal= $this->db->select('*')->from('t_kuisioner')->get()->result();

      $jumlah_soal = count($get_soal);

      for ($i=1; $i < $jumlah_soal+1 ; $i++) {


				$data[$i]['kode_survey'] = $this->input->post('id_kuisioner_result');
        $data[$i]['no_kuisioner'] = $this->input->post('no_kuisioner'.$i, true);
				$data[$i]['nama'] = $this->input->post('nama', true);
        $data[$i]['jk'] = $this->input->post('jk', true);
        $data[$i]['nohp'] = $this->input->post('nohp', true);
        $data[$i]['id_kuisioner'] = $this->input->post('no_kuisioner'.$i, true);
        $data[$i]['jawaban'] = $this->input->post('jawaban'.$i, true);
        $data[$i]['nama_karyawan'] = $this->input->post('nama_karyawan', true);
        $data[$i]['tgl_jawaban'] = date('Y-m-d');

				$this->db->insert('t_kuisioner_result',$data[$i]); // save ke tabel hasil papikostik
      }

      //   $data = [
      //     "id_kuisioner_result" => $this->input->post('id_kuisioner_result', true),
      //     "no_kuisioner" => $this->input->post('no_kuisioner'.$i, true),
      //     "nama" => $this->input->post('nama', true),
      //     "jk" => $this->input->post('jk', true),
      //     "nohp" => $this->input->post('nohp', true),
      //     "id_kuisioner" => $this->input->post('no_kuisioner'.$i, true),
      //     "jawaban" => $this->input->post('jawaban'.$i, true),
      //     "nama_karyawan" => $this->input->post('nama_karyawan', true),
      //     "tgl_jawaban" => $this->input->post('tgl_jawaban', true),
      //   ];
      // }




      // $this->db->insert('t_kuisioner_result', $data);
      // $this->db->insert('t_kuisioner_result', $data);
    }
  }
?>
