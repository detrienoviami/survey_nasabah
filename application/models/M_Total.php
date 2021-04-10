<?php
class M_Total extends CI_Model{

    var $table = 't_total'; //nama tabel dari database
    var $column_order = array(null, 'id_kuisioner','stp','tp','cp','p','sp','entrophy','gain'); //field yang ada di table kuisioner
    var $column_search = array('id_kuisioner','stp','tp','cp','p','sp','entrophy','gain'); //field yang diizin untuk pencarian
    //var $order = array('id_kuisioner' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    private function _get_datatables_query($term='')
    {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if($i===0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $term = $_REQUEST['search']['value'];
        $this->get_db();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function save($data)
    {
        $this->db->insert('t_total', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id)
    {
        $this->db->from('t_total');
        $this->db->where('id_kuisioner',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('t_total', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_kuisioner', $id);
        $this->db->delete('t_total');
    }

    public function edit_by_id($id)
    {
        $this->db->from('t_total');
        $this->db->where('id_kuisioner',$id);
        $query = $this->db->get();

        return $query->row();
    }


    public function get_db(){

      $this->db->select('t_total.*,t_kuisioner.id_kuisioner,t_kuisioner_result.jawaban,
                        sum(case when t_kuisioner_result.jawaban=5 then 1 else 0 end) as sp,
                        sum(case when t_kuisioner_result.jawaban=4 then 1 else 0 end) as p,
                        sum(case when t_kuisioner_result.jawaban=3 then 1 else 0 end) as cp,
                        sum(case when t_kuisioner_result.jawaban=2 then 1 else 0 end) as tp,
                        sum(case when t_kuisioner_result.jawaban=1 then 1 else 0 end) as stp'
                          );



      $this->db->from('t_kuisioner');


      $this->db->group_by('t_kuisioner.id_kuisioner');

      $this->db->order_by('t_kuisioner.id_kuisioner', 'asc');
      $this->db->join('t_kuisioner_result','t_kuisioner.id_kuisioner = t_kuisioner_result.id_kuisioner', 'left');
      $this->db->join('t_total','t_kuisioner_result.id_kuisioner = t_total.id_kuisioner', 'left');

      $query = $this->db->get();


      return $query->result_array();
    }

    public function countJawaban(){
      $this->db->select('t_kuisioner_result.jawaban');
      $this->db->from('t_kuisioner_result');

      $query = $this->db->get();


      return $query->result_array();
    }

    public function hitung_entropy(){
      $listKuisioner = $this->get_db();
      $countJawaban = $this->countJawaban();
      $hasil=array(
        'sp' => 0,
				'p' => 0,
				'cp' => 0,
				'tp' => 0,
				'stp' => 0,
        // '' => 0,
      );

     $jumlahResponden = count($countJawaban);


      foreach ($listKuisioner as $kuisioner){
  			foreach ($kuisioner as $pelayanan => $nilai){
  				if(array_key_exists($pelayanan, $hasil)){
  					$hasil[$pelayanan] += $nilai;
  				}
  			}
  		}

  		foreach ($hasil as $unitPelayanan => $nilai){
  			$hasil[$unitPelayanan] = $nilai/$jumlahResponden;
  		}

		    return $hasil;
    }

    public function hitungNilai() {
  		$nilaiUnsurPelayanan = $this->hitung_entropy();
  		$result = 0;
      //var_dump($nilaiUnsurPelayanan);
      $hasil=array(
        'sp' => 0,
        'p' => 0,
        'cp' => 0,
        'tp' => 0,
        'stp' => 0,
        // '' => 0,
      );

      foreach ($nilaiUnsurPelayanan as $kuisioner){

        foreach ($kuisioner as $pelayanan => $nilai){
          if(array_key_exists($pelayanan, $hasil)){
            $hasil[$pelayanan] += $nilai;
          }
        }
      }

      // foreach ($hasil as $unitPelayanan => $nilai){
  		// 	$hasil[$unitPelayanan] = $nilai*0.071;
  		// }


      foreach ($hasil as $unitPelayanan => $nilai){
        $hasil[$unitPelayanan] = $nilai*0.071;
      }


  		// foreach ($nilaiUnsurPelayanan as $unsurPelayanan){
  		// 	$result += $unsurPelayanan*0.071;
  		// }

  		return $hasil;
  	}

    public function simpulan(){
  		$nilai = $this->hitungNilai();
  		$nilai = $nilai * 25;
      //
  		if($nilai >= 0 && $nilai <= 43.75){
  			$result['mutu'] = 'D';
  			$result['kinerja'] = 'Tidak Baik';
  		}else if($nilai > 43.75 && $nilai <= 62.5){
  			$result['mutu'] = 'C';
  			$result['kinerja'] = 'Kurang Baik';
  		}else if($nilai > 62.5 && $nilai <= 81.25){
  			$result['mutu'] = 'B';
  			$result['kinerja'] = 'Baik';
  		}else if($nilai > 81.25 && $nilai <= 100){
  			$result['mutu'] = 'A';
  			$result['kinerja'] = 'Sangat Baik';
  		}
      //$result = array();
  		$result['konversi'] = $nilai;
       // $result = array(
       //   'konversi' => $nilaiIKMs,
       //   'mutu' => '' ,
       //   'kinerja' => '',
       // );


       // foreach ($result as $unitPelayanan => $nilai){
       //   if($nilai['konversi'] >= 25 && $nilai['konversi'] <= 43.75){
       //     $nilai['mutu'] = 'D';
       //     $nilai['kinerja'] = 'Tidak Baik';
       //   }else if($nilai['konversi'] > 43.75 && $nilai['konversi'] <= 62.5){
       //     $nilai['mutu'] = 'C';
       //     $nilai['kinerja'] = 'Kurang Baik';
       //   }else if($nilai['konversi'] > 62.5 && $nilai['konversi'] <= 81.25){
       //     $nilai['mutu'] = 'B';
       //     $nilai['kinerja'] = 'Baik';
       //   }else if($nilai['konversi'] > 81.25 && $nilai['konversi'] <= 100){
       //     $nilai['mutu'] = 'A';
       //     $nilai['kinerja'] = 'Sangat Baik';
       //   }
       // }

      // if($result['konversi'] >= 25 && $result['konversi'] <= 43.75){
      //   $result['mutu'] = 'D';
      //   $result['kinerja'] = 'Tidak Baik';
      //
      // }else if($result['konversi'] > 43.75 && $result['konversi'] <= 62.5){
      //   $result['mutu'] = 'C';
      //   $result['kinerja'] = 'Kurang Baik';
      //
      // }else if($result['konversi'] > 62.5 && $result['konversi'] <= 81.25){
      //   $result['mutu'] = 'B';
      //   $result['kinerja'] = 'Baik';
      //
      // }else if($result['konversi'] > 81.25 && $result['konversi'] <= 100){
      //   $result['mutu'] = 'A';
      //   $result['kinerja'] = 'Sangat Baik';
      //
      // }
      	// $result['mutu'] = "";
        // $result['kinerja'] = "";

  		return $result;

  	}


    public function insert_auto(){
      // $query = $this->M_Total->get_db()->result_array();

      $jumlah_soal = count($query);

      for ($i=1; $i < $jumlah_soal+1 ; $i++) {
      // $data = [
      //   "id_kuisioner" => $this->input->post('id_kuisioner', true),
      //   "stp" => $this->input->post('stp', true),
      //   "tp" => $this->input->post('tp', true),
      //   "cp" => $this->input->post('cp', true),
      //   "p" => $this->input->post('p', true),
      //   "sp" => $this->input->post('sp', true),
      //   "entrophy" => $this->input->post('entrophy', true),
      //   "gain" => $this->input->post('gain', true),
      // ];

      		$data[$i]['id_kuisioner'] = $this->input->post('id_kuisioner', true);
          $data[$i]['stp'] = $this->input->post('stp', true);
          $data[$i]['tp'] = $this->input->post('tp', true);
          $data[$i]['cp'] = $this->input->post('cp', true);
          $data[$i]['p'] = $this->input->post('p', true);
          $data[$i]['sp'] = $this->input->post('sp', true);
          $data[$i]['entrophy'] = $this->input->post('entrophy', true);
          $data[$i]['gain'] = $this->input->post('gain', true);

          //return $this->db->insert('t_total',$data[$i]);
    }
        //var_dump($data);
        //return $this->db->insert('t_total', $data);
       //  if ($query->num_rows() > 0) {
       //    $data['id_kuisioner'] = $query->row()->id_kuisioner;
       //    return $this->db
       //        ->where('id_kuisioner', $this->input->post('id_kuisioner', true))
       //        ->update('t_total', $data);
       //  }else {
       //    return $this->db->insert('t_total', $data);
       // };
       //
       // if($this->db->affected_rows() >= 1)
       //    {
       //      // the insert was successfull send the last insert id to another method
       //      $this->insert_to_total($this->db->insert_id);
       //    }else{
       //       return FALSE;
       //   }
    }

    public function insert_to_total($id)
    {
        //insert
       $this->db->insert('t_total',array('id_kuisioner'=>$id));

       //if affected rows return true else false
       return $this->db->affected_rows() >= 1 ? TRUE : FALSE;
    }
}
?>
