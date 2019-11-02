<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Pendidikan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Pendidikan";
		$isi['fill'] = "refrensi/datapendaftaran/pendidikan/vpendidikan";

		$isi['data'] = $this->db->get('r_pend');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Pendidikan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Tambah Data Pendidikan";
		$isi['fill'] = "refrensi/datapendaftaran/pendidikan/tpendidikan";

		$isi['pend_id'] = '';
		$isi['pendidikan']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Pendidikan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Ubah Data Pendidikan";
		$isi['fill'] = "refrensi/datapendaftaran/pendidikan/ependidikan";

		$key = $this->uri->segment(3);
		$this->db->where('pend_id', $key);
		$query = $this->db->get('r_pend');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['pend_id'] = $row->pend_id;
				$isi['pendidikan']	= $row->pendidikan;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['pend_id']	    = '';
				$isi['pendidikan']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('pend_id');
		$data_pend['pend_id'] = $this->input->post('pend_id');
		$data_pend['pendidikan'] = $this->input->post('pendidikan');
		$data_pend['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_pend($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_pend($key,$data_pend);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_pend($data_pend);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
			Redirect('pendidikan');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('pend_id', $key);
		$query = $this->db->get('r_pend');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pend($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('pendidikan');
	}

}
