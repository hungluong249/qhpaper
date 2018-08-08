<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public $table = '';

    function __construct() {
        parent::__construct();
    }
	
	public function insert($data) {
        $this->db->set($data)->insert($this->table);

        if ($this->db->affected_rows() == 1) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function update($id, $data) {
        $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }

    public function fetch_all_pagination($limit = NULL, $start = NULL, $keywords = '', $or_like = true) {
        $this->db->select($this->table .'.*');
        $this->db->from($this->table);
        $this->db->group_start();
        $this->db->like('title', $keywords);
        if($or_like == true){
            $this->db->or_like('hexcolor', $keywords);
        }
        $this->db->group_end();
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');

        return $result = $this->db->get()->result_array();
    }

    public function count_search($keywords = '', $or_like = true){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->group_start();
        $this->db->like('title', $keywords);
        if($or_like == true){
            $this->db->or_like('hexcolor', $keywords);
        }
        $this->db->group_end();
        $this->db->where('is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function get_by_id($id)
    {
    	$this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);

        return $result = $this->db->get()->row_array();
    }

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */