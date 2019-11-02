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
class Statuskawin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Status Kawin";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Status Kawin";
		$isi['fill'] = "refrensi/datapendaftaran/statuskawin/vstatuskawin";

		$isi['data'] = $this->db->get('r_status_kawin');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Status Kawin";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Tambah Data Status Kawin";
		//$isi['fill'] = "refrensi/datapendaftaran/statuskawin/tstatuskawin";
		$isi['kodeunik2'] = $this->master_model->buat_kode_sk();
		$isi['id_sk'] = '';
		$isi['status_kawin']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Status Kawin";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Ubah Data Status Kawin";
		$isi['fill'] = "refrensi/datapendaftaran/statuskawin/estatuskawin";

		$key = $this->uri->segment(3);
		$this->db->where('id_sk', $key);
		$query = $this->db->get('r_status_kawin');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['id_sk'] = $row->id_sk;
				$isi['status_kawin']	= $row->status_kawin;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['id_sk']	    = '';
				$isi['status_kawin']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('id_sk');
		$data_sk['id_sk'] = $this->input->post('id_sk');
		$data_sk['status_kawin'] = $this->input->post('status_kawin');
		$data_sk['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_statuskawin($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_statuskawin($key,$data_sk);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_statuskawin($data_sk);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('statuskawin');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('id_sk', $key);
		$query = $this->db->get('r_status_kawin');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_statuskawin($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('statuskawin');
	}

}
