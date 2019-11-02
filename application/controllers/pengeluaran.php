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
class Pengeluaran extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Pengeluaran Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Data Pengeluaran Klinik";
		$isi['m4'] = "Pengeluaran Klinik";
		$isi['fill'] = "billing/pengeluaranklinik/vpengeluaran";

		$isi['data'] = $this->master_model->get_peng();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_jen_peng = $this->db->select('*')->from('r_jenis_pengeluaran')->get();

		$isi['title'] = "Pengeluaran Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Tambah Data Pengeluaran Klinik";
		$isi['m4'] = "Pengeluaran Klinik";
		$isi['fill'] = "billing/pengeluaranklinik/tpengeluaran";

		$isi['kodeunik2'] = $this->master_model->buat_kode_pengeluaran();

		$isi['pengeluaran_id']	    = '';
		$isi['pengeluaran'] 		= '';
		$isi['tanggal_pengeluaran']	= '';
		$isi['jumlah'] 		= '';
		$isi['ket']	= '';
		$isi['addpeng'] = $get_jen_peng->result();
		
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_jen_peng = $this->db->select('*')->from('r_jenis_pengeluaran')->get();

		$isi['title'] = "Pengeluaran Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Ubah Data Pengeluaran Klinik";
		$isi['m4'] = "Pengeluaran Klinik";
		$isi['fill'] = "billing/pengeluaranklinik/epengeluaran";

		$key = $this->uri->segment(3);
		$this->db->where('pengeluaran_id', $key);
		$query = $this->db->get('t_pengeluaran');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['pengeluaran_id']		= $row->pengeluaran_id;
				$isi['pengeluaran']		= $row->pengeluaran;
				$isi['tanggal_pengeluaran']		= $row->tanggal_pengeluaran;
				$isi['jumlah']		= $row->jumlah;
				$isi['ket']		= $row->ket;
				$isi['addpeng'] = $get_jen_peng->result();
				
			}
		}
		else {
				$isi['pengeluaran_id']		= '';
				$isi['pengeluaran']		= '';
				$isi['tanggal_pengeluaran']		= '';
				$isi['jumlah']		= '';
				$isi['ket']		= '';
				$isi['addpeng'] = '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('pengeluaran_id');
		$data_peng['pengeluaran_id'] = $this->input->post('pengeluaran_id');
		$data_peng['pengeluaran'] = $this->input->post('pengeluaran');
		$data_peng['tanggal_pengeluaran'] = $this->input->post('tanggal_pengeluaran');
		$data_peng['jumlah'] = $this->input->post('jumlah');
		$data_peng['jenis_pengeluaran_id'] = $this->input->post('jenis_pengeluaran_id');
		$data_peng['ket'] = $this->input->post('ket');

		$this->load->model('master_model');
		$query = $this->master_model->get_pengeluaran($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_peng($key,$data_peng);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_peng($data_peng);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			
		}
		Redirect('pengeluaran');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('pengeluaran_id', $key);
		$query = $this->db->get('t_pengeluaran');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_peng($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('pengeluaran');
	}

	function lihat(){
		$get_jen_peng = $this->db->select('*')->from('r_jenis_pengeluaran')->get();

		$isi['title'] = "Pengeluaran Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Lihat Data Pengeluaran Klinik";
		$isi['m4'] = "Pengeluaran Klinik";
		$isi['fill'] = "billing/pengeluaranklinik/dpengeluaran";

		$key = $this->uri->segment(3);
		$this->db->where('pengeluaran_id', $key);
		$query = $this->db->get('t_pengeluaran');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['pengeluaran_id']		= $row->pengeluaran_id;
				$isi['pengeluaran']		= $row->pengeluaran;
				$isi['tanggal_pengeluaran']		= $row->tanggal_pengeluaran;
				$isi['jumlah']		= $row->jumlah;
				$isi['ket']		= $row->ket;
				$isi['jenis_pengeluaran_id']		= $row->jenis_pengeluaran_id;
				$isi['addpeng'] = $get_jen_peng->result();
				
			}
		}
		else {
				$isi['pengeluaran_id']		= '';
				$isi['pengeluaran']		= '';
				$isi['tanggal_pengeluaran']		= '';
				$isi['jumlah']		= '';
				$isi['ket']		= '';
				$isi['jenis_pengeluaran_id']		= '';
				$isi['addpeng'] = '';
		}
		$this->load->view('vhome', $isi);
	}

}
