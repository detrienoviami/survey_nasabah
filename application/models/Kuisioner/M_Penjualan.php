<?php
date_default_timezone_set('Asia/Jakarta');
class M_Penjualan extends CI_Model{

  public function getPenjualan()
  {
    $this->db->select('t_jamu.*,t_pegawai.*,t_penjualan.*');
    $this->db->from('t_penjualan');
    $this->db->join('t_jamu','t_jamu.kd_jamu = t_penjualan.kd_jamu', 'inner');
    $this->db->join('t_pegawai','t_pegawai.kd_pegawai = t_penjualan.kd_pegawai','left');
    $data = $this->db->get();
    return $data->result_array();
  }

  public function getV_Penjualan()
  {
    return $this->db->get('v_penjualan')->result_array();
  }

  public function getPenjualanByKd($kd)
  {
    return $this->db->get_where('t_penjualan', ['kd_jamu' => $kd])->result_array();
  }


  public function tambah()
  {
    $this->db->select('RIGHT(t_penjualan.no_fak,3) as kode', FALSE);
    $this->db->order_by('no_fak','DESC');
    $this->db->limit(1);
    $query = $this->db->get('t_penjualan');
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    }else {
      $kode = 1;
    }
    $kodemax = str_pad($kode, 3 , "0", STR_PAD_LEFT);
    $kodejadi = "K".$kodemax;
    $kd_jamu= $this->input->post('kd_jamu');
    $tgl_jual= date('Y-m-d');
    $jam_jual= date('H:i:s');
    $jumlah = $this->input->post('jumlah', true);
    // $insert_array = array();
    // for ($i=0; $i < count($kd_jamu); $i++){
    //   $tmp = array();
    //   $tmp['kd_jamu'] = $kd_jamu[$i];
    //   $tmp['tgl_jual'] = $tgl_jual[$i];
    //   $tmp['jam_jual'] = $jam_jual[$i];
    //   $tmp['jumlah'] = $jumlah[$i];
    //   $tmp['kd_pegawai'] = 2;
    //   $tmp['no_fak'] = $kodejadi;
    //   $insert_array[] = $tmp;
    // }
    $data = [
      "kd_jamu" => $kd_jamu,
      "tgl_jual" => $tgl_jual,
      "jam_jual" => $tgl_jual,
      "jumlah" => $jumlah,
      "kd_pegawai" => "2",
      "no_fak" =>  $kodejadi,
    ];

    $this->db->insert('t_penjualan', $data);
  }

  public function hapusData($kd)
  {
    $this->db->where('kd_jamu', $kd);
    $this->db->delete('t_penjualan');
  }

  public function ubah()
  {
    $data = [
      "nama_jamu" => $this->input->post('nama_jamu', true),
      "harga_jual" => $this->input->post('harga_jual', true),
      "stok" => $this->input->post('stok', true),
      "kd_pemasok" => $this->input->post('kd_pemasok', true),
    ];
    $this->db->where('kd_jamu', $this->input->post('kd_jamu'));
    $this->db->update('t_penjualan', $data);
  }

  public function jmlhPenjualan()
  {
    $query = $this->db->get('t_penjualan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

}

?>
