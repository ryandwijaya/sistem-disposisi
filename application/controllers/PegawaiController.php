<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller {

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

		$data['user'] = $this->PegawaiModel->getPegawai();
        $data['jabatan'] = $this->PegawaiModel->getJabatan();
        $data['breadcumb'] = 'Pegawai';
		$this->load->view('templates/header',$data);
        $this->load->view('backend/pegawai/index',$data);
        $this->load->view('templates/footer');
		
	}
    public function profil($nip)
    {
        $data['user'] = $this->PegawaiModel->getPegawaiByNip($nip);
        
        $data['breadcumb'] = 'Profil Pegawai';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/pegawai/profil',$data);
        $this->load->view('templates/footer');
    }
    public function edit($nip)
    {
        if (isset($_POST['edit'])) {
            $data_pegawai = array(
                'pegawai_nama' => $this->input->post('nama'), 
                'pegawai_jabatan' => $this->input->post('jabatan'), 
            );
            if (count($_POST)>0) {
                $this->PegawaiModel->edit($nip,$data_pegawai);
                $this->session->set_flashdata('alert', 'success_change');
                redirect(site_url('pegawai'));
            }else{
                $this->session->set_flashdata('alert', 'fail_edit');
                redirect(site_url('pegawai'));
            }

            
        }else{
            $data['user'] = $this->PegawaiModel->getPegawaiByNip($nip);
            $data['jabatan'] = $this->PegawaiModel->get_datalist_jabatan();
            $data['breadcumb'] = 'Edit Pegawai '.$nip;
            $this->load->view('templates/header',$data);
            $this->load->view('backend/pegawai/edit',$data);
            $this->load->view('templates/footer');  
        }
        
    }
    public function changePw($nip)
    {
        $get_user = $this->PegawaiModel->getPegawaiByNip($nip);
        $get_pw_lama = $get_user[0]['pegawai_password'];
        
        $pw_lama = $this->input->post('p_lama');
        $pw_baru = $this->input->post('p_baru');
        $pw_baru2 = $this->input->post('p_baru2');

        $new_password = array('pegawai_password' => md5($pw_baru) );

        if (isset($_POST['change'])) {
            if ($get_pw_lama==md5($pw_lama)) {
                if ($pw_baru==$pw_baru2) {
                    $this->PegawaiModel->changePw($nip,$new_password);
                    $this->session->set_flashdata('alert', 'success_change');
                    redirect(site_url('profil/'.$nip));
                }
                else{
                    echo "Pw Baru Tidak Valid";
                }
                
            }else{
                echo "Pw Lama Salah";
            }
        }
        
    }
    public function create()
    {
        if (isset($_POST['submit'])) {
           $data = array(
            'pegawai_nip' => $this->input->post('nip') , 
            'pegawai_nama' => $this->input->post('nama') , 
            'pegawai_jabatan' => $this->input->post('jabatan') , 
            'pegawai_status' => $this->input->post('pegawai_status') , 
            'pegawai_password' => md5($this->input->post('nip')) , 
        );
        
        if (count($_POST)>0) {
            $this->PegawaiModel->post($data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('pegawai'));
        }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('pegawai'));
        }


        }

        
    }
    public function hapus($id){
        
        $hapus = $this->PegawaiModel->delete($id);
        if ($hapus > 0){
            $this->session->set_flashdata('alert', 'success_delete');
            redirect('pegawai');
        }else{
            redirect('pegawai');
        }
    }
    
	
}
