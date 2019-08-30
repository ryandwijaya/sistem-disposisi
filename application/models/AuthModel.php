<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getUser(){
        $this->db->order_by('pegawai_date_created','DESC');
        $query = $this->db->get('disposisi_pegawai');
        return $query->result_array();
    }
    function getUsers($user){
        return $this->db->get_where('disposisi_pegawai',$user);
    }

    
    function getUserAccount($user){
        $query = $this->db->get_where('disposisi_pegawai',$user);
        return $query->row_array();
    }
    function getUserByUsername($username)
    {
        $this->db->from('disposisi_pegawai');
        $this->db->where('user_username',$username);
        $query = $this->db->get();
        return $query->row_array();
    }
    function createUser($dataUser)
    {
        return $this->db->insert('disposisi_pegawai',$dataUser);
    }
    function deleteUser($id)
    {
        $this->db->where('user_id',$id);
        return $this->db->delete('disposisi_pegawai');
    }
    function UbahPassword($data,$id)
    {

        $this->db->where('username',$id);
        $this->db->update('disposisi_pegawai',$data);
    }
}


