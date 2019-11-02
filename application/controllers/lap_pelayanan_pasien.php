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
class lap_pelayanan_pasien extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Pelayanan Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Pelayanan Pasien";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/pelayanan/lap_pelayanan";

		$isi['data'] = $this->master_model->get_pelayanan();
		$this->load->view('vhome', $isi);
	}


	function cetak_id($kode_pelayanan) {
	     $data = array(
	      'data'  => $this->db->query("SELECT
						r_jenis_kunjungan.jenis_kunjungan_id,
						r_jenis_kunjungan.jenis_kunjungan,
						m_pelayanan.kode_pelayanan,
						m_pelayanan.tgl_pelayanan,
						m_pelayanan.antrian,
						m_pelayanan.masuk,
						m_pelayanan.is_aktif,
						m_pasien.no_rek_medik,
						m_pasien.nm_pasien,
						m_pasien.alamat,
						t_registrasi.no_registrasi 
					FROM
						m_pelayanan
						INNER JOIN t_registrasi ON t_registrasi.no_registrasi = m_pelayanan.no_registrasi
						INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = m_pelayanan.id_kunjungan
						INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik where kode_pelayanan='$kode_pelayanan'"),
	    );
	    $this->load->view('laporan/pelayanan/cetak_per_id',$data);
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
						m_pelayanan.kode_pelayanan,
						m_pelayanan.tgl_pelayanan,
						m_pelayanan.antrian,
						m_pelayanan.masuk,
						m_pelayanan.is_aktif,
						m_pasien.no_rek_medik,
						m_pasien.nm_pasien,
						m_pasien.alamat,
						t_registrasi.no_registrasi 
					FROM
						m_pelayanan
						INNER JOIN t_registrasi ON t_registrasi.no_registrasi = m_pelayanan.no_registrasi
						INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = m_pelayanan.id_kunjungan
						INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik"),
	    );
	    $this->load->view('laporan/pelayanan/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Kartu Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

}
