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
class Lap_pembayaran_pasien extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('URL');
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');

		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Biaya Administrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Biaya Administrasi Pasien";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/bayar/lap_bayar";

		$isi['data'] = $this->master_model->get_biaya_pasien();
		$this->load->view('vhome', $isi);
	}

	public function cetak_id($kode_kwitansi) {
     $data = array(
      'data'  => $this->db->query("SELECT
							m_pelaksana.kode_pelaksana,
							m_pelaksana.nama_pelaksana,
							t_registrasi.no_registrasi,
							m_bayar.b_periksa,
							m_bayar.b_obat,
							m_bayar.total_bayar,
							m_bayar.tunai,
							m_bayar.kembali,
							m_bayar.tgl,
							m_bayar.kode_kwitansi,
							m_bayar.jam,
							r_peran_pelaksana.peran_pelaksana_id,
							r_peran_pelaksana.peran_pelaksana,
							m_pasien.no_rek_medik,
							m_pasien.nm_pasien,
							m_pasien.alamat 
						FROM
							m_bayar
							INNER JOIN m_pelaksana ON m_pelaksana.kode_pelaksana = m_bayar.kode_pelaksana
							INNER JOIN t_registrasi ON t_registrasi.no_registrasi = m_bayar.no_registrasi
							INNER JOIN r_peran_pelaksana ON r_peran_pelaksana.peran_pelaksana_id = m_pelaksana.peran_pelaksana_id
							INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik 
							AND m_pasien.no_rek_medik = t_registrasi.no_rek_medik where kode_kwitansi='$kode_kwitansi'"),
    );
    $this->load->view('laporan/bayar/cetak_per_id',$data);
    $html = $this->output->get_output();
    $this->load->library('dompdf_gen');
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $sekarang=date("d:F:Y:h:m:s");
    $this->dompdf->stream("Kwitansi Bayar Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
 }

 	 function cetak_all() {
	     $data = array(
	      'data'  => $this->db->query("SELECT
							m_pelaksana.kode_pelaksana,
							m_pelaksana.nama_pelaksana,
							t_registrasi.no_registrasi,
							m_bayar.b_periksa,
							m_bayar.b_obat,
							m_bayar.total_bayar,
							m_bayar.tunai,
							m_bayar.kembali,
							m_bayar.tgl,
							m_bayar.kode_kwitansi,
							m_bayar.jam,
							r_peran_pelaksana.peran_pelaksana_id,
							r_peran_pelaksana.peran_pelaksana,
							m_pasien.no_rek_medik,
							m_pasien.nm_pasien,
							m_pasien.alamat 
						FROM
							m_bayar
							INNER JOIN m_pelaksana ON m_pelaksana.kode_pelaksana = m_bayar.kode_pelaksana
							INNER JOIN t_registrasi ON t_registrasi.no_registrasi = m_bayar.no_registrasi
							INNER JOIN r_peran_pelaksana ON r_peran_pelaksana.peran_pelaksana_id = m_pelaksana.peran_pelaksana_id
							INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik 
							AND m_pasien.no_rek_medik = t_registrasi.no_rek_medik"),
					    );
	    $this->load->view('laporan/bayar/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Penerimaan Hadiah, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }




}
