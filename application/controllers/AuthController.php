<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('JabatanModel');
    }

    public function index()
    {

        $this->load->view('backend/auth/login');
    }
    

    public function login()
    {
        
        if (isset($_POST['login'])) {

            $nip = $this->input->post('nip');
            $password = $this->input->post('password');

            $pegawai = array(
                'pegawai_nip' => $nip,
                'pegawai_password' => md5($password)
            );

            $validate = $this->AuthModel->getUsers($pegawai)->num_rows();
            
            $admin = $this->AuthModel->getUserAccount($pegawai);

            $nip = $admin['pegawai_nip'];

            $get_jabatan=$this->JabatanModel->getJabatanById($admin['pegawai_jabatan']);
            
            $nama = $admin['pegawai_nama'];
            $id = $admin['pegawai_id'];

            if ($validate > 0 ) {
                $data_session = array(
                    'session_nip' => $nip,
                    'session_jabatan' => $get_jabatan['jabatan_nama'],
                    'session_jabatan_id' => $get_jabatan['jabatan_id'],
                    'session_nama' => $nama,
                    'session_id' => $id,
                    'session_status_pegawai' => $admin['pegawai_status']
                );

                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                
                redirect(site_url('dashboard'));

            }
            
            
            else{
                $this->session->set_flashdata('alert','gagalLogin');
                redirect(site_url('login'));
                
            }

        } else {
            $this->load->view('backend/auth/login');
        }
    }

    
    

    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
