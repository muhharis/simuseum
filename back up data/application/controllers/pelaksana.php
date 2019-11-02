<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaksana extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Pelaksana";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Pelaksana";
		$isi['fill'] = "master/pelayanan/pelaksana/vpelaksana";

		$isi['data'] = $this->master_model->get_pel();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_pp = $this->db->select('*')->from('r_peran_pelaksana')->get();

		$isi['title'] = "Pelaksana";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Tambah Data Pelaksana";
		$isi['fill'] = "master/pelayanan/pelaksana/tpelaksana";

		$isi['kode_pelaksana']	    = '';
		$isi['addperan'] = $get_pp->result();
		$isi['nama_pelaksana'] 		= '';
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_pp = $this->db->select('*')->from('r_peran_pelaksana')->get();
		
		$isi['title'] = "Pelaksana";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Edit Data Pelaksana";
		$isi['fill'] = "master/pelayanan/pelaksana/vpelaksana";

		$key = $this->uri->segment(3);
		$this->db->where('kode_pelaksana', $key);
		$query = $this->db->get('m_pelaksana');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode_pelaksana']		= $row->kode_pelaksana;
				$isi['addperan'] 	= $get_pp->result();
				$isi['nama_pelaksana']		= $row->nama_pelaksana;
				$isi['is_aktif']		= $row->is_aktif;
			}
		}
		else {
				$isi['kode_pelaksana']		= '';
				$isi['addperan'] 	= '';
				$isi['nama_pelaksana']		= '';
				$isi['is_aktif']		= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kode_pelaksana');
		$data_pel['kode_pelaksana'] = $this->input->post('kode_pelaksana');
		$data_pel['peran_pelaksana_id'] = $this->input->post('peran_pelaksana_id');
		$data_pel['nama_pelaksana'] = $this->input->post('nama_pelaksana');
		$data_pel['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_pelaksana($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_pel($key,$data_pel);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_pel($data_pel);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('pelaksana');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kode_pelaksana', $key);
		$query = $this->db->get('m_pelaksana');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pel($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('pelaksana');
	}

}
