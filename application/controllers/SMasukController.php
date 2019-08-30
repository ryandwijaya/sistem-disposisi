<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMasukController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('SMasukModel');
        $this->load->model('PegawaiModel');
        $this->load->model('JabatanModel');
        date_default_timezone_set('Asia/Jakarta');
        // }
        if (!$this->session->has_userdata('session_nip')){
            redirect(site_url('login'));
        }
        
	}
	public function index()
	{

		$data['surat'] = $this->SMasukModel->getSurat();
        $data['breadcumb'] = 'Surat Masuk';
		$this->load->view('templates/header',$data);
        $this->load->view('backend/smasuk/index',$data);
        $this->load->view('templates/footer');
		
	}
    public function disposisi($id)
    {
        $data['surat'] = $this->SMasukModel->getSuratById($id);
        $data['lajur'] = $this->SMasukModel->getLajurBySurat($id);
        $data['breadcumb'] = 'Disposisi Surat Masuk';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/smasuk/disposisi',$data);
        $this->load->view('templates/footer');  
    }
    public function profil($id)
    {
        $data['surat'] = $this->SMasukModel->getSuratById($id);
        $data['breadcumb'] = 'Surat Masuk';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/smasuk/index',$data);
        $this->load->view('templates/footer');
    }
    public function create(){
        if (isset($_POST['submit'])) {

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf|jpg|png|jpeg|docx|doc';
            $nama_file = $_FILES['userfile']['name'];
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            
            $data = array(
                'surat_no_agenda' =>$this->input->post('no_agenda'), 
                'surat_nomor' =>$this->input->post('no_surat'), 
                'surat_tanggal' =>$this->input->post('tgl_surat'), 
                'surat_tanggal_terima' =>$this->input->post('tgl_diterima'), 
                'surat_sumber' =>$this->input->post('sumber'), 
                'surat_perihal' =>$this->input->post('perihal'), 
                'surat_keterangan' =>$this->input->post('keterangan'), 
                'surat_sifat' =>$this->input->post('sifat'), 
                'surat_file' =>str_replace(' ','_',$nama_file), 
                'surat_acc_pimpinan' => '0' ,
                'surat_created_by' =>$this->session->userdata('session_id') 
            );
            if (count($_POST)>0) {
            $this->upload->do_upload('userfile');
            $this->SMasukModel->post($data);
            $this->session->set_flashdata('alert', 'success_post');
            redirect(site_url('surat_masuk'));
            }else{
            $this->session->set_flashdata('alert', 'fail_post');
            redirect(site_url('surat_masuk'));

            }


        }else{
        $data['surat'] = $this->SMasukModel->getSurat();
        $data['breadcumb'] = 'Surat Masuk';
        $this->load->view('templates/header',$data);
        $this->load->view('backend/smasuk/index',$data);
        $this->load->view('templates/footer');
           
        }
    }

    public function lajur_disposisi($id){

        $data['breadcumb'] = 'Disposisikan';
        $data['surat'] = $this->SMasukModel->getSuratById($id);
        $data['pegawai'] = $this->PegawaiModel->getPegawai();
        $data['jabatan'] = $this->JabatanModel->getJabatan();
        // echo "<pre>";
        // var_dump($data['jabatan']);
        // exit();
        $this->load->view('templates/header',$data);
        $this->load->view('backend/smasuk/lajur_disposisi',$data);
        $this->load->view('templates/footer');
    }
    public function disposisi_lanjutan($id){
        if (isset($_POST['send'])) {
            // $lajur = [
            //     'lajur_surat_id' => $id,
            //     'lajur_pegawai_id' => $this->input->post('pegawai')
            // ];
            $acc = '1';
            $data_surat = [
            'surat_acc_pimpinan' => $acc,
            'surat_ket_kabag' => $this->input->post('surat_ket_kabag'),
            'surat_tujuan2' => $this->input->post('surat_tujuan2')
            ];
           

            // $this->SMasukModel->post_lajur($lajur);
            $this->SMasukModel->edit($id,$data_surat);
            $this->session->set_flashdata('alert', 'success_edit');
            redirect(site_url('surat_masuk'));


        }else{

        $data['breadcumb'] = 'Disposisi Lanjutan';
        $data['surat'] = $this->SMasukModel->getSuratById($id);
        $data['pegawai'] = $this->PegawaiModel->getPegawai();
        $data['pegawais'] = $this->PegawaiModel->getPegawaiByJab($this->session->userdata('session_jabatan'));
        $data['jabatan'] = $this->JabatanModel->getJabatan();
        // echo "<pre>";
        // var_dump($data['jabatan']);
        // exit();
        $this->load->view('templates/header',$data);
        $this->load->view('backend/smasuk/disposisi_lanjutan',$data);
        $this->load->view('templates/footer');    
        }
        
    }
    public function disposisi_lanjutan_kasubag($id){
        if (isset($_POST['send'])) {
            $lajur = [
                'lajur_surat_id' => $id,
                'lajur_pegawai_id' => $this->input->post('pegawai')
            ];
            $acc = '1';
            $data_surat = [
            'surat_acc_pimpinan' => $acc,
            'surat_ket_kasubag' => $this->input->post('surat_ket_kasubag')
            ];

            $this->SMasukModel->post_lajur($lajur);
            $this->SMasukModel->edit($id,$data_surat);
            $this->session->set_flashdata('alert', 'success_edit');
            redirect(site_url('surat_masuk'));


        }else{

        $data['breadcumb'] = 'Disposisi Lanjutan';
        $data['surat'] = $this->SMasukModel->getSuratById($id);
        $data['pegawai'] = $this->PegawaiModel->getPegawai();
        $data['pegawais'] = $this->PegawaiModel->getPegawaiByFungsi('fungsional');
        $data['jabatan'] = $this->JabatanModel->getJabatan();
        // echo "<pre>";
        // var_dump($data['jabatan']);
        // exit();
        $this->load->view('templates/header',$data);
        $this->load->view('backend/smasuk/disposisi_lanjutan_kasubag',$data);
        $this->load->view('templates/footer');    
        }
        
    }
    public function create_lajur(){
        $surat_id = $this->input->post('id_surat');
        $lajur_keterangan = $this->input->post('lajur_keterangan');
        $lajur_jabatan = $this->input->post('lajur_jabatan');
        $acc = '1';
        $data_lajur = [
            'surat_acc_pimpinan' => $acc,
            'surat_lajur_ket' => $lajur_keterangan,
            'surat_lajur_tujuan' => $lajur_jabatan
        ];
        // echo '<pre>';
        // var_dump($data_lajur);
        // exit();
        if (count($_POST)>0) {
            $this->SMasukModel->edit($surat_id,$data_lajur);
            $this->session->set_flashdata('alert', 'success_edit');
            redirect(site_url('surat_masuk'));   
        }else{
            echo 'gagal';
        }
    }

    public function delete($id){
        $this->SMasukModel->delete($id);
        $this->session->set_flashdata('alert', 'success_delete');
        redirect(site_url('surat_masuk'));

    }
	
}
