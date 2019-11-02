<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekbank extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Rekening Bank Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Rekening Bank Klinik";
		$isi['fill'] = "refrensi/rekbank/vrekbank";

		$isi['data'] = $this->master_model->get_rek();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_bank = $this->db->select('*')->from('r_bank')->get();

		$isi['title'] = "Rekening Bank Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Tambah Data Rekening Bank Klinik";
		$isi['fill'] = "refrensi/rekbank/trekbank";

		$isi['rek_id']	    = '';
		$isi['addbank'] = $get_bank->result();
		$isi['no_rek'] 		= '';
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_bank = $this->db->select('*')->from('r_bank')->get();

		$isi['title'] = "Rekening Bank Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Ubah Data Rekening Bank Klinik";
		$isi['fill'] = "refrensi/rekbank/erekbank";

		$key = $this->uri->segment(3);
		$this->db->where('rek_id', $key);
		$query = $this->db->get('r_rekening');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['rek_id']		= $row->rek_id;
				$isi['addbank'] 	= $get_bank->result();
				$isi['no_rek']		= $row->no_rek;
				$isi['is_aktif']		= $row->is_aktif;
			}
		}
		else {
				$isi['rek_id']		= '';
				$isi['addbank'] 		= '';
				$isi['no_rek']		= '';
				$isi['is_aktif']	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('rek_id');
		$data_rek['bank_id'] = $this->input->post('bank_id');
		$data_rek['rek_id'] = $this->input->post('rek_id');
		$data_rek['no_rek'] = $this->input->post('no_rek');
		$data_rek['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_rekening($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_rek($key,$data_rek);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_rek($data_rek);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			
		}
		Redirect('Rekbank');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('rek_id', $key);
		$query = $this->db->get('r_rekening');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_rek($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('Rekbank');
	}

}
