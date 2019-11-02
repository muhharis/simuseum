<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hargajual extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Harga Jual";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Harga Jual";
		$isi['fill'] = "master/tarif/hargajual/vhargajual";

		$isi['data'] = $this->master_model->get_harjual();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_barang = $this->db->select('*')->from('m_barang')->get();
		$get_kb = $this->db->select('*')->from('r_kategori_brg')->get();
		$get_kelas_pel = $this->db->select('*')->from('r_kelas')->get();
		
		$isi['title'] = "Harga Jual";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Tambah Harga Jual";
		$isi['fill'] = "master/tarif/hargajual/thargajual";

		$isi['addbrg'] = $get_barang->result();
		$isi['addkb'] = $get_kb->result();
		$isi['addkp'] = $get_kelas_pel->result();

		$isi['id']	    = '';
		$isi['harga_jual']	    = '';
		$isi['tgl_berlaku']	    = '';
		$isi['diskon_persen']	    = '';
		$isi['diskon_rupiah']	    = '';
		$isi['ket'] 		= '';
		$this->load->view('vhome', $isi);
	}

	function ubah(){
		$get_barang = $this->db->select('*')->from('m_barang')->get();
		$get_kb = $this->db->select('*')->from('r_kategori_brg')->get();
		$get_kelas_pel = $this->db->select('*')->from('r_kelas')->get();
		
		$isi['title'] = "Harga Jual";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Master";
		$isi['m3'] = "Tarif";
		$isi['m4'] = "Ubah Harga Jual";
		$isi['fill'] = "master/tarif/hargajual/ehargajual";

		$key = $this->uri->segment(3);
		$this->db->where('id', $key);
		$query = $this->db->get('t_harga_jual');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['addbrg'] = $get_barang->result();
		$isi['addkb'] = $get_kb->result();
		$isi['addkp'] = $get_kelas_pel->result();

		$isi['id']	    		= $row->id;
		$isi['harga_jual']	    = $row->harga_jual;
		$isi['tgl_berlaku']	    = $row->tgl_berlaku;
		$isi['diskon_persen']	= $row->diskon_persen;
		$isi['diskon_rupiah']	= $row->diskon_rupiah;
		$isi['ket'] 			= $row->ket;
			}
		}
		else {
				$isi['addbrg'] = '';
				$isi['addkb'] = '';
				$isi['addkp'] = '';

				$isi['id']	    		= '';
				$isi['harga_jual']	    = '';
				$isi['tgl_berlaku']	    = '';
				$isi['diskon_persen']	= '';
				$isi['diskon_rupiah']	= '';
				$isi['ket'] 			= '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('id');

		$data_harga_jual['id'] = $this->input->post('id');
		$data_harga_jual['kode_barang'] = $this->input->post('kode_barang');
		$data_harga_jual['kategori_brg_id'] = $this->input->post('kategori_brg_id');
		$data_harga_jual['kelas_id'] = $this->input->post('kelas_id');
		$data_harga_jual['harga_jual'] = $this->input->post('harga_jual');
		$data_harga_jual['tgl_berlaku'] = $this->input->post('tgl_berlaku');

		$data_harga_jual['diskon_persen'] = $this->input->post('diskon_persen');
		$data_harga_jual['diskon_rupiah'] = $this->input->post('diskon_rupiah');
		$data_harga_jual['ket'] = $this->input->post('ket');

		$this->load->model('master_model');
		$query = $this->master_model->get_harga_jual($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_harga_jual($key,$data_harga_jual);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_harga_jual($data_harga_jual);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
		}
		Redirect('hargajual');
		
	}

	function hapus(){
		$this->load->model('master_model');

		$key = $this->uri->segment(3);
		$this->db->where('id', $key);
		$query = $this->db->get('t_harga_jual');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_harga_jual($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('hargajual');
	}

}
