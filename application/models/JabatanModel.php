<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getJabatan(){
        $this->db->order_by('jabatan_date_created','DESC');
        $query = $this->db->get('disposisi_jabatan');
        return $query->result_array();
    }
    function getJabatanBagian(){
        $where = "jabatan_nama='Kabag' OR jabatan_nama='Kabid'";
        $this->db->order_by('jabatan_date_created','DESC');
        $this->db->where($where);
        $query = $this->db->get('disposisi_jabatan');
        return $query->result_array();
    }
    function getKasubbag(){
        $where = "jabatan_nama='Kasubbag'";
        $this->db->order_by('jabatan_date_created','DESC');
        $this->db->where($where);
        $query = $this->db->get('disposisi_jabatan');
        return $query->result_array();
    }
    function get_jabatan()
    {
        return $this->db->get('disposisi_jabatan');
    }
    function getJabatanById($id){
        $this->db->where('jabatan_id',$id);
        $query = $this->db->get('disposisi_jabatan');
        return $query->row_array();
    }
    function post($data){
        return $this->db->insert('disposisi_jabatan',$data);
    }
    function delete($id){
        $this->db->where('jabatan_id',$id);
        return $this->db->delete('disposisi_jabatan');
    }
    function edit($id,$data){
        $this->db->where('jabatan_id',$id);
        return $this->db->update('disposisi_jabatan',$data);
    }
    
}


