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
class Tariftindakan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Tarif Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Tarif Tindakan";
		$isi['fill'] = "master/tarif/tariftindakan/vtariftindakan";

		$isi['data'] = $this->master_model->get_tartin();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_tindakan = $this->db->select('*')->from('m_tindakan')->get();
		$get_gt = $this->db->select('*')->from('r_grup_tindakan')->get();
		$get_kelas_pel = $this->db->select('*')->from('r_kelas')->get();
		
		$isi['title'] = "Tarif Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Tambah Data Tarif Tindakan";
		$isi['fill'] = "master/tarif/tariftindakan/ttariftindakan";

		$isi['kodeunik2'] = $this->master_model->buat_kode_tarif_tindakan();

		$isi['addtindakan'] = $get_tindakan->result();
		$isi['addgt'] = $get_gt->result();
		$isi['addkelas'] = $get_kelas_pel->result();

		$isi['tarif_tindakan_id']	    = '';
		$isi['tarif']	    = '';
		$isi['disc_persen']	    = '';
		$isi['disc_rupiah'] 		= '';
		$isi['tgl_berlaku']	    = '';
		$isi['ket'] 		= '';
		$isi['is_aktif']	= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_tindakan = $this->db->select('*')->from('m_tindakan')->get();
		$get_gt = $this->db->select('*')->from('r_grup_tindakan')->get();
		$get_kelas_pel = $this->db->select('*')->from('r_kelas')->get();
		
		$isi['title'] = "Tarif Tindakan";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Ubah Data Tarif Tindakan";
		$isi['fill'] = "master/tarif/tariftindakan/etariftindakan";

		$key = $this->uri->segment(3);
		$this->db->where('tarif_tindakan_id', $key);
		$query = $this->db->get('t_tarif_tindakan');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['addtindakan'] = $get_tindakan->result();
				$isi['addgt'] = $get_gt->result();
				$isi['addkelas'] = $get_kelas_pel->result();

				$isi['tarif_tindakan_id'] = $row->tarif_tindakan_id;
				$isi['tarif']	    = $row->tarif;
				$isi['disc_persen']	= $row->disc_persen;
				$isi['disc_rupiah'] = $row->disc_rupiah;
				$isi['tgl_berlaku']	= $row->tgl_berlaku;
				$isi['ket'] 		= $row->ket;
				$isi['is_aktif']	= $row->is_aktif;
			}
		}
		else {
				$isi['addtindakan']			= '';
				$isi['addkelas'] 			= '';

				$isi['tarif_tindakan_id']	= '';
				$isi['tarif']	    		= '';
				$isi['disc_persen']	    	= '';
				$isi['disc_rupiah'] 		= '';
				$isi['tgl_berlaku']	    	= '';
				$isi['ket'] 				= '';
				$isi['is_aktif']			= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('tarif_tindakan_id');

		$data_tarif_tindakan['tarif_tindakan_id'] = $this->input->post('tarif_tindakan_id');
		$data_tarif_tindakan['kode_tindakan'] = $this->input->post('kode_tindakan');
		$data_tarif_tindakan['grup_tindakan_id'] = $this->input->post('grup_tindakan_id');
		$data_tarif_tindakan['kelas_id'] = $this->input->post('kelas_id');
		$data_tarif_tindakan['tarif'] = $this->input->post('tarif');
		$data_tarif_tindakan['disc_persen'] = $this->input->post('disc_persen');
		$data_tarif_tindakan['disc_rupiah'] = $this->input->post('disc_rupiah');
		$data_tarif_tindakan['tgl_berlaku'] = $this->input->post('tgl_berlaku');
		$data_tarif_tindakan['ket'] = $this->input->post('ket');
		$data_tarif_tindakan['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_tarif_tindakan($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_tarif_tindakan($key,$data_tarif_tindakan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_tarif_tindakan($data_tarif_tindakan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('tariftindakan');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('tarif_tindakan_id', $key);
		$query = $this->db->get('t_tarif_tindakan');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_tarif_tindakan($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('tariftindakan');
	}

}
