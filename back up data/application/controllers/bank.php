<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Bank";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Bank";
		$isi['fill'] = "refrensi/bank/vbank";

		$isi['data'] = $this->db->get('r_bank');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Bank";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Tambah Data Bank";
		$isi['fill'] = "refrensi/bank/tbank";

		$isi['bank_id'] = '';
		$isi['bank']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Bank";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Data Pendaftaran";
		$isi['m4'] = "Ubah Data Bank";
		$isi['fill'] = "refrensi/bank/ebank";

		$key = $this->uri->segment(3);
		$this->db->where('bank_id', $key);
		$query = $this->db->get('r_bank');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['bank_id'] = $row->bank_id;
				$isi['bank']	= $row->bank;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['bank_id']	    = '';
				$isi['bank']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('bank_id');
		$data_bank['bank_id'] = $this->input->post('bank_id');
		$data_bank['bank'] = $this->input->post('bank');
		$data_bank['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_bank($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_bank($key,$data_bank);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_bank($data_bank);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('bank');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('bank_id', $key);
		$query = $this->db->get('r_bank');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_bank($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('bank');
	}

}
