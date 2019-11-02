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
class lap_penerimaan_hadiah extends CI_Controller {
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
		$isi['fill'] = "laporan/penerimaan/hadiah/lap_penerimaan_hadiah";

		$isi['data'] = $this->master_model->get_penha();
		$this->load->view('vhome', $isi);
	}

	
	function cetak_id($no_penerimaan_hadiah) {
	     $data = array(
	      'data'  => $this->db->query("SELECT
						m_hadiah.id_hadiah,
						m_hadiah.hadiah,
						in_penerimaan_hadiah.jam,
						in_penerimaan_hadiah.tanggal,
						in_penerimaan_hadiah.no_penerimaan_hadiah,
						in_penerimaan_hadiah.jumlah,
						in_penerimaan_hadiah.ket 
					FROM
						in_penerimaan_hadiah
						INNER JOIN m_hadiah ON m_hadiah.id_hadiah = in_penerimaan_hadiah.id_hadiah where no_penerimaan_hadiah='$no_penerimaan_hadiah'"),
									    );
				    $this->load->view('laporan/penerimaan/hadiah/cetak_per_id',$data);
				    $html = $this->output->get_output();
				    $this->load->library('dompdf_gen');
				    $this->dompdf->load_html($html);
				    $this->dompdf->render();
				    $sekarang=date("d:F:Y:h:m:s");
				    $this->dompdf->stream("Penerimaan Hadiah, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
				 }

	 function cetak_all() {
	     $data = array(
	      'data'  => $this->db->query("SELECT
						m_hadiah.id_hadiah,
						m_hadiah.hadiah,
						in_penerimaan_hadiah.jam,
						in_penerimaan_hadiah.tanggal,
						in_penerimaan_hadiah.no_penerimaan_hadiah,
						in_penerimaan_hadiah.jumlah,
						in_penerimaan_hadiah.ket 
					FROM
						in_penerimaan_hadiah
						INNER JOIN m_hadiah ON m_hadiah.id_hadiah = in_penerimaan_hadiah.id_hadiah"),
					    );
	    $this->load->view('laporan/penerimaan/hadiah/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Penerimaan Hadiah, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

}
