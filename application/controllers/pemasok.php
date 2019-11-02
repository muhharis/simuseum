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
class Pemasok extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Pemasok";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "pengadaan";
		$isi['m4'] = "Pemasok";
		$isi['fill'] = "master/pengadaan/pemasok/vpemasok";

		$isi['data'] = $this->db->get('m_pemasok');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Pemasok";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "pengadaan";
		$isi['m4'] = "Pemasok";
		$isi['fill'] = "master/pengadaan/pemasok/tpemasok";
		$isi['kodeunik2'] = $this->master_model->buat_kode_pemasok();
		$isi['kode_pemasok']	    = '';
		$isi['nm_pemasok'] 	= '';
		$isi['no_ktp']	    = '';
		$isi['alamat'] 	= '';
		$isi['kota']	    = '';
		$isi['telp'] 	= '';
		$isi['ket']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Pemasok";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "pengadaan";
		$isi['m4'] = "Pemasok";
		$isi['fill'] = "master/pengadaan/pemasok/epemasok";

		$key = $this->uri->segment(3);
		$this->db->where('kode_pemasok', $key);
		$query = $this->db->get('m_pemasok');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode_pemasok']	    = $row->kode_pemasok;
				$isi['nm_pemasok'] 			= $row->nm_pemasok;
				$isi['no_ktp']	  			= $row->no_ktp;
				$isi['alamat'] 				= $row->alamat;
				$isi['kota']	    		= $row->kota;
				$isi['telp'] 				= $row->telp;
				$isi['ket']	    			= $row->ket;
				$isi['is_aktif'] 			= $row->is_aktif;
			}
		}
		else 
		{
				$isi['kode_pemasok']	    = '';
				$isi['nm_pemasok'] 			= '';
				$isi['no_ktp']	  			= '';
				$isi['alamat'] 				= '';
				$isi['kota']	    		= '';
				$isi['telp'] 				= '';
				$isi['ket']	    			= '';
				$isi['is_aktif'] 			= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kode_pemasok');
		$data_pemasok['kode_pemasok'] = $this->input->post('kode_pemasok');
		$data_pemasok['nm_pemasok'] = $this->input->post('nm_pemasok');
		$data_pemasok['no_ktp'] = $this->input->post('no_ktp');
		$data_pemasok['alamat'] = $this->input->post('alamat');
		$data_pemasok['kota'] = $this->input->post('kota');
		$data_pemasok['telp'] = $this->input->post('telp');
		$data_pemasok['ket'] = $this->input->post('ket');
		$data_pemasok['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_pemasok($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_pemasok($key,$data_pemasok);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_pemasok($data_pemasok);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('pemasok');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('kode_pemasok', $key);
		$query = $this->db->get('m_pemasok');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pemasok($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('pemasok');
	}

}
