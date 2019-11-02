<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Kelurahan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Kelurahan";
		$isi['fill'] = "refrensi/wilayah/kelurahan/vkel";

		$isi['data'] = $this->master_model->get_kelurahan();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_kec = $this->db->select('*')->from('r_kec')->get();
		$isi['title'] = "Kelurahan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Tambah Data Kelurahan";
		$isi['fill'] = "refrensi/wilayah/kelurahan/tkel";

		$isi['kecamatan'] = $get_kec->result();
		$isi['kd_kel']	    = '';
		$isi['nm_kel'] 		= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_kec = $this->db->select('*')->from('r_kec')->get();
		$isi['title'] = "Kelurahan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Wilayah";
		$isi['m4'] = "Ubah Data Kelurahan";
		$isi['fill'] = "refrensi/wilayah/kelurahan/ekel";

		$key = $this->uri->segment(3);
		$this->db->where('kd_kel', $key);
		$query = $this->db->get('r_kel');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kecamatan'] 	= $get_kec->result();
				$isi['kd_kel']		= $row->kd_kel;
				$isi['nm_kel']		= $row->nm_kel;
			}
		}
		else {
				$isi['kecamatan'] 	= '';
				$isi['kd_kel']		= '';
				$isi['nm_kel']		= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kd_kel');
		$data_kel['kd_kec'] = $this->input->post('kd_kec');
		$data_kel['kd_kel'] = $this->input->post('kd_kel');
		$data_kel['nm_kel'] = $this->input->post('nm_kel');

		$this->load->model('master_model');
		$query = $this->master_model->get_kel($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_kel($key,$data_kel);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_kel($data_kel);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('Kelurahan');
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kd_kel', $key);
		$query = $this->db->get('r_kel');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_kel($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('kelurahan');
	}

}
