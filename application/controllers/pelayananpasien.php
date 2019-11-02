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
class Pelayananpasien extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Pelayanan Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Data Pelayanan Pasien";
		$isi['m4'] = "Pelayanan Pasien";
		$isi['fill'] = "billing/pelayananpasien/vpelayananpasien";

		$isi['data'] = $this->master_model->get_pelayanan();
		$this->load->view('vhome', $isi);
	}

	function get_data_janji(){
		$no_registrasi=$this->input->post('no_registrasi');
		$data=$this->master_model->get_data_janji_bykode($no_registrasi);
		echo json_encode($data);
	}

	function tambah(){
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();
		$get_registrasi = $this->db->select('*')->from('t_registrasi')->get();

		$isi['title'] = "Pelayanan Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Tambah Data Pelayanan Pasien";
		$isi['m4'] = "Pelayanan Pasien";
		$isi['fill'] = "billing/pelayananpasien/tpelayananpasien";

		//$isi['kodeunik2'] = $this->master_model->buat_kode_pengeluaran();
		$isi['kodeunik2'] = $this->master_model->buat_kode_pelayanan();

		$isi['kode_pelayanan']	    = '';
		$isi['antrian'] 		= '';
		//$isi['masuk']	= '';
		$isi['tgl_pelayanan'] 		= '';
		$isi['is_aktif']	= '';
		$isi['addkun'] = $get_kun->result();
		$isi['addregistrasi'] = $get_registrasi->result();
		
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();
		$get_registrasi = $this->db->select('*')->from('t_registrasi')->get();

		$isi['title'] = "Pelayanan Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Ubah Data Pelayanan Pasien";
		$isi['m4'] = "Pelayanan Pasien";
		$isi['fill'] = "billing/pelayananpasien/epelayananpasien";

		$key = $this->uri->segment(3);
		$this->db->where('kode_pelayanan', $key);
		$query = $this->db->get('m_pelayanan');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['kode_pelayanan']		= $row->kode_pelayanan;
				$isi['antrian']		= $row->antrian;
				//$isi['masuk']		= $row->masuk;
				$isi['tgl_pelayanan']		= $row->tgl_pelayanan;
				$isi['is_aktif']		= $row->is_aktif;
				$isi['addkun'] = $get_kun->result();
				$isi['addregistrasi'] = $get_registrasi->result();
				
			}
		}
		else {
				$isi['kode_pelayanan']		= '';
				$isi['antrian']				= '';
				//$isi['masuk']				= '';
				$isi['tgl_pelayanan']		= '';
				$isi['is_aktif']			= '';
				$isi['addkun'] 				= '';
				$isi['addregistrasi'] 		= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kode_pelayanan');
		$data_pela['kode_pelayanan'] = $this->input->post('kode_pelayanan');
		$data_pela['no_registrasi'] = $this->input->post('no_registrasi');
		$data_pela['id_kunjungan'] = $this->input->post('id_kunjungan');
		$data_pela['antrian'] = $this->input->post('antrian');
		$data_pela['tgl_pelayanan'] = $this->input->post('tgl_pelayanan');
		//$data_pela['masuk'] = $this->input->post('masuk');
		//$data_pela['keluar'] = $this->input->post('keluar');
		$data_pela['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_pela($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_pela($key,$data_pela);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_pela($data_pela);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			
		}
		Redirect('pelayananpasien');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kode_pelayanan', $key);
		$query = $this->db->get('m_pelayanan');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pela($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('pelayananpasien');
	}
}
