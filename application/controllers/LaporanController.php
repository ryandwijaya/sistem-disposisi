<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller
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
    	$tgl = $this->input->post('tgl_surat');
    	$data['breadcumb'] = 'Laporan';
        $data['laporan'] = $this->SMasukModel->get_surat_by_tgl($tgl);
        $this->load->view('templates/header',$data);
        $this->load->view('backend/laporan/index',$data);
        $this->load->view('templates/footer');

        
    }

    

}
