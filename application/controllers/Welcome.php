<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('PegawaiModel');
        $this->load->model('SMasukModel');
        date_default_timezone_set('Asia/Jakarta');
        // }
        if (!$this->session->has_userdata('session_nip')){
            redirect(site_url('login'));
        }
        
	}
   

    public function index()
    {
    	$data['pegawai'] = $this->PegawaiModel->getPegawai();
    	$data['surat'] = $this->SMasukModel->getSurat();
    	$data['breadcumb'] = 'Beranda';
        $this->load->view('templates/header',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');

        
    }

    

}
