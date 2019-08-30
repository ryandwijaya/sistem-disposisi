<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('JabatanModel');
        $this->load->model('SMasukModel');
        date_default_timezone_set('Asia/Jakarta');
        // }
        if (!$this->session->has_userdata('session_nip')){
            redirect(site_url('login'));
        }
        
	}
	public function index()
	{

		$data['jabatan'] = $this->JabatanModel->getJabatan();
        $data['breadcumb'] = 'Jabatan';
		$this->load->view('templates/header',$data);
        $this->load->view('backend/jabatan/index',$data);
        $this->load->view('templates/footer');
		
	}
    
    public function create()
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'jabatan_nama' => $this->input->post('nama'),
            'jabatan_bagian' => $this->input->post('bagian') 
        );
        
        if (count($_POST)>0) {
            $this->JabatanModel->post($data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('jabatan'));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('jabatan'));
        }


        }

        
    }

    public function edit($id)
    {
        if (isset($_POST['edit'])) {
            $data_jabatan = array(
                'jabatan_nama' => $this->input->post('nama') 
            );
            if (count($_POST)>0) {
                $this->JabatanModel->edit($id,$data_jabatan);
                $this->session->set_flashdata('alert', 'success_change');
                redirect(site_url('jabatan'));
            }else{
                $this->session->set_flashdata('alert', 'fail_edit');
                redirect(site_url('jabatan'));
            }

            
        }else{
            $data['jabatan'] = $this->JabatanModel->getJabatanById($id);
            $data['breadcumb'] = 'Edit Jabatan ';
            $this->load->view('templates/header',$data);
            $this->load->view('backend/jabatan/edit',$data);
            $this->load->view('templates/footer');  
        }
        
    }

    public function delete($id){
        $this->JabatanModel->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
        redirect(site_url('jabatan'));

    }
    
	
}
