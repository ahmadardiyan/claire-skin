<?php

class Pesanan_model extends CI_Model
{
    
    public function getAllPesanan()
    {
        $this->db->select('*');
        $this->db->join('kecamatan', 'kecamatan.id_kec = pesanan.id_kec');
        $this->db->join('kabupaten', 'kabupaten.id_kab = pesanan.id_kab');
        $this->db->join('provinsi', 'provinsi.id_prov = pesanan.id_prov');
        $this->db->from('pesanan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPesanan($key, $value)
    {
        $this->db->where([$key => $value]);
        $this->db->join('kecamatan', 'kecamatan.id_kec = pesanan.id_kec');
        $this->db->join('kabupaten', 'kabupaten.id_kab = pesanan.id_kab');
        $this->db->join('provinsi', 'provinsi.id_prov = pesanan.id_prov');
        $query = $this->db->get('pesanan');
        return $query->row_array();
    }

    public function getPesananByTimeCreated($start,$end){
        $this->db->where('created_at >=', $start);
        $this->db->where('created_at <=', $end);
        $this->db->join('kecamatan', 'kecamatan.id_kec = pesanan.id_kec');
        $this->db->join('kabupaten', 'kabupaten.id_kab = pesanan.id_kab');
        $this->db->join('provinsi', 'provinsi.id_prov = pesanan.id_prov');
        $this->db->from('pesanan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDetailPesanan()
    {
        $query = $this->db->get('detail_pesanan');
        return $query->result_array();
    }
    
    public function getDetailPesanan($value)
    {
        $this->db->where('id_pesanan', $value);
        $query = $this->db->get('detail_pesanan');
        return $query->result_array();
    }

    public function maxId($select, $value, $table)
    {
        $this->db->like('created_at', $value);
        $this->db->select_max($select, 'maxId');
        $query = $this->db->get($table);
        $idMax = $query->row_array();
        return $idMax['maxId'];
    }

    public function createData($table, $data)
    {
        $this->db->insert($table, $data);
        return true;
    }

    public function deleteData($table, $key, $value)
    {
        $this->db->where($key, $value);
        $this->db->delete($table);
    }

    public function konfirmasi($value)
    {
        $this->db->where('id_pesanan', $value);
        $this->db->set('status', 1);
        $this->db->update('pesanan');
        return true;
    }

}
