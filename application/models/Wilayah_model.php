<?php

class Wilayah_model extends CI_Model{

    public function getAllData($table){
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function getAllDataWhere($table,$key,$value){
        $query = $this->db->get_where($table,[$key=>$value]);
        return $query->result_array();
    }

}

?>
