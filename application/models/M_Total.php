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
        $column = array('t_total.*,t_kuisioner.*,COUNT(t_kuisioner_result.jawaban) as `jawaban`');
        $this->db->select('t_total.*,t_kuisioner.*,COUNT(t_kuisioner_result.jawaban) as `jawaban`');
        $this->db->from('t_total');
        $this->db->group_by('t_total.id_kuisioner');
        $this->db->join('t_kuisioner_result','t_total.id_kuisioner = t_kuisioner_result.id_kuisioner', 'left');
        $this->db->join('t_kuisioner','t_kuisioner_result.id_kuisioner = t_kuisioner.id_kuisioner', 'left');
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
      $this->_get_datatables_query($term);
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
        $this->db->where('id_total',$id);
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
        $this->db->where('id_total', $id);
        $this->db->delete('t_total');
    }

    public function edit_by_id($id)
    {
        $this->db->from('t_total');
        $this->db->where('id_total',$id);
        $query = $this->db->get();

        return $query->row();
    }
}
?>
