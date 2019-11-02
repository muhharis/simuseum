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

class Agama extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Agama";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Agama";
		$isi['fill'] = "refrensi/datapendaftaran/agama/vagama";

		$isi['data'] = $this->db->get('r_agama');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Agama";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Tambah Data gama";
		$isi['fill'] = "refrensi/datapendaftaran/agama/tagama";
		//$isi['kodeunik2'] = $this->master_model->buat_kode_agama();
		$isi['agama_id'] = '';
		$isi['agama']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Agama";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Ubah Data Agama";
		$isi['fill'] = "refrensi/datapendaftaran/agama/eagama";

		$key = $this->uri->segment(3);
		$this->db->where('agama_id', $key);
		$query = $this->db->get('r_agama');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['agama_id'] = $row->agama_id;
				$isi['agama']	= $row->agama;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['agama_id']	    = '';
				$isi['agama']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('agama_id');
		$data_agama['agama_id'] = $this->input->post('agama_id');
		$data_agama['agama'] = $this->input->post('agama');
		$data_agama['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_agama($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_agama($key,$data_agama);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
			Redirect('agama/tambah');
		} 
		else 
		{
			$this->master_model->getinsert_agama($data_agama);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			Redirect('agama/tambah');
		}
			//Redirect('agama');
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('agama_id', $key);
		$query = $this->db->get('r_agama');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_agama($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('agama');
	}

}
