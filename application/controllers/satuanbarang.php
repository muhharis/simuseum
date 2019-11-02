<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* File			: Klinik2.php
* Language		: PHP
* Package		: CodeIgniter 3.0
* Location		: application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author    	: MuhHaris
* Email     	:muhharis90@yahoo.com
* HP			: 089-537-625-7021
*/
// ------------------------------------------------------------------------
class Satuanbarang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Satuan Barang atau Obat";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Satuan Barang atau Obat";
		$isi['fill'] = "refrensi/farmasi/satuanbarang/vsatuanbarang";

		$isi['data'] = $this->db->get('r_satuan');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Satuan Barang atau Obat";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Tambah Data Satuan Barang atau Obat";
		$isi['fill'] = "refrensi/farmasi/satuanbarang/tsatuanbarang";
		$isi['kodeunik2'] = $this->master_model->buat_kode_satuan_brg();
		$isi['satuan_id'] = '';
		$isi['satuan']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Satuan Barang atau Obat";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Tambah Data Satuan Barang atau Obat";
		$isi['fill'] = "refrensi/farmasi/satuanbarang/esatuanbarang";

		$key = $this->uri->segment(3);
		$this->db->where('satuan_id', $key);
		$query = $this->db->get('r_satuan');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['satuan_id'] = $row->satuan_id;
				$isi['satuan']	= $row->satuan;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['satuan_id']	    = '';
				$isi['satuan']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('satuan_id');
		$data_satuan['satuan_id'] = $this->input->post('satuan_id');
		$data_satuan['satuan'] = $this->input->post('satuan');
		$data_satuan['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_bds($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_bds($key,$data_satuan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
			Redirect('satuanbarang/tambah');
		} 
		else 
		{
			$this->master_model->getinsert_bds($data_satuan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			Redirect('satuanbarang/tambah');
		}
		//Redirect('satuanbarang');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('satuan_id', $key);
		$query = $this->db->get('r_satuan');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_bds($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('satuanbarang');
	}

}
