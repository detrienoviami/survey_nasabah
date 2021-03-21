<?php
class M_Pohonkeputusan extends CI_Model{

    var $table = ''; //nama tabel dari database
    // var $column_order = array(null, 'id_kuisioner','Kuisioner'); //field yang ada di table kuisioner
    // var $column_search = array('id_kuisioner','Kuisioner'); //field yang diizin untuk pencarian
    // var $order = array('id_kuisioner' => 'desc'); // default order

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


    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    public function get_by_id($id)
    {
        $this->db->from('t_kuisioner');
        $this->db->where('id_kuisioner',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('t_kuisioner', $data, $where);
        return $this->db->affected_rows();
    }



}
