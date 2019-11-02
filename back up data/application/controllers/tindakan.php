<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Daftar Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Tindakan";
		$isi['fill'] = "master/pelayanan/tindakan/vtindakan";

		$isi['data'] = $this->master_model->get_tin();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_gt = $this->db->select('*')->from('r_grup_tindakan')->get();

		$isi['title'] = "Daftar Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Tambah Data Tindakan";
		$isi['fill'] = "master/pelayanan/tindakan/ttindakan";

		$isi['kode_tindakan']	    = '';
		$isi['addgt'] = $get_gt->result();
		$isi['tindakan'] 		= '';
		$isi['s_pelaksana'] 		= '';
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_gt = $this->db->select('*')->from('r_grup_tindakan')->get();
		
		$isi['title'] = "Daftar Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Tindakan";
		$isi['fill'] = "master/pelayanan/tindakan/etindakan";

		$key = $this->uri->segment(3);
		$this->db->where('kode_tindakan', $key);
		$query = $this->db->get('m_tindakan');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['addgt']		= $get_gt->result();
				$isi['kode_tindakan'] 	= $row->kode_tindakan;
				$isi['tindakan']		= $row->tindakan;
				$isi['s_pelaksana']		= $row->s_pelaksana;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {
				$isi['grup_tindakan']		= '';
				$isi['kode_tindakan'] 	= '';
				$isi['tindakan']		='';
				$isi['s_pelaksana']		= '';
				$isi['is_aktif']	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kode_tindakan');
		$data_tin['grup_tindakan_id'] = $this->input->post('grup_tindakan_id');
		$data_tin['kode_tindakan'] = $this->input->post('kode_tindakan');
		$data_tin['tindakan'] = $this->input->post('tindakan');
		$data_tin['s_pelaksana'] = $this->input->post('s_pelaksana');
		$data_tin['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_tindakan($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_tin($key,$data_tin);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_tin($data_tin);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('tindakan');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kode_tindakan', $key);
		$query = $this->db->get('m_tindakan');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_tin($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('tindakan');
	}

}
