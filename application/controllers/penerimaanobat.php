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
class Penerimaanobat extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$get_pemasok = $this->db->select('*')->from('m_pemasok')->get();
		//$get_barang = $this->db->select('*')->from('m_barang')->get();
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Daftar Penerimaan Obat/Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Obat/Produk";
		$isi['m4'] = "Daftar Penerimaan Obat/Produk";
		$isi['fill'] = "inventori/obat/penerimaanobat/vpenerimaanobat";
		//$isi['kodeunik'] = $this->master_model->buat_kode();
		$isi['data'] = $this->master_model->get_pen();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_pemasok = $this->db->select('*')->from('m_pemasok')->get();
		$get_barang = $this->db->select('*')->from('m_barang')->get();

		$isi['title'] = "Daftar Penerimaan Obat/Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Obat/Produk";
		$isi['m4'] = "Tambah Daftar Penerimaan Obat/Produk";
		$isi['fill'] = "inventori/obat/penerimaanobat/tpenerimaanobat";

		//$isi['data'] = $this->master_model->get_pen();
		$isi['kodeunik2'] = $this->master_model->buat_kode_penerimaan_obat();
		$isi['addbr'] = $get_barang->result();
		$isi['addpm'] = $get_pemasok->result();

		$isi['no_penerimaan_obat'] = '';
		$isi['tanggal_penerimaan']	    = '';
		$isi['jam'] 	= '';
		$isi['jumlah'] = '';
		$isi['ket']	    = '';
		$this->load->view('vhome', $isi);
	}

	//function get_data_barang(){
		//$nm_barang=$this->input->post('nm_barang');
		//$data=$this->master_model->get_data_barang_bykode($nm_barang);
		//echo json_encode($data);
	//}

	function ubah(){
		$get_pemasok = $this->db->select('*')->from('m_pemasok')->get();
		$get_barang = $this->db->select('*')->from('m_barang')->get();

		$isi['title'] = "Daftar Penerimaan Obat/Produk";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Inventori";
		$isi['m3'] = "Obat/Produk";
		$isi['m4'] = "Ubah Daftar Penerimaan Obat/Produk";
		$isi['fill'] = "inventori/obat/penerimaanobat/epenerimaanobat";

		$key = $this->uri->segment(3);
		$this->db->where('no_penerimaan_obat', $key);
		$query = $this->db->get('in_penerimaan_obat');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{	
				$isi['addbr'] = $get_barang->result();
				$isi['addpm'] = $get_pemasok->result();

				$isi['no_penerimaan_obat'] = $row->no_penerimaan_obat;
				$isi['tanggal_penerimaan']	    = $row->tanggal_penerimaan;
				$isi['jam'] 	= $row->jam;
				$isi['jumlah'] = $row->jumlah;
				$isi['ket']	    = $row->ket;
			}
		}
		else {
				$isi['no_penerimaan_obat'] = '';
				$isi['tanggal_penerimaan']	    = '';
				$isi['jam'] 	= '';
				$isi['jumlah'] = '';
				$isi['ket']	    = '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){

		$key = $this->input->post('no_penerimaan_obat');
		$data_pen['no_penerimaan_obat'] = $this->input->post('no_penerimaan_obat');
		$data_pen['tanggal_penerimaan'] = $this->input->post('tanggal_penerimaan');
		$data_pen['jam'] = $this->input->post('jam');
		$data_pen['id_pemasok'] = $this->input->post('id_pemasok');
		$data_pen['id_barang'] = $this->input->post('id_barang');
		$data_pen['jumlah'] = $this->input->post('jumlah');
		$data_pen['ket'] = $this->input->post('ket');

		$this->load->model('master_model');
		$query = $this->master_model->get_penerimaan($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_pen($key,$data_pen);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
			Redirect('penerimaanobat');
		} 

		else 
		{
			$this->master_model->getinsert_pen($data_pen);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil disimpan</strong>
                              						</div>');
			Redirect('penerimaanobat/tambah');
		}
		
		
	}

	function hapus(){
		$this->load->model('master_model');
		
		$key = $this->uri->segment(3);
		$this->db->where('no_penerimaan_obat', $key);
		$query = $this->db->get('in_penerimaan_obat');
		if($query->num_rows()>0)
		{
			$this->master_model->getdelete_pen($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('penerimaanobat');
	}

	function ajax_kode()
	{
		if($this->input->is_ajax_request())
		{
			$keyword 	= $this->input->post('keyword');
			$registered	= $this->input->post('registered');

			$this->load->model('model_master');

			$barang = $this->m_barang->cari_kode($keyword, $registered);

			if($barang->num_rows() > 0)
			{
				$json['status'] 	= 1;
				$json['datanya'] 	= "<ul id='daftar-autocomplete'>";
				foreach($barang->result() as $b)
				{
					$json['datanya'] .= "
						<li>
							<b>Kode</b> : 
							<span id='kodenya'>".$b->kode_barang."</span> <br />
							<span id='barangnya'>".$b->nm_barang."</span>
						</li>
					";
				}
				$json['datanya'] .= "</ul>";
			}
			else
			{
				$json['status'] 	= 0;
			}

			echo json_encode($json);
		}
	}


}
