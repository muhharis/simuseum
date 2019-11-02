<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propinsi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}
	
	public function index()
	{	
		$isi['title'] = "Propinsi";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Propinsi";
		$isi['fill'] = "refrensi/wilayah/propinsi/vprop";
		$isi['data'] = $this->db->get('r_prop');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Propinsi";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Tambah Data Propinsi";
		$isi['fill'] = "refrensi/wilayah/propinsi/tprop";
		$isi['kd_prop']	    = '';
		$isi['nm_prop'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kd_prop');
		$data['kd_prop'] = $this->input->post('kd_prop');
		$data['nm_prop'] = $this->input->post('nm_prop');

		$this->load->model('master_model');
		$query = $this->master_model->get_prop($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_prop($key,$data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_prop($data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('propinsi');
	}

	function ubah(){
		$isi['title'] = "Propinsi";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Ubah Data Propinsi";
		$isi['fill'] = "refrensi/wilayah/propinsi/eprop";

		$key = $this->uri->segment(3);
		$this->db->where('kd_prop', $key);
		$query = $this->db->get('r_prop');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kd_prop']	= $row->kd_prop;
				$isi['nm_prop']	= $row->nm_prop;
			}
		}
		else 
		{
				$isi['kd_prop']	    = '';
				$isi['nm_prop'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('kd_prop', $key);
		$query = $this->db->get('r_prop');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_prop($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('propinsi');
	}
}
