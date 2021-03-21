<?php
class MKLO_Karyawan extends CI_Model{

    var $table = 't_karyawan'; //nama tabel dari database
    var $column_order = array(null, 'id_user','nip','nama','tgl_lahir','email','agama','alamat','no_hp','level','status'); //field yang ada di table atribut
    var $column_search = array('id_user','nip','nama','tgl_lahir','email','agama','alamat','no_hp','level','status'); //field yang diizin untuk pencarian
    var $order = array('id_user' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
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
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();

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
        $this->db->insert('t_karyawan', $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id)
    {
        $this->db->from('t_karyawan');
        $this->db->where('id_user',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('t_karyawan', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('t_karyawan');
    }

    public function edit_by_id($id)
    {
        $this->db->from('t_karyawan');
        $this->db->where('id_user',$id);
        $query = $this->db->get();

        return $query->row();
    }

}