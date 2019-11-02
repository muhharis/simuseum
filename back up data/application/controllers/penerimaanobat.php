<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaanobat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$get_pemasok = $this->db->select('*')->from('m_pemasok')->get();
		//$get_barang = $this->db->select('*')->from('m_barang')->get();
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Daftar Penerimaan Obat/Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Obat/Produk";
		$isi['m4'] = "Daftar Penerimaan Obat/Produk";
		$isi['fill'] = "inventori/obat/penerimaanobat/vpenerimaanobat";
		//$isi['kodeunik'] = $this->master_model->buat_kode();
		$isi['data'] = $this->master_model->get_pen();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_pemasok = $this->db->select('*')->from('m_pemasok')->get();
		$get_barang = $this->db->select('*')->from('m_barang')->get();

		$isi['title'] = "Daftar Penerimaan Obat/Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Obat/Produk";
		$isi['m4'] = "Tambah Daftar Penerimaan Obat/Produk";
		$isi['fill'] = "inventori/obat/penerimaanobat/tpenerimaanobat";

		//$isi['data'] = $this->master_model->get_pen();
		$isi['addbr'] = $get_barang->result();
		$isi['addpm'] = $get_pemasok->result();

		$isi['kode_penerimaan'] = '';
		$isi['tanggal_penerimaan']	    = '';
		$isi['jam'] 	= '';
		$isi['jumlah'] = '';
		$isi['ket']	    = '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_pemasok = $this->db->select('*')->from('m_pemasok')->get();
		$get_barang = $this->db->select('*')->from('m_barang')->get();

		$isi['title'] = "Daftar Penerimaan Obat/Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Obat/Produk";
		$isi['m4'] = "Ubah Daftar Penerimaan Obat/Produk";
		$isi['fill'] = "inventori/obat/penerimaanobat/epenerimaanobat";

		$key = $this->uri->segment(3);
		$this->db->where('kode_penerimaan', $key);
		$query = $this->db->get('t_penerimaan_rinci');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['addbr'] = $get_barang->result();
				$isi['addpm'] = $get_pemasok->result();

				$isi['kode_penerimaan'] = $row->kode_penerimaan;
				$isi['tanggal_penerimaan']	    = $row->tanggal_penerimaan;
				$isi['jam'] 	= $row->jam;
				$isi['jumlah'] = $row->jumlah;
				$isi['ket']	    = $row->ket;
			}
		}
		else {
				$isi['kode_penerimaan'] = '';
				$isi['tanggal_penerimaan']	    = '';
				$isi['jam'] 	= '';
				$isi['jumlah'] = '';
				$isi['ket']	    = '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){

		$key = $this->input->post('kode_penerimaan');
		$data_pen['kode_penerimaan'] = $this->input->post('kode_penerimaan');
		$data_pen['tanggal_penerimaan'] = $this->input->post('tanggal_penerimaan');
		$data_pen['jam'] = $this->input->post('jam');
		$data_pen['kode_pemasok'] = $this->input->post('kode_pemasok');
		$data_pen['kode_barang'] = $this->input->post('kode_barang');
		$data_pen['jumlah'] = $this->input->post('jumlah');
		$data_pen['ket'] = $this->input->post('ket');

		$this->load->model('master_model');
		$query = $this->master_model->get_penerimaan($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_pen($key,$data_pen);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_pen($data_pen);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('penerimaanobat');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('kode_penerimaan', $key);
		$query = $this->db->get('t_penerimaan_rinci');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pen($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('penerimaanobat');
	}

}
