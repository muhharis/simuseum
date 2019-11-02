<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hadiah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Hadiah";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Hadiah";
		$isi['fill'] = "master/hadiah/vhadiah";

		$isi['data'] = $this->db->get('m_hadiah');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Hadiah";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Tambah Data Daftar Hadiah";
		$isi['fill'] = "master/hadiah/thadiah";

		$isi['hadiah_id'] = '';
		$isi['hadiah']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Hadiah";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Ubah Data Daftar Hadiah";
		$isi['fill'] = "master/hadiah/ehadiah";

		$key = $this->uri->segment(3);
		$this->db->where('id_hadiah', $key);
		$query = $this->db->get('m_hadiah');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['id_hadiah'] = $row->id_hadiah;
				$isi['hadiah']	= $row->hadiah;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['id_hadiah']	    = '';
				$isi['hadiah']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('id_hadiah');
		$data_hd['id_hadiah'] = $this->input->post('id_hadiah');
		$data_hd['hadiah'] = $this->input->post('hadiah');
		$data_hd['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_hd($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_hd($key,$data_hd);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_hd($data_hd);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
			Redirect('hadiah');
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('id_hadiah', $key);
		$query = $this->db->get('m_hadiah');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_hd($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('hadiah');
	}

}
