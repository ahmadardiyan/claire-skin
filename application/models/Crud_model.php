<?php

class Crud_model extends CI_Model{

    public function getAllData($table){
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function getAllDataWhere($table,$key,$value){
        $query = $this->db->get_where($table,[$key=>$value]);
        return $query->result_array();
    }

    public function getData($table,$key,$value){
        $query = $this->db->get_where($table,[$key=>$value]);
        return $query->row_array();
    }

    public function create($table,$data){
        $this->db->insert($table,$data);
    }

    public function update($table,$key,$value,$data){
        $this->db->where($key,$value);
        $this->db->update($table, $data);
    }

    public function delete($table,$key,$value){
        $this->db->where($key,$value);
        $this->db->delete($table);
    }
}

?>
