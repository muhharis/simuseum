<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');

		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Registrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Registrasi Pasien";
		$isi['m4'] = "Daftar Registrasi Pasien";
		$isi['fill'] = "billing/registrasi/vregistrasi";

		$isi['data'] = $this->master_model->get_reg();
		$this->load->view('vhome', $isi);
	}

	//function logout(){
	//	$this->session->sess_destroy();
	//	redirect('login');
	//}

	function tambah(){
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();

		$isi['title'] = "Registrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Registrasi Pasien";
		$isi['m4'] = "Tambah Data Registrasi Pasien";
		$isi['fill'] = "billing/registrasi/tregistrasi";

		$isi['kodeunik2'] = $this->master_model->buat_kode_reg();
		$isi['addkun'] = $get_kun->result();
		
		$isi['no_registrasi']	    = '';
		$isi['no_rek_medik']	    = '';
		$isi['tgl_reg']	    		= '';

		$this->load->view('vhome', $isi);
	}

	function get_data_registrasi(){
		$no_rek_medik=$this->input->post('no_rek_medik');
		$data=$this->master_model->get_data_registrasi_bykode($no_rek_medik);
		echo json_encode($data);
	}

	function ubah(){
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();

		$isi['title'] = "Registrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Registrasi Pasien";
		$isi['m4'] = "Edit Data Registrasi Pasien";
		$isi['fill'] = "billing/registrasi/eregistrasi";

		$key = $this->uri->segment(3);
		$this->db->where('no_registrasi', $key);
		$query = $this->db->get('m_pasien');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['addkun'] = $get_kun->result();

				$isi['no_registrasi'] 	= $row->no_registrasi;
				$isi['tgl_reg']	    = $row->tgl_reg;
			}
		}
		else {
				$isi['no_registrasi'] 	= '';
				$isi['tgl_reg']	    = '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('no_registrasi');
		$data_reg['no_registrasi'] = $this->input->post('no_registrasi');
		$data_reg['no_rek_medik'] = $this->input->post('no_rek_medik');
		$data_reg['tgl_reg'] = $this->input->post('tgl_reg');
		$data_reg['jenis_kunjungan_id'] = $this->input->post('jenis_kunjungan_id');
		
		$this->load->model('master_model');
		$query = $this->master_model->get_registrasi($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_registrasi($key,$data_reg);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_registrasi($data_reg);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('registrasi');
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('no_registrasi', $key);
		$query = $this->db->get('t_registrasi');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_registrasi($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('registrasi');
	}

	function lihat(){
		$this->load->model('master_model');

		$isi['title'] = "Registrasi Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Registrasi Pasien";
		$isi['m4'] = "Edit Data Registrasi Pasien";
		$isi['fill'] = "billing/registrasi/dregistrasi";

		$isi['data'] = $this->master_model->get_erg();

		$key = $this->uri->segment(3);
		$this->db->where('no_registrasi', $key);
		$query = $this->db->get('m_pasien');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{	
				$isi['no_registrasi'] 	= $row->no_registrasi;
				$isi['kode_pasien']	    = $row->kode_pasien;
				$isi['tgl_reg'] 		= $row->tgl_reg;
				$isi['jenis_kunjungan_id']	    = $row->jenis_kunjungan_id;
		}
	}
		else {
				$isi['no_registrasi'] 	= '';
				$isi['kode_pasien']	    = '';
				$isi['tgl_reg'] 		= '';
				$isi['jenis_kunjungan_id']	    = '';
		} 
		$this->load->view('vhome', $isi);
	}
}
