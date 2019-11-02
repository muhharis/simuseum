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
class lap_penjualan extends CI_Controller {
	function __construct(){
		parent::__construct();
		//
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Penjualan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Penjualan";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/penjualan/lap_penjualan";

		$isi['data'] = $this->master_model->get_biaya_penjualan();
		$this->load->view('vhome', $isi);
	}

	
	function cetak_id($id_order) {
	     $data = array(
	      'data'  => $this->db->query("SELECT
							t_harga_jual.harga_jual_id,
							m_barang.kode_barang,
							m_barang.nm_barang,
							t_harga_jual.harga_jual,
							`order`.id_order,
							`order`.time,
							`order`.qty,
							`order`.subtotal 
						FROM
							`order`
							INNER JOIN t_harga_jual ON t_harga_jual.harga_jual_id = `order`.harga_jual_id
							INNER JOIN m_barang ON m_barang.kode_barang = t_harga_jual.kode_barang where id_order='$id_order'"),
				    );
				    $this->load->view('laporan/penjualan/cetak_per_id',$data);
				    $html = $this->output->get_output();
				    $this->load->library('dompdf_gen');
				    $this->dompdf->load_html($html);
				    $this->dompdf->render();
				    $sekarang=date("d:F:Y:h:m:s");
				    $this->dompdf->stream("Penjualan, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
				 }

	 function cetak_all() {
	     $data = array(
	      'data'  => $this->db->query("SELECT
							t_harga_jual.harga_jual_id,
							m_barang.kode_barang,
							m_barang.nm_barang,
							t_harga_jual.harga_jual,
							`order`.id_order,
							`order`.time,
							`order`.qty,
							`order`.subtotal 
						FROM
							`order`
							INNER JOIN t_harga_jual ON t_harga_jual.harga_jual_id = `order`.harga_jual_id
							INNER JOIN m_barang ON m_barang.kode_barang = t_harga_jual.kode_barang"),
					    );
	    $this->load->view('laporan/penjualan/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Penerimaan Obat, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

}
