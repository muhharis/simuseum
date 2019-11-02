<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//this->model_sqrty->getsqrty();
		$isi['title'] = "Kecamatan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Kecamatan";
		$isi['fill'] = "refrensi/wilayah/kecamatan/vkec";

		$isi['data'] = $this->master_model->get_kecamatan();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_kab = $this->db->select('*')->from('r_kab')->get();
		$isi['title'] = "Kecamatan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Tambah Data Kecamatan";
		$isi['fill'] = "refrensi/wilayah/kecamatan/tkec";

		$isi['kabupaten'] = $get_kab->result();
		$isi['kd_kec']	    = '';
		$isi['nm_kec'] 		= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_kab = $this->db->select('*')->from('r_kab')->get();
		$isi['title'] = "Kecamatan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Ubah Data Kecamatan";
		$isi['fill'] = "refrensi/wilayah/kecamatan/ekec";

		$key = $this->uri->segment(3);
		$this->db->where('kd_kec', $key);
		$query = $this->db->get('r_kec');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['Kabupaten'] 	= $get_kab->result();
				$isi['kd_kec']		= $row->kd_kec;
				$isi['nm_kec']		= $row->nm_kec;
			}
		}
		else {
				$isi['kabupaten'] 	= '';
				$isi['kd_kec']		= '';
				$isi['nm_kec']		= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kd_kec');
		$data_kec['kd_kab'] = $this->input->post('kd_kab');
		$data_kec['kd_kec'] = $this->input->post('kd_kec');
		$data_kec['nm_kec'] = $this->input->post('nm_kec');

		$this->load->model('master_model');
		$query = $this->master_model->get_kec($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_kec($key,$data_kec);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_kec($data_kec);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('Kecamatan');
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kd_kec', $key);
		$query = $this->db->get('r_kec');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_kec($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('Kecamatan');
	}

}
