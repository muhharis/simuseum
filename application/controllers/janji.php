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
class Janji extends CI_Controller {
	function __construct(){
		parent::__construct();
		//
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Janji";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Janji";
		$isi['m4'] = "Janji";
		$isi['fill'] = "billing/janji/vjanji";

		$isi['data'] = $this->master_model->get_jan();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_pelaksana = $this->db->select('*')->from('m_pelaksana')->get();
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();
		$get_registrasi = $this->db->select('*')->from('t_registrasi')->get();

		$isi['title'] = "Janji";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Janji";
		$isi['m4'] = "Tambah Janji";
		$isi['fill'] = "billing/janji/tjanji";

		$isi['kodeunik2'] = $this->master_model->buat_kode_janji();

		$isi['janji_id']	    = '';
		$isi['tanggal_janji']	    = '';
		$isi['jam']	    = '';
		$isi['keterangan']	    = '';
		$isi['addpelaksana'] = $get_pelaksana->result();
		$isi['addpkun'] = $get_kun->result();
		$isi['addreg'] = $get_registrasi->result();
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function get_data_janji(){
		$no_registrasi=$this->input->post('no_registrasi');
		$data=$this->master_model->get_data_janji_bykode($no_registrasi);
		echo json_encode($data);
	}

	//function get_data_registrasi(){
	//	$no_rek_medik=$this->input->post('no_rek_medik');
	//	$data=$this->master_model->get_data_registrasi_bykode($no_rek_medik);
	//	echo json_encode($data);
	//}

	function ubah(){
		$get_pelaksana = $this->db->select('*')->from('m_pelaksana')->get();
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();
		$get_registrasi = $this->db->select('*')->from('t_registrasi')->get();

		$isi['title'] = "Janji";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Janji";
		$isi['m4'] = "Ubah Janji";
		$isi['fill'] = "billing/janji/ejanji";

		$key = $this->uri->segment(3);
		$this->db->where('janji_id', $key);
		$query = $this->db->get('t_janji');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{

				$isi['janji_id']	    = $row->janji_id;
				$isi['tanggal_janji']	    = $row->tanggal_janji;
				$isi['jam']	    = $row->jam;
				$isi['keterangan']	    = $row->keterangan;
				$isi['addpelaksana'] = $get_pelaksana->result();
				$isi['addpkun'] = $get_kun->result();
				$isi['addreg'] = $get_registrasi->result();
				$isi['is_aktif']	= '';
			}
		}
		else {
				$isi['janji_id']	    = '';
				$isi['tanggal_janji']	    = '';
				$isi['jam']	    = '';
				$isi['keterangan']	    = '';
				$isi['addpelaksana'] ='';
				$isi['addpkun'] = '';
				$isi['addreg'] = '';
				$isi['is_aktif']	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('janji_id');
		$data_janji['janji_id'] = $this->input->post('janji_id');
		$data_janji['no_registrasi'] = $this->input->post('no_registrasi');
		$data_janji['jenis_kunjungan_id'] = $this->input->post('jenis_kunjungan_id');
		$data_janji['tanggal_janji'] = $this->input->post('tanggal_janji');
		$data_janji['jam'] = $this->input->post('jam');
		$data_janji['keterangan'] = $this->input->post('keterangan');
		$data_janji['kode_pelaksana'] = $this->input->post('kode_pelaksana');
		$data_janji['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_janji($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_jan($key,$data_janji);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_jan($data_janji);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			
		}
		Redirect('Janji');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('janji_id', $key);
		$query = $this->db->get('t_janji');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_jan($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('Janji');
	}

	function detail(){
		$this->load->model('master_model');

		$get_pelaksana = $this->db->select('*')->from('m_pelaksana')->get();
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();
		$get_registrasi = $this->db->select('*')->from('t_registrasi')->get();

		$isi['title'] = "Janji";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Janji";
		$isi['m4'] = "Detail Janji Pasien";
		$isi['fill'] = "billing/janji/djanji";
		$isi['data'] = $this->master_model->get_jan();
		$key = $this->uri->segment(3);
		$this->db->where('janji_id', $key);
		$query = $this->db->get('t_janji');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{

				$isi['janji_id']	    = $row->janji_id;
				$isi['tanggal_janji']	    = $row->tanggal_janji;
				$isi['jam']	    = $row->jam;
				$isi['keterangan']	    = $row->keterangan;
				$isi['no_registrasi']	    = $row->no_registrasi;

				$isi['addpelaksana'] = $get_pelaksana->result();
				$isi['addpkun'] = $get_kun->result();
				$isi['addreg'] = $get_registrasi->result();
				$isi['is_aktif']	= '';
			}
		}
		else {
				$isi['janji_id']	    = '';
				$isi['tanggal_janji']	    = '';
				$isi['jam']	    = '';
				$isi['keterangan']	    = '';
				$isi['addpelaksana'] ='';
				$isi['addpkun'] = '';
				$isi['addreg'] = '';
				$isi['is_aktif']	= '';
		}
		$this->load->view('vhome', $isi);
	}

function cetak_id($janji_id) {
	     $data = array(
	      'data'  => $this->db->query("SELECT
					t_janji.janji_id,
					t_janji.jam,
					t_janji.keterangan,
					t_janji.is_aktif,
					r_jenis_kunjungan.jenis_kunjungan,
					r_jenis_kunjungan.jenis_kunjungan_id,
					t_janji.tanggal_janji,
					t_registrasi.no_registrasi,
					m_pasien.no_rek_medik,
					m_pasien.nm_pasien,
					m_pasien.alamat,
					r_peran_pelaksana.peran_pelaksana_id,
					r_peran_pelaksana.peran_pelaksana,
					m_pelaksana.nama_pelaksana,
					m_pelaksana.kode_pelaksana,
					m_pasien.no_telp 
				FROM
					t_janji
					INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = t_janji.jenis_kunjungan_id
					INNER JOIN t_registrasi ON t_registrasi.no_registrasi = t_janji.no_registrasi
					INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik
					INNER JOIN m_pelaksana ON m_pelaksana.kode_pelaksana = t_janji.kode_pelaksana
					INNER JOIN r_peran_pelaksana ON r_peran_pelaksana.peran_pelaksana_id = m_pelaksana.peran_pelaksana_id where janji_id='$janji_id'"),
				    );
				    $this->load->view('laporan/janji/cetak_per_id',$data);
				    $html = $this->output->get_output();
				    $this->load->library('dompdf_gen');
				    $this->dompdf->load_html($html);
				    $this->dompdf->render();
				    $sekarang=date("d:F:Y:h:m:s");
				    $this->dompdf->stream("Kartu Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
				 }

	 function cetak_all() {
	     $data = array(
	      'data'  => $this->db->query("SELECT
					t_janji.janji_id,
					t_janji.jam,
					t_janji.keterangan,
					t_janji.is_aktif,
					r_jenis_kunjungan.jenis_kunjungan,
					r_jenis_kunjungan.jenis_kunjungan_id,
					t_janji.tanggal_janji,
					t_registrasi.no_registrasi,
					m_pasien.no_rek_medik,
					m_pasien.nm_pasien,
					m_pasien.alamat,
					r_peran_pelaksana.peran_pelaksana_id,
					r_peran_pelaksana.peran_pelaksana,
					m_pelaksana.nama_pelaksana,
					m_pelaksana.kode_pelaksana,
					m_pasien.no_telp 
				FROM
					t_janji
					INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = t_janji.jenis_kunjungan_id
					INNER JOIN t_registrasi ON t_registrasi.no_registrasi = t_janji.no_registrasi
					INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik
					INNER JOIN m_pelaksana ON m_pelaksana.kode_pelaksana = t_janji.kode_pelaksana
					INNER JOIN r_peran_pelaksana ON r_peran_pelaksana.peran_pelaksana_id = m_pelaksana.peran_pelaksana_id"),
					    );
	    $this->load->view('laporan/janji/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Kartu Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

}
