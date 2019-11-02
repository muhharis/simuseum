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
class Lap_pendaftaran_pasien extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('URL');
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');

		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Laporan Pendaftaran Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Pendaftaran Pasien";
		$isi['m4'] = "";
		$isi['fill'] = "laporan/pendaftaran/lap_pendaftaran_pasien";

		$isi['data'] = $this->master_model->get_pas();
		$this->load->view('vhome', $isi);
	}
	
	function detail(){
		$this->load->model('master_model');

		$isi['title'] = "Laporan Pendaftaran Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Laporan";
		$isi['m3'] = "Laporan Pendaftaran Pasien";
		$isi['m4'] = "Detail Laporan Pendaftarn Pasien";
		$isi['fill'] = "laporan/pendaftaran/detail_lap_pasien";

		$key = $this->uri->segment(3);
		$this->db->where('no_rek_medik', $key);
		$query = $this->db->get('m_pasien');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['no_rek_medik'] 	= $row->no_rek_medik;
				$isi['nm_pasien']	    = $row->nm_pasien;
				$isi['tgl_lahir']	    = $row->tgl_lahir;
				$isi['tmpt_lahir']	    = $row->tmpt_lahir;
				$isi['id_gender']	    = $row->id_gender;
				$isi['pend_id']	    	= $row->pend_id;
				$isi['agama_id']	    = $row->agama_id;
				$isi['id_pekerjaan'] 	= $row->id_pekerjaan;
				$isi['id_sk']	    	= $row->id_sk;
				$isi['no_identitas']	= $row->no_identitas;
				$isi['no_telp']	    	= $row->no_telp;
				$isi['gol_darah']	    = $row->gol_darah;
				$isi['alamat']	    	= $row->alamat;
				$isi['create_at'] 		= $row->create_at;
				$isi['foto_pasien'] 	= $row->foto_pasien;
				$isi['is_aktif']		= $row->is_aktif;
			}
		}
		else {
				$isi['no_rek_medik'] 	= '';
				$isi['nm_pasien']	    = '';
				$isi['tgl_lahir']	    = '';
				$isi['tmpt_lahir']	    = '';
				$isi['id_gender']	    = '';
				$isi['pend_id']	    	= '';
				$isi['agama_id']	    = '';
				$isi['id_pekerjaan']	= '';
				$isi['id_sk']	    	= '';
				$isi['no_identitas']	= '';
				$isi['no_telp']	    	= '';
				$isi['gol_darah']	    = '';
				$isi['alamat']	    	= '';
				$isi['create_at'] 		= '';
				$isi['foto_pasien'] 	= '';
				$isi['is_aktif']		= '';
		}
		$this->load->view('vhome', $isi);
	}

	public function cetak_id($no_rek_medik) {
	     $data = array(
	      'data'  => $this->db->query("SELECT * FROM m_pasien where no_rek_medik='$no_rek_medik'"),
	    );
	    $this->load->view('laporan/pendaftaran/cetak_per_id',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Kartu Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }

	public function cetak_all() {
	    $data = array(
	      'data'  => $this->db->query("SELECT * FROM m_pasien"),
	    );
	    $this->load->view('laporan/pendaftaran/cetak_all',$data);
	    $html = $this->output->get_output();
	    $this->load->library('dompdf_gen');
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    $sekarang=date("d:F:Y:h:m:s");
	    $this->dompdf->stream("Kartu Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
	 }



}
