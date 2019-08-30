<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SMasukModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('tgl_indo');
    }

    function getSurat(){
        $this->db->order_by('surat_date_created','DESC');
        $query = $this->db->get('disposisi_surat');
        return $query->result_array();
    }

    function getSuratByJab($jab){
        $this->db->where('surat_lajur_tujuan',$jab);
        $this->db->order_by('surat_date_created','DESC');
        $query = $this->db->get('disposisi_surat');
        return $query->result_array();
    }
    
    function getSuratById($id){
        $this->db->where('surat_id',$id);
        $query = $this->db->get('disposisi_surat');
        return $query->row_array();
    }
    public function getSuratByAcc($key){
        $this->db->where('surat_acc_pimpinan',$key);
        $query = $this->db->get('disposisi_surat');
        return $query->result_array();
    }
    public function get_surat_by_tgl($tgl){
        $this->db->where('surat_tanggal_terima',$tgl);
        $query = $this->db->get('disposisi_surat');
        return $query->result_array();
    }

    public function get_count($key,$id,$key2){
        $this->db->where($key,$id);
        $this->db->where($key2,'');
        $query = $this->db->get('disposisi_surat');
        return $query->result_array();
    }
    public function get_count_kasubag($key,$id,$tujuan){
        $this->db->where($key,$id);
        $this->db->where('surat_tujuan2',$tujuan);
        $query = $this->db->get('disposisi_surat');
        return $query->result_array();
    }
    function getLajurBySurat($id)
    {
        $this->db->order_by('lajur_date_created','DESC');
        $this->db->where('lajur_surat_id',$id);
        $query = $this->db->get('disposisi_lajur');
        return $query->result_array();
    }
    function post($data){
        return $this->db->insert('disposisi_surat',$data);
    }
    function post_lajur($data){
        return $this->db->insert('disposisi_lajur',$data);
    }
    function delete($id){
        $this->db->where('surat_id',$id);
        return $this->db->delete('disposisi_surat');
    }
    function edit($id,$data){
        $this->db->where('surat_id', $id);
        return $this->db->update('disposisi_surat', $data);
    }
    
}


