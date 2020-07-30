<?php
class Album_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_where(){

        $this->db->select("*");
        $this->db->where([]);
        $query = $this->db->get("album");
        return $query->result_array();

    }


}
?>