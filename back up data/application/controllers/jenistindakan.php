<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenistindakan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Grup Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Grup Tindakan";
		$isi['fill'] = "refrensi/pelayanan/gruptindakan/vgruptindakan";

		$isi['data'] = $this->db->get('r_grup_tindakan');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Grup Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Tambah Grup Tindakan";
		$isi['fill'] = "refrensi/pelayanan/gruptindakan/tgruptindakan";

		$isi['grup_tindakan_id'] = '';
		$isi['grup_tindakan']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Grup Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Ubah Grup Tindakan";
		$isi['fill'] = "refrensi/pelayanan/gruptindakan/egruptindakan";

		$key = $this->uri->segment(3);
		$this->db->where('grup_tindakan_id', $key);
		$query = $this->db->get('r_grup_tindakan');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['grup_tindakan_id'] = $row->grup_tindakan_id;
				$isi['grup_tindakan']	= $row->grup_tindakan;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['grup_tindakan_id']	    = '';
				$isi['grup_tindakan']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('grup_tindakan_id');
		$data_tindakan['grup_tindakan_id'] = $this->input->post('grup_tindakan_id');
		$data_tindakan['grup_tindakan'] = $this->input->post('grup_tindakan');
		$data_tindakan['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_gt($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_gt($key,$data_tindakan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_gt($data_tindakan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			
		}
		Redirect('jenistindakan');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('grup_tindakan_id', $key);
		$query = $this->db->get('r_grup_tindakan');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_gt($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('jenistindakan');
	}

}
