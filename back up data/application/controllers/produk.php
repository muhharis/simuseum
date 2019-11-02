<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Produk";
		$isi['fill'] = "master/farmasi/produk/vproduk";

		$isi['data'] = $this->master_model->get_bar();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_gb = $this->db->select('*')->from('r_grup_barang')->get();
		$get_kb = $this->db->select('*')->from('r_kategori_brg')->get();
		$get_bds = $this->db->select('*')->from('r_satuan')->get();
		
		$isi['title'] = "Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Tambah Data Produk";
		$isi['fill'] = "master/farmasi/produk/tproduk";

		$isi['kode_barang']	    = '';
		$isi['nm_barang']	    = '';
		$isi['addgb'] = $get_gb->result();
		$isi['addkb'] = $get_kb->result();
		$isi['addbds'] = $get_bds->result();
		$isi['spesifikasi'] 		= '';
		$isi['foto_brg'] 		= '';
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_gb = $this->db->select('*')->from('r_grup_barang')->get();
		$get_kb = $this->db->select('*')->from('r_kategori_brg')->get();
		$get_bds = $this->db->select('*')->from('r_satuan')->get();

		$isi['title'] = "Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Ubah Data Produk";
		$isi['fill'] = "master/farmasi/produk/eproduk";

		$key = $this->uri->segment(3);
		$this->db->where('kode_barang', $key);
		$query = $this->db->get('m_barang');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode_barang']			= $row->kode_barang;
				$isi['nm_barang']			= $row->nm_barang;
				$isi['addgb'] 				= $get_gb->result();
				$isi['addkb'] 				= $get_kb->result();
				$isi['addbds'] 				= $get_bds->result();
				$isi['spesifikasi']			= $row->spesifikasi;
				$isi['foto_brg']			= $row->foto_brg;
				$isi['is_aktif']			= $row->is_aktif;
			}
		}
		else {
				$isi['kode_barang']			= '';
				$isi['nm_barang']			= '';
				$isi['addgb'] 				= '';
				$isi['addkb'] 				= '';
				$isi['addbds'] 				= '';
				$isi['spesifikasi']			= '';
				$isi['foto_brg'] 			= '';
				$isi['is_aktif']			= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kode_barang');
		$data_bar['kode_barang'] = $this->input->post('kode_barang');
		$data_bar['nm_barang'] = $this->input->post('nm_barang');
		$data_bar['grup_brg_id'] = $this->input->post('grup_brg_id');
		$data_bar['kategori_brg_id'] = $this->input->post('kategori_brg_id');
		$data_bar['satuan_id'] = $this->input->post('satuan_id');
		$data_bar['spesifikasi'] = $this->input->post('spesifikasi');
		$data_bar['foto_brg'] = $this->input->post('foto_brg');
		$data_bar['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_barang($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_bar($key,$data_bar);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_bar($data_bar);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('produk');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kode_barang', $key);
		$query = $this->db->get('m_barang');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_bar($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('produk');
	}

}
