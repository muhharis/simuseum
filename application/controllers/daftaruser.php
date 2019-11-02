<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
class Daftaruser extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$isi['data'] = $this->db->get('master_model');
		//$this->load->view('v_daftar', $isi);
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Daftar Pengguna";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pengguna";
		$isi['m4'] = "Daftar Pengguna";
		$isi['fill'] = "master/pengguna/daftarpengguna/vdaftarpengguna";
		//$isi['data'] = $this->db->get('user');
		//$isi['data'] = $this->db->get('r_bank');
		$isi['data'] = $this->master_model->get_daftar();
		$this->load->view('vhome', $isi);
	}
	

function tambah(){
		$get_grup = $this->db->select('*')->from('grup')->get();

		$isi['title'] = "Tambah Daftar Pengguna";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pengguna";
		$isi['m4'] = "Daftar Pengguna";
		$isi['fill'] = "master/pengguna/daftarpengguna/tdaftarpengguna";

		$isi['code_user']	    = '';
		$isi['nama']	    = '';
		$isi['pass']	    = '';
		$isi['addgrup'] = $get_grup->result();
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_grup = $this->db->select('*')->from('grup')->get();

		$isi['title'] = "Ubah Daftar Pengguna";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pengguna";
		$isi['m4'] = "Daftar Pengguna";
		$isi['fill'] = "master/pengguna/daftarpengguna/edaftarpengguna";
		$key = $this->uri->segment(3);
		$this->db->where('code_user', $key);
		$query = $this->db->get('user');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['code_user']		= $row->code_user;
				$isi['nama']		= $row->nama;
				$isi['pass']		= $row->pass;
				$isi['addgrup'] = $get_grup->result();
				$isi['is_aktif']		= $row->is_aktif;
			}
		}
		else {
				$isi['code_user']		= '';
				$isi['nama']		= '';
				$isi['pass']		= '';
				$isi['addgrup'] = '';
				$isi['is_aktif']		= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('code_user');
		$datauser['grup_id'] = $this->input->post('grup_id');
		$datauser['code_user'] = $this->input->post('code_user');
		$datauser['nama'] = $this->input->post('nama');
		$datauser['pass'] = md5($_POST['pass']);
		$datauser['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_user_daftar($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_user_daftar($key,$datauser);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_user_daftar($datauser);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			
		}
		Redirect('Daftaruser');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('code_user', $key);
		$query = $this->db->get('user');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_user_daftar($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('Daftaruser');
	}
}