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
class biaya_pasien extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->helper('URL');
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		
	}

	function index(){
		$this->load->model('master_model');

		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Biaya Administrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Biaya Administrasi Pasien";
		$isi['m4'] = "Daftar Master Pasien";
		$isi['fill'] = "billing/biayapasien/vbiayapasien";

		$isi['data'] = $this->master_model->get_biaya_pasien();
		$this->load->view('vhome', $isi);
	}

	//function logout(){
	//	$this->session->sess_destroy();
	//	redirect('login');
	//}

	function tambah(){
		$get_pel = $this->db->select('*')->from('m_pelaksana')->get();
		//$get_harjual = $this->db->select('*')->from('t_harga_jual')->get();
		//$get_tartin = $this->db->select('*')->from('t_tarif_tindakan')->get();
		$get_reg = $this->db->select('*')->from('t_registrasi')->get();
		//$get_pek = $this->db->select('*')->from('r_pekerjaan')->get();
		//$get_sk = $this->db->select('*')->from('r_status_kawin')->get();

		$isi['title'] = "Tambah Data Biaya Administrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Tambah Data Biaya Administrasi Pasien";
		$isi['m4'] = "Daftar Master Pasien";
		$isi['fill'] = "billing/biayapasien/tbiayapasien";
		$isi['kodeunik2'] = $this->master_model->buat_kode_bayar();
		//$isi['kodeunik'] = $this->master_model->buat_kode_pas();
		//$isi['kodeunik2'] = $this->master_model->buat_kode_rm();
		$isi['addpel'] = $get_pel->result();
		//$isi['addharjual'] = $get_harjual->result();
		//$isi['addtartin'] = $get_tartin->result();
		$isi['addreg'] = $get_reg->result();

		
		//$isi['kode_pasien']	    = '';
		$isi['kode_kwitansi']	    = '';
		$isi['tgl']	    = '';
		$isi['jam']	    = '';
		$isi['b_periksa']	    = '';
		$isi['b_obat']	    = '';
		$isi['total_bayar']	    = '';
		$isi['tunai']	    = '';
		$isi['kembali']	    = '';

		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_pel = $this->db->select('*')->from('m_pelaksana')->get();
		//$get_harjual = $this->db->select('*')->from('t_harga_jual')->get();
		//$get_tartin = $this->db->select('*')->from('t_tarif_tindakan')->get();
		$get_reg = $this->db->select('*')->from('t_registrasi')->get();

		$isi['title'] = "Ubah Data Biaya Administrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Ubah Data Biaya Administrasi Pasien";
		$isi['m4'] = "Daftar Master Pasien";
		$isi['fill'] = "billing/biayapasien/ebiayapasien";

		$key = $this->uri->segment(3);
		$this->db->where('kode_kwitansi', $key);
		$query = $this->db->get('m_bayar');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['addpel'] 		= $get_pel->result();
				//$isi['addharjual']	= $get_harjual->result();
				//$isi['addtartin'] 	= $get_tartin->result();
				$isi['addreg'] 		= $get_reg->result();

				$isi['no_registrasi']	= $row->no_registrasi;
				$isi['kode_kwitansi']	= $row->kode_kwitansi;
				$isi['tgl']	    		= $row->tgl;
				$isi['jam']	    		= $row->jam;
				$isi['b_periksa']	    = $row->b_periksa;
				$isi['b_obat']	 		= $row->b_obat;
				$isi['total_bayar']	    = $row->total_bayar;
				$isi['tunai']	    	= $row->tunai;
				$isi['kembali']	    	= $row->kembali;
			}
		}
		else {
				$isi['kode_kwitansi']	= '';
				$isi['tgl']	    		= '';
				$isi['jam']	    		= '';
				$isi['b_periksa']	    = '';
				$isi['b_obat']	 		= '';
				$isi['total_bayar']	    = '';
				$isi['tunai']	    	= '';
				$isi['kembali']	    	= '';

		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('kode_kwitansi');
		$data_biaya['kode_kwitansi'] = $this->input->post('kode_kwitansi');
		$data_biaya['tgl'] = $this->input->post('tgl');
		$data_biaya['jam'] = $this->input->post('jam');
		$data_biaya['kode_pelaksana'] = $this->input->post('kode_pelaksana');
		$data_biaya['no_registrasi'] = $this->input->post('no_registrasi');
		$data_biaya['b_periksa'] = $this->input->post('b_periksa');
		$data_biaya['b_obat'] = $this->input->post('b_obat');
		$data_biaya['total_bayar'] = $this->input->post('total_bayar');
		$data_biaya['tunai'] = $this->input->post('tunai');
		$data_biaya['kembali'] = $this->input->post('kembali');

		$this->load->model('master_model');
		$query = $this->master_model->get_biaya($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_biaya($key,$data_biaya);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_biaya($data_biaya);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('biaya_pasien');
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('kode_kwitansi', $key);
		$query = $this->db->get('m_bayar');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_biaya($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('biaya_pasien');
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




}
