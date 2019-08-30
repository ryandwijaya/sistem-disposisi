<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getQuestion(){
    	$this->db->select('*');
    	$this->db->from('elearning_question');
    	$this->db->join('elearning_user','elearning_user.user_id = elearning_question.question_from');
        $this->db->order_by('question_date_created','DESC');
    	return $this->db->get()->result_array();
    }
    public function getAnswer($id){
        $this->db->select('*');
        $this->db->from('elearning_answer');
        $this->db->where('answer_from_question', $id);
        $this->db->join('elearning_user','elearning_user.user_id = elearning_answer.answer_from_user');
        $this->db->order_by('answer_date_created','ASC');
        return $this->db->get()->result_array();
    }
    public function post($data){
    	return $this->db->insert('elearning_question',$data);
    }
    public function postAnswer($data){
        return $this->db->insert('elearning_answer',$data);
    }

	    
}


