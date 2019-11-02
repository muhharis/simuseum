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
class Hargabeli extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Harga Beli";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Harga Beli";
		$isi['fill'] = "master/tarif/hargabeli/vhargabeli";

		$isi['data'] = $this->master_model->get_harbel();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_barang = $this->db->select('*')->from('m_barang')->get();
		$get_kb = $this->db->select('*')->from('r_kategori_brg')->get();
		
		$isi['title'] = "Harga Beli";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Tambah Harga Beli";
		$isi['fill'] = "master/tarif/hargabeli/thargabeli";
		$isi['kodeunik2'] = $this->master_model->buat_kode_harbel();
		$isi['addbrg'] = $get_barang->result();
		$isi['addkb'] = $get_kb->result();

		$isi['harga_beli_id']	    = '';
		$isi['harga_beli']	    = '';
		$isi['tgl_berlaku']	    = '';
		$isi['ket'] 		= '';
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_barang = $this->db->select('*')->from('m_barang')->get();
		$get_kb = $this->db->select('*')->from('r_kategori_brg')->get();
		
		$isi['title'] = "Harga Beli";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Ubah Harga Beli";
		$isi['fill'] = "master/tarif/hargabeli/ehargabeli";

		$key = $this->uri->segment(3);
		$this->db->where('harga_beli_id', $key);
		$query = $this->db->get('t_harga_beli');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['addbrg'] = $get_barang->result();
				$isi['addkb'] = $get_kb->result();

				$isi['harga_beli_id']	= $row->harga_beli_id;
				$isi['harga_beli']		= $row->harga_beli;
				$isi['tgl_berlaku']		= $row->tgl_berlaku;
				$isi['ket'] 			= $row->ket;
			}
		}
		else {
				$isi['addbrg'] = '';
				$isi['addkb'] = '';

				$isi['harga_beli_id']	= '';
				$isi['harga_beli']		= '';
				$isi['tgl_berlaku']		= '';
				$isi['ket'] 			= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('harga_beli_id');

		$data_harga_beli['harga_beli_id'] = $this->input->post('harga_beli_id');
		$data_harga_beli['kode_barang'] = $this->input->post('kode_barang');
		$data_harga_beli['kategori_brg_id'] = $this->input->post('kategori_brg_id');
		$data_harga_beli['harga_beli'] = $this->input->post('harga_beli');
		$data_harga_beli['tgl_berlaku'] = $this->input->post('tgl_berlaku');
		$data_harga_beli['ket'] = $this->input->post('ket');

		$this->load->model('master_model');
		$query = $this->master_model->get_harga_beli($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_harga_beli($key,$data_harga_beli);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_harga_beli($data_harga_beli);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('hargabeli');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('harga_beli_id', $key);
		$query = $this->db->get('t_harga_beli');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_harga_beli($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('hargabeli');
	}

}
