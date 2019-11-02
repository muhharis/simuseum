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
class lap_pengeluaran_klinik extends CI_Controller {
	function __construct(){
		parent::__construct();
		//
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Pengeluaran Klinik";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Pengeluaran Klinik";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/pengeluaran/lap_pengeluaran_klinik";

		$isi['data'] = $this->master_model->get_peng();
		$this->load->view('vhome', $isi);
	}

	
	function cetak_id($pengeluaran_id) {
	     $data = array(
	      'data'  => $this->db->query("SELECT
						t_pengeluaran.pengeluaran_id,
						t_pengeluaran.pengeluaran,
						t_pengeluaran.tanggal_pengeluaran,
						t_pengeluaran.jumlah,
						t_pengeluaran.ket,
						r_jenis_pengeluaran.jenis_pengeluaran_id,
						r_jenis_pengeluaran.jenis_pengeluaran 
					FROM
						t_pengeluaran
						INNER JOIN r_jenis_pengeluaran ON r_jenis_pengeluaran.jenis_pengeluaran_id = t_pengeluaran.jenis_pengeluaran_id where pengeluaran_id='$pengeluaran_id'"),
				    );
				    $this->load->view('laporan/pengeluaran/cetak_per_id',$data);
				    $html = $this->output->get_output();
				    $this->load->library('dompdf_gen');
				    $this->dompdf->load_html($html);
				    $this->dompdf->render();
				    $sekarang=date("d:F:Y:h:m:s");
				    $this->dompdf->stream("Pengeluaran Klinik, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
				 }

	 function cetak_all() {
	     $data = array(
	      'data'  => $this->db->query("SELECT
										t_pengeluaran.pengeluaran_id,
										t_pengeluaran.pengeluaran,
										t_pengeluaran.tanggal_pengeluaran,
										t_pengeluaran.jumlah,
										t_pengeluaran.ket,
										r_jenis_pengeluaran.jenis_pengeluaran_id,
										r_jenis_pengeluaran.jenis_pengeluaran 
									FROM
										t_pengeluaran
										INNER JOIN r_jenis_pengeluaran ON r_jenis_pengeluaran.jenis_pengeluaran_id = t_pengeluaran.jenis_pengeluaran_id"),
					    );
	    $this->load->view('laporan/pengeluaran/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Laporan Pengeluaran Klinik, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

}
