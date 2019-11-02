<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Pekerjaan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Pekerjaan";
		$isi['fill'] = "refrensi/datapendaftaran/pekerjaan/vpekerjaan";

		$isi['data'] = $this->db->get('r_pekerjaan');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Pekerjaan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Tambah Data Pekerjaan";
		$isi['fill'] = "refrensi/datapendaftaran/pekerjaan/tpekerjaan";

		$isi['id_pekerjaan'] = '';
		$isi['pekerjaan']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Pekerjaan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Ubah Data Pekerjaan";
		$isi['fill'] = "refrensi/datapendaftaran/pekerjaan/epekerjaan";

		$key = $this->uri->segment(3);
		$this->db->where('id_pekerjaan', $key);
		$query = $this->db->get('r_pekerjaan');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['id_pekerjaan'] = $row->id_pekerjaan;
				$isi['pekerjaan']	= $row->pekerjaan;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['id_pekerjaan']	    = '';
				$isi['pekerjaan']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('id_pekerjaan');
		$data_pek['id_pekerjaan'] = $this->input->post('id_pekerjaan');
		$data_pek['pekerjaan'] = $this->input->post('pekerjaan');
		$data_pek['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_pek($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_pek($key,$data_pek);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_pek($data_pek);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('pekerjaan');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('id_pekerjaan', $key);
		$query = $this->db->get('r_pekerjaan');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pek($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('pekerjaan');
	}

}
