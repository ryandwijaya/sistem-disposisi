<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getPegawai(){
        $this->db->order_by('pegawai_date_created','DESC');
        $this->db->join('disposisi_jabatan','disposisi_jabatan.jabatan_id = disposisi_pegawai.pegawai_jabatan');
        $query = $this->db->get('disposisi_pegawai');
        return $query->result_array();
    }
    function getPegawaiByJab($key){
        $this->db->order_by('pegawai_nama','DESC');
        $this->db->join('disposisi_jabatan','disposisi_jabatan.jabatan_id = disposisi_pegawai.pegawai_jabatan');
        $this->db->where('jabatan_nama',$key);
        $query = $this->db->get('disposisi_pegawai');
        return $query->result_array();
    }
    function getPegawaiByFungsi($key){
        $this->db->order_by('pegawai_nama','DESC');
        $this->db->where('pegawai_status',$key);
        $query = $this->db->get('disposisi_pegawai');
        return $query->result_array();
    }
    function getJabatan(){
        $query = $this->db->get('disposisi_jabatan');
        return $query->result_array();
    }
    function get_datalist_jabatan(){
        return $this->db->get('disposisi_jabatan');
        
    }
    function getPegawaiByNip($nip){
        $this->db->where('pegawai_nip',$nip);
        $query = $this->db->get('disposisi_pegawai');
        return $query->row_array();
    }
    function getPegawaiById($id){
        $this->db->where('pegawai_id',$id);
        $query = $this->db->get('disposisi_pegawai');
        return $query->row_array();
    }

    function post($data){
        return $this->db->insert('disposisi_pegawai',$data);
    }
    function delete($id){
        $this->db->where('pegawai_id',$id);
        return $this->db->delete('disposisi_pegawai');
    }
    function changePw($id,$data){
        $this->db->where('pegawai_nip', $id);
        return $this->db->update('disposisi_pegawai', $data);
    }
    
    function edit($nip,$data){
        $this->db->where('pegawai_nip', $nip);
        return $this->db->update('disposisi_pegawai', $data);
    }
}


