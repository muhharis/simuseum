<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoribarang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Kategori Barang atau Obat";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Kategori Barang atau Obat";
		$isi['fill'] = "refrensi/farmasi/kategoribarang/vkategoribarang";

		$isi['data'] = $this->db->get('r_kategori_brg');
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$isi['title'] = "Tambah Kategori Barang atau Obat";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Farmasi";
		$isi['m4'] = "Tambah Data Kategori Barang atau Obat";
		$isi['fill'] = "refrensi/farmasi/kategoribarang/tkategoribarang";

		$isi['kategori_brg_id'] = '';
		$isi['kategori_brg']	    = '';
		$isi['is_aktif'] 	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$isi['title'] = "Edit Kategori Barang atau Obat";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Referensi";
		$isi['m3'] = "Pelayanan";
		$isi['m4'] = "Ubah Data Kategori Barang atau Obat";
		$isi['fill'] = "refrensi/farmasi/kategoribarang/ekategoribarang";

		$key = $this->uri->segment(3);
		$this->db->where('Kategori_brg_id', $key);
		$query = $this->db->get('r_kategori_brg');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['kategori_brg_id'] = $row->kategori_brg_id;
				$isi['kategori_brg']	= $row->kategori_brg;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {	
				$isi['kategori_brg_id']	    = '';
				$isi['kategori_brg']	    = '';
				$isi['is_aktif'] 	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kategori_brg_id');
		$data_kb['kategori_brg_id'] = $this->input->post('kategori_brg_id');
		$data_kb['kategori_brg'] = $this->input->post('kategori_brg');
		$data_kb['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_kb($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_kb($key,$data_kb);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 
		else 
		{
			$this->master_model->getinsert_kb($data_kb);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('kategoribarang');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('Kategori_brg_id', $key);
		$query = $this->db->get('r_kategori_brg');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_kb($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('kategoribarang');
	}

}
