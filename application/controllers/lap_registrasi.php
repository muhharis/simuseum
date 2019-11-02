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
class Lap_registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('URL');
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Registrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Registrasi Pasien";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/registrasi/lap_registrasi";

		$isi['data'] = $this->master_model->get_reg();
		$this->load->view('vhome', $isi);
	}


	function cetak_id($no_registrasi) {
	     $data = array(
	      'data'  => $this->db->query("SELECT
						r_jenis_kunjungan.jenis_kunjungan_id,
						r_jenis_kunjungan.jenis_kunjungan,
						m_pasien.no_rek_medik,
						m_pasien.nm_pasien,
						t_registrasi.tanggal_registrasi,
						t_registrasi.no_registrasi 
					FROM
						t_registrasi
						INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik
						INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = t_registrasi.jenis_kunjungan_id where no_registrasi='$no_registrasi'"),
	    );
	    $this->load->view('laporan/registrasi/cetak_per_id',$data);
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
						r_jenis_kunjungan.jenis_kunjungan_id,
						r_jenis_kunjungan.jenis_kunjungan,
						m_pasien.no_rek_medik,
						m_pasien.nm_pasien,
						t_registrasi.tanggal_registrasi,
						t_registrasi.no_registrasi 
					FROM
						t_registrasi
						INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik
						INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = t_registrasi.jenis_kunjungan_id"),
	    );
	    $this->load->view('laporan/registrasi/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Kartu Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

}
