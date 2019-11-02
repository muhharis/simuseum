<?php
class Login extends CI_Controller{
/*
* File			: Klinik2.php
* Language		: PHP
* Package		: CodeIgniter 3.0
* Location		: application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author    	: MuhHaris
* Email     	:muhharis90@yahoo.com
* HP			: 089-537-625-7021
*/
// ------------------------------------------------------------------------
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		$this->load->view('v_login');
	}
	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_user=$this->login_model->auth_user($username,$password);

        if($cek_user->num_rows() > 0){ //jika login sebagai user
						$data=$cek_user->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		         if($data['grup_id']=='1'){ //Akses admin
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_id',$data['code_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('home');

		         }elseif($data['grup_id']=='2'){ //akses dokter
		            $this->session->set_userdata('akses','2');
								$this->session->set_userdata('ses_id',$data['code_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		             redirect('home');
		         }elseif($data['grup_id']=='3'){ //akses resepsionis
		            $this->session->set_userdata('akses','3');
								$this->session->set_userdata('ses_id',$data['code_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('home');
		         }elseif($data['grup_id']=='4'){ //akses kasir
		            $this->session->set_userdata('akses','4');
								$this->session->set_userdata('ses_id',$data['code_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		             redirect('home');
		         }elseif($data['grup_id']=='5'){ //akses ketua klinik
		            $this->session->set_userdata('akses','5');
								$this->session->set_userdata('ses_id',$data['code_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		             redirect('home');
		         }

        }else {
                $this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Username atau Password</strong>
                              </div>');
	            redirect();
				
        }

    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}
