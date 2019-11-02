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
class lap_janji extends CI_Controller {
	function __construct(){
		parent::__construct();
		//
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Janji Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Janji Pasien";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/janji/lap_janji";

		$isi['data'] = $this->master_model->get_jan();
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
