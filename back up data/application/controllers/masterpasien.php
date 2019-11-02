<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterpasien extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');

		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Master Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Master Pasien";
		$isi['m4'] = "Daftar Master Pasien";
		$isi['fill'] = "billing/masterpasien/vmasterpasien";

		$isi['data'] = $this->master_model->get_pas();
		$this->load->view('vhome', $isi);
	}

	//function logout(){
	//	$this->session->sess_destroy();
	//	redirect('login');
	//}

	function tambah(){
		$get_gen = $this->db->select('*')->from('r_gender')->get();
		$get_kel = $this->db->select('*')->from('r_kel')->get();
		$get_agama = $this->db->select('*')->from('r_agama')->get();
		$get_pend = $this->db->select('*')->from('r_pend')->get();
		$get_pek = $this->db->select('*')->from('r_pekerjaan')->get();
		$get_sk = $this->db->select('*')->from('r_status_kawin')->get();

		$isi['title'] = "Master Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Master Pasien";
		$isi['m4'] = "Tambah Data Master Pasien";
		$isi['fill'] = "billing/masterpasien/tmasterpasien";
		//$isi['kodeunik'] = $this->master_model->buat_kode_pas();
		$isi['kodeunik2'] = $this->master_model->buat_kode_rm();
		$isi['addgen'] = $get_gen->result();
		$isi['addkel'] = $get_kel->result();
		$isi['addag'] = $get_agama->result();
		$isi['addpend'] = $get_pend->result();
		$isi['addpek'] = $get_pek->result();
		$isi['addsk'] = $get_sk->result();

		//$isi['kode_pasien']	    = '';
		$isi['no_rek_medik']	    = '';
		$isi['nm_pasien']	    = '';
		$isi['tgl_lahir']	    = '';
		$isi['tmpt_lahir']	    = '';
		$isi['no_identitas']	    = '';
		$isi['no_telp']	    = '';
		$isi['gol_darah']	    = '';
		$isi['alamat']	    = '';
		$isi['foto_pasien'] 		= '';
		$isi['is_aktif']	= '';

		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_gen = $this->db->select('*')->from('r_gender')->get();
		$get_kel = $this->db->select('*')->from('r_kel')->get();
		$get_agama = $this->db->select('*')->from('r_agama')->get();
		$get_pend = $this->db->select('*')->from('r_pend')->get();
		$get_pek = $this->db->select('*')->from('r_pekerjaan')->get();
		$get_sk = $this->db->select('*')->from('r_status_kawin')->get();

		$isi['title'] = "Master Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Master Pasien";
		$isi['m4'] = "Ubah Data Master Pasien";
		$isi['fill'] = "billing/masterpasien/emasterpasien";

		$key = $this->uri->segment(3);
		$this->db->where('no_rek_medik', $key);
		$query = $this->db->get('m_pasien');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['addgen'] = $get_gen->result();
				$isi['addkel'] = $get_kel->result();
				$isi['addag'] = $get_agama->result();
				$isi['addpend'] = $get_pend->result();
				$isi['addpek'] = $get_pek->result();
				$isi['addsk'] = $get_sk->result();

				$isi['no_rek_medik'] 	= $row->no_rek_medik;
				$isi['nm_pasien']	    = $row->nm_pasien;
				$isi['tgl_lahir']	    = $row->tgl_lahir;
				$isi['tmpt_lahir']	    = $row->tmpt_lahir;
				$isi['no_identitas']	= $row->no_identitas;
				$isi['no_telp']	    	= $row->no_telp;
				$isi['gol_darah']	    = $row->gol_darah;
				$isi['alamat']	    	= $row->alamat;
				$isi['foto_pasien'] 	= $row->foto_pasien;
				$isi['is_aktif']		= $row->is_aktif;
			}
		}
		else {
				$isi['no_rek_medik']	    = '';
				$isi['nm_pasien']	    = '';
				$isi['tgl_lahir']	    = '';
				$isi['tmpt_lahir']	    = '';
				$isi['no_identitas']	    = '';
				$isi['no_telp']	    = '';
				$isi['gol_darah']	    = '';
				$isi['alamat']	    = '';
				$isi['foto_pasien'] 		= '';
				$isi['is_aktif']	= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('no_rek_medik');
		$data_pas['no_rek_medik'] = $this->input->post('no_rek_medik');
		$data_pas['nm_pasien'] = $this->input->post('nm_pasien');
		$data_pas['id_gender'] = $this->input->post('id_gender');
		$data_pas['tgl_lahir'] = $this->input->post('tgl_lahir');
		$data_pas['tmpt_lahir'] = $this->input->post('tmpt_lahir');
		$data_pas['no_identitas'] = $this->input->post('no_identitas');
		$data_pas['no_telp'] = $this->input->post('no_telp');
		$data_pas['gol_darah'] = $this->input->post('gol_darah');
		$data_pas['alamat'] = $this->input->post('alamat');
		$data_pas['kd_kel'] = $this->input->post('kd_kel');
		$data_pas['agama_id'] = $this->input->post('agama_id');
		$data_pas['pend_id'] = $this->input->post('pend_id');
		$data_pas['id_pekerjaan'] = $this->input->post('id_pekerjaan');
		$data_pas['id_sk'] = $this->input->post('id_sk');
		$data_pas['foto_pasien'] = $this->input->post('foto_pasien');
		$data_pas['is_aktif'] = $this->input->post('is_aktif');

		$this->load->model('master_model');
		$query = $this->master_model->get_pasien($key);
		if($query->num_rows()>0)
		{
			$this->master_model->getupdate_pasien($key,$data_pas);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_pasien($data_pas);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('masterpasien');
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('no_rek_medik', $key);
		$query = $this->db->get('m_pasien');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pasien($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('masterpasien');
	}

	function lihat(){
		$this->load->model('master_model');

		$isi['title'] = "Master Pasien";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Master Pasien";
		$isi['m4'] = "Lihat Data Master Pasien";
		$isi['fill'] = "billing/masterpasien/dmasterpasien";

		$isi['data'] = $this->master_model->get_pas();

		$key = $this->uri->segment(3);
		$this->db->where('no_rek_medik', $key);
		$query = $this->db->get('m_pasien');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['no_rek_medik'] 	= $row->no_rek_medik;
				$isi['nm_pasien']	    = $row->nm_pasien;
				$isi['id_gender'] 		= $row->id_gender;
				$isi['tgl_lahir']	    = $row->tgl_lahir;
				$isi['tmpt_lahir']	    = $row->tmpt_lahir;
				$isi['no_identitas']	= $row->no_identitas;
				$isi['no_telp']	    	= $row->no_telp;
				$isi['gol_darah']	    = $row->gol_darah;
				$isi['alamat']	    	= $row->alamat;
				$isi['kd_kel'] 			= $row->kd_kel;
				$isi['agama_id'] 		= $row->agama_id;
				$isi['pend_id'] 		= $row->pend_id;
				$isi['id_pekerjaan']	= $row->id_pekerjaan;
				$isi['id_sk'] 			= $row->id_sk;
				$isi['foto_pasien'] 	= $row->foto_pasien;
				$isi['is_aktif']		= $row->is_aktif;
			}
		}
		else {
				$isi['no_rek_medik']			= '';
				$isi['nm_pasien']			= '';
				$isi['id_gender'] 		= '';
				$isi['tgl_lahir'] 	= '';
				$isi['tmpt_lahir']			= '';
				$isi['no_identitas'] 			= '';
				$isi['no_telp']			= '';
				$isi['gol_darah']			= '';
				$isi['alamat']			= '';
				$isi['kd_kel']			= '';
				$isi['agama_id'] 		= '';
				$isi['pend_id'] 	= '';
				$isi['id_pekerjaan'] 			= '';
				$isi['id_sk']			= '';
				$isi['foto_pasien']			= '';
				$isi['is_aktif']			= '';
		} 
		$this->load->view('vhome', $isi);
	}
}
