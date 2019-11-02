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
class Editpass extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$this->load->model('master_model');
		$isi['title'] = "Edit Password";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pengguna";
		$isi['m4'] = "Edit Password";
		$isi['fill'] = "master/pengguna/editpass/editpass";

		$isi['data'] = $this->master_model->get_daftar();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_pp = $this->db->select('*')->from('r_peran_pelaksana')->get();

		$isi['title'] = "Tambah Daftar Pengguna";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pengguna";
		$isi['m4'] = "Daftar Pengguna";
		$isi['fill'] = "master/pengguna/daftarpengguna/tdaftarpengguna";

		$isi['id']	    = '';
		$isi['nama']	    = '';
		$isi['username']	    = '';
		$isi['pass']	    = '';
		$isi['addpp'] = $get_pp->result();
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_pp = $this->db->select('*')->from('r_peran_pelaksana')->get();

		$isi['title'] = "Ubah Daftar Pengguna";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pengguna";
		$isi['m4'] = "Daftar Pengguna";
		$isi['fill'] = "master/pengguna/daftarpengguna/edaftarpengguna";
		$key = $this->uri->segment(3);
		$this->db->where('id', $key);
		$query = $this->db->get('user');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['id']		= $row->id;
				$isi['nama']		= $row->nama;
				$isi['username']		= $row->username;
				$isi['pass']		= $row->pass;
				$isi['addpp'] = $get_pp->result();
				$isi['is_aktif']		= $row->is_aktif;
			}
		}
		else {
				$isi['id']		= '';
				$isi['nama']		= '';
				$isi['username']		= '';
				$isi['pass']		= '';
				$isi['addpp'] = '';
				$isi['is_aktif']		= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('id');
		$datauser['peran_pelaksana_id'] = $this->input->post('peran_pelaksana_id');
		$datauser['id'] = $this->input->post('id');
		$datauser['nama'] = $this->input->post('nama');
		$datauser['username'] = $this->input->post('username');
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
		$this->db->where('id', $key);
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

