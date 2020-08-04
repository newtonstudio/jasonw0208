<?php
class MY_Model extends CI_model {

    protected $table_name = "album";

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //gget total how many rows 
    public function total_record($where=[]) {

        $this->db->select("COUNT(*) AS total");
        $this->db->where($where);
        $query = $this->db->get($this->table_name);
        $data = $query->row_array();
        return $data['total'];

    }

    //fetch particular row
    public function fetch($where=[], $start, $item_per_page){

        //SELECT * FROM tablename LIMIT $start, $item_per_page
        $this->db->select("*");
        $this->db->where($where);
        $this->db->limit($item_per_page, $start);

        $query = $this->db->get($this->table_name);
        return $query->result_array();

    }


    //We use Soft Delete to prevent permanent delete
    public function delete($where){
        $this->db->where($where);
        $this->db->update($this->table_name, [
            'is_deleted' => 1,
            'modified_date' => date("Y-m-d H:i:s"),
        ]); 
    }

    //Update Data
    public function update($where, $update_sql){
        $this->db->where($where);
        $this->db->update($this->table_name, $update_sql);        
    }

    //Insert Data
    public function insert($data_sql){

        $this->db->insert($this->table_name, $data_sql);

    }

    //To get multiple data (more than 1)
    public function get_where($where=[]){

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
        $query = $this->db->get($this->table_name);
        return $query->result_array();

    }

    //To get one data (only 1)
    public function getOne($where) {
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return $query->row_array();
    }

}
?>