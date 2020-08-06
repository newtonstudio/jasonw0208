<?php
class Album_model extends MY_Model {

    protected $table_name = "album";

    public function addition($a, $b){
        return $a + $b;
    }

}
?>