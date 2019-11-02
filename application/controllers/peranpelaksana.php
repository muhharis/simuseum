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
class Peranpelaksana extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Peran Pelaksana";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Peran Pelaksana";
		$isi['fill'] = "refrensi/pelayanan/peranpelaksana/vperanpelaksana";

		$isi['data'] = $this->db->get('r_peran_pelaksana');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Peran Pelaksana";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Tambah Data Peran Pelaksana";
		$isi['fill'] = "refrensi/pelayanan/peranpelaksana/tperanpelaksana";
		$isi['kodeunik2'] = $this->master_model->buat_kode_peran_pelaksana();
		$isi['peran_pelaksana_id'] = '';
		$isi['peran_pelaksana']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Peran Pelaksana";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Ubah Data Peran Pelaksana";
		$isi['fill'] = "refrensi/pelayanan/peranpelaksana/eperanpelaksana";

		$key = $this->uri->segment(3);
		$this->db->where('peran_pelaksana_id', $key);
		$query = $this->db->get('r_peran_pelaksana');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['peran_pelaksana_id'] = $row->peran_pelaksana_id;
				$isi['peran_pelaksana']	= $row->peran_pelaksana;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['peran_pelaksana_id']	    = '';
				$isi['peran_pelaksana']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('peran_pelaksana_id');
		$data_peran['peran_pelaksana_id'] = $this->input->post('peran_pelaksana_id');
		$data_peran['peran_pelaksana'] = $this->input->post('peran_pelaksana');
		$data_peran['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_pp($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_pp($key,$data_peran);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
			Redirect('peranpelaksana/tambah');
		} 
		else 
		{
			$this->master_model->getinsert_pp($data_peran);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			Redirect('peranpelaksana/tambah');
		}
		//Redirect('peranpelaksana');
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('peran_pelaksana_id', $key);
		$query = $this->db->get('r_peran_pelaksana');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pp($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('peranpelaksana');
	}

}
