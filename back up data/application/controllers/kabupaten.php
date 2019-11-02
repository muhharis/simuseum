<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Kabupaten";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Kabupaten";
		$isi['fill'] = "refrensi/wilayah/kabupaten/vkab";

		$isi['data'] = $this->master_model->get_kabupaten();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_prop = $this->db->select('*')->from('r_prop')->get();
		$isi['title'] = "Kabupaten";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Tambah Data Kabupaten";
		$isi['fill'] = "refrensi/wilayah/kabupaten/tkab";
		$isi['propinsi'] = $get_prop->result();
		$isi['kd_kab']	    = '';
		$isi['nm_kab'] 		= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_prop = $this->db->select('*')->from('r_prop')->get();
		$isi['title'] = "Kabupaten";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Ubah Dat Kabupaten";
		$isi['fill'] = "refrensi/wilayah/kabupaten/ekab";

		$key = $this->uri->segment(3);
		$this->db->where('kd_kab', $key);
		$query = $this->db->get('r_kab');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['propinsi'] 	= $get_prop->result();
				$isi['kd_kab']		= $row->kd_kab;
				$isi['nm_kab']		= $row->nm_kab;
			}
		}
		else {
				$isi['propinsi'] 	= '';
				$isi['kd_kab']		= '';
				$isi['nm_kab']		= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kd_kab');
		$data_kab['kd_prop'] = $this->input->post('kd_prop');
		$data_kab['kd_kab'] = $this->input->post('kd_kab');
		$data_kab['nm_kab'] = $this->input->post('nm_kab');

		$this->load->model('master_model');
		$query = $this->master_model->get_kab($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_kab($key,$data_kab);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_kab($data_kab);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('kabupaten');
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kd_kab', $key);
		$query = $this->db->get('r_kab');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_kab($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('kabupaten');
	}

}
