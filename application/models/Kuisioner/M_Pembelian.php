<?php
date_default_timezone_set('Asia/Jakarta');
class M_Pembelian extends CI_Model{


  public function getPembelian()
  {
    $this->db->select('t_jamu.*,t_pegawai.*,t_pembelian.*,t_pemasok.*');
    $this->db->from('t_pembelian');
    $this->db->join('t_jamu','t_jamu.kd_jamu = t_pembelian.kd_jamu', 'inner');
    $this->db->join('t_pegawai','t_pegawai.kd_pegawai = t_pembelian.kd_pegawai','left');
    $this->db->join('t_pemasok','t_pemasok.kd_pemasok = t_pembelian.kd_pemasok','left');
    $data = $this->db->get();
    return $data->result_array();
  }

  public function getV_Pembelian()
  {
    return $this->db->get('v_pembelian')->result_array();
  }

  public function get_vPembelian()
  {
      return $this->db->get("v_pembelian");
  }

  public function getPembelianByKd($kd)
  {
    return $this->db->get_where('t_pembelian', ['kd_jamu' => $kd])->result_array();
  }


  public function tambah()
  {
    $data = [
      "kd_jamu" => $this->input->post('kd_jamu', true),
      "tgl_beli" => date('Y-m-d'),
      "jam_beli" => date('H:i:s'),
      "jumlah" => $this->input->post('jumlah', true),
      "kd_pemasok" => $this->input->post('kd_pemasok', true),
      "kd_pegawai" => "2",
    ];

    $this->db->insert('t_pembelian', $data);
  }

  public function hapusData($kd)
  {
    $this->db->where('kd_jamu', $kd);
    $this->db->delete('t_pembelian');
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
    $this->db->update('t_pembelian', $data);
  }

  public function jmlhPembelian()
  {
    $query = $this->db->get('t_pembelian');
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
