<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaanhadiah extends CI_Controller {
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
		$isi['title'] = "Daftar Penerimaan Hadiah";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Hadiah";
		$isi['m4'] = "Daftar Penerimaan Hadiah";
		$isi['fill'] = "inventori/hadiah/penerimaanhadiah/vpenerimaanhadiah";
		//$isi['kodeunik'] = $this->master_model->buat_kode();
		$isi['data'] = $this->master_model->get_penha();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_hd = $this->db->select('*')->from('m_hadiah')->get();

		$isi['title'] = "Daftar Penerimaan Hadiah";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Hadiah";
		$isi['m4'] = "Daftar Penerimaan Hadiah";
		$isi['fill'] = "inventori/hadiah/penerimaanhadiah/tpenerimaanhadiah";

		$isi['addhd'] = $get_hd->result();

		$isi['kode_penerimaan_hadiah'] = '';
		$isi['tanggal_penerimaan']	    = '';
		$isi['jam'] 	= '';
		$isi['jumlah'] = '';
		$isi['ket']	    = '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_hd = $this->db->select('*')->from('m_hadiah')->get();

		$isi['title'] = "Daftar Penerimaan Hadiah";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Hadiah";
		$isi['m4'] = "Daftar Penerimaan Hadiah";
		$isi['fill'] = "inventori/hadiah/penerimaanhadiah/epenerimaanhadiah";

		$key = $this->uri->segment(3);
		$this->db->where('kode_penerimaan_hadiah', $key);
		$query = $this->db->get('t_penerimaan_hadiah_rinci');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['addhd'] = $get_hd->result();

				$isi['kode_penerimaan_hadiah'] = $row->kode_penerimaan_hadiah;
				$isi['tanggal_penerimaan']	    = $row->tanggal_penerimaan;
				$isi['jam'] 	= $row->jam;
				$isi['jumlah'] = $row->jumlah;
				$isi['ket']	    = $row->ket;
			}
		}
		else {
				$isi['kode_penerimaan_hadiah'] = '';
				$isi['tanggal_penerimaan']	    = '';
				$isi['jam'] 	= '';
				$isi['jumlah'] = '';
				$isi['ket']	    = '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){

		$key = $this->input->post('kode_penerimaan_hadiah');
		$data_penha['kode_penerimaan_hadiah'] = $this->input->post('kode_penerimaan_hadiah');
		$data_penha['tanggal_penerimaan'] = $this->input->post('tanggal_penerimaan');
		$data_penha['jam'] = $this->input->post('jam');
		$data_penha['id_hadiah'] = $this->input->post('id_hadiah');
		$data_penha['jumlah'] = $this->input->post('jumlah');
		$data_penha['ket'] = $this->input->post('ket');

		$this->load->model('master_model');
		$query = $this->master_model->get_penerimaanhadiah($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_penerimaanhadiah($key,$data_penha);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_penerimaanhadiah($data_penha);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('penerimaanhadiah');
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('kode_penerimaan_hadiah', $key);
		$query = $this->db->get('t_penerimaan_hadiah_rinci');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_penerimaanhadiah($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('penerimaanhadiah');
	}

}
