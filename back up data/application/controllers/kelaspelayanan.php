<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelaspelayanan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Kelas pelayanan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Kelas Pelayanan";
		$isi['fill'] = "refrensi/pelayanan/kelaspelayanan/vkelaspelayanan";

		$isi['data'] = $this->db->get('r_kelas');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Tambah Kelas pelayanan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Tambah Data Kelas Pelayanan";
		$isi['fill'] = "refrensi/pelayanan/kelaspelayanan/tkelaspelayanan";

		$isi['kelas_id']	    = '';
		$isi['kelas'] 		= '';
		$isi['is_aktif'] 		= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Edit Kelas pelayanan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Ubah Data  Kelas Pelayanan";
		$isi['fill'] = "refrensi/pelayanan/kelaspelayanan/ekelaspelayanan";

		$key = $this->uri->segment(3);
		$this->db->where('kelas_id', $key);
		$query = $this->db->get('r_kelas');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['kelas_id'] = $row->kelas_id;
				$isi['kelas']	= $row->kelas;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['kelas_id']	    = '';
				$isi['kelas']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kelas_id');
		$data_kel_pel['kelas_id'] = $this->input->post('kelas_id');
		$data_kel_pel['kelas'] = $this->input->post('kelas');
		$data_kel_pel['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_kelas_pel($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_kelas_pel($key,$data_kel_pel);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_kelas_pel($data_kel_pel);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('kelaspelayanan');
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('kelas_id', $key);
		$query = $this->db->get('r_kelas');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_kelas_pel($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('kelaspelayanan');
	}

}
