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
class lap_penerimaan_obat extends CI_Controller {
	function __construct(){
		parent::__construct();
		//
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Penerimaan Obat";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Penerimaan Obat";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/penerimaan/obat/lap_penerimaan_obat";

		$isi['data'] = $this->master_model->get_pen();
		$this->load->view('vhome', $isi);
	}

	
	function cetak_id($no_penerimaan_obat) {
	     $data = array(
	      'data'  => $this->db->query("SELECT
						m_pemasok.kode_pemasok,
						m_pemasok.nm_pemasok,
						in_penerimaan_obat.no_penerimaan_obat,
						in_penerimaan_obat.jam,
						in_penerimaan_obat.tanggal_penerimaan,
						in_penerimaan_obat.jumlah,
						in_penerimaan_obat.ket,
						m_barang.kode_barang,
						m_barang.nm_barang 
					FROM
						in_penerimaan_obat
						INNER JOIN m_barang ON m_barang.kode_barang = in_penerimaan_obat.id_barang
						INNER JOIN m_pemasok ON m_pemasok.kode_pemasok = in_penerimaan_obat.id_pemasok where no_penerimaan_obat='$no_penerimaan_obat'"),
				    );
				    $this->load->view('laporan/penerimaan/obat/cetak_per_id',$data);
				    $html = $this->output->get_output();
				    $this->load->library('dompdf_gen');
				    $this->dompdf->load_html($html);
				    $this->dompdf->render();
				    $sekarang=date("d:F:Y:h:m:s");
				    $this->dompdf->stream("Penerimaan Obat, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
				 }

	 function cetak_all() {
	     $data = array(
	      'data'  => $this->db->query("SELECT
							m_pemasok.nm_pemasok,
							m_barang.kode_barang,
							m_barang.nm_barang,
							in_penerimaan_obat.no_penerimaan_obat,
							in_penerimaan_obat.jam,
							in_penerimaan_obat.tanggal_penerimaan,
							in_penerimaan_obat.jumlah,
							in_penerimaan_obat.ket,
							m_pemasok.kode_pemasok 
						FROM
							in_penerimaan_obat
							INNER JOIN m_barang ON m_barang.kode_barang = in_penerimaan_obat.id_barang
							INNER JOIN m_pemasok ON m_pemasok.kode_pemasok = in_penerimaan_obat.id_pemasok"),
					    );
	    $this->load->view('laporan/penerimaan/obat/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Penerimaan Obat, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

}
