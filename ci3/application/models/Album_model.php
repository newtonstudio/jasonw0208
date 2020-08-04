<?php
class Album_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //We use Soft Delete to prevent permanent delete
    public function delete($where){
        $this->db->where($where);
        $this->db->update("album", [
            'is_deleted' => 1,
            'modified_date' => date("Y-m-d H:i:s"),
        ]); 
    }

    //Update Data
    public function update($where, $update_sql){
        $this->db->where($where);
        $this->db->update("album", $update_sql);        
    }

    //Insert Data
    public function insert($data_sql){

        $this->db->insert('album', $data_sql);

    }

    //To get multiple data (more than 1)
    public function get_where($where){

        /*
        $sql = mysqli_query($link, "SELECT * FROM album WHERE display = 1 AND category = 'world' AND is_deleted = 0");
        if(mysqli_num_rows($sql) > 0) {
            while($row = mysqli_fetch_array($sql)) {
            }
        }
        */
        //SELECT * FROM album WHERE display = 1 AND category = 'world' AND is_deleted = 0
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get("album");
        return $query->result_array();

    }

    //To get one data (only 1)
    public function getOne($where) {
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get("album");
        return $query->row_array();
    }


}
?>