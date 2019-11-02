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
class Registrasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}

	function index(){
		$this->load->model('master_model');
		//$this->model_sqrty->getsqrty();
		$isi['title'] = "Registrasi";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Registrasi";
		$isi['m4'] = "Registrasi";
		$isi['fill'] = "billing/registrasi/vregistrasi";

		$isi['data'] = $this->master_model->get_reg();
		$this->load->view('vhome', $isi);
	}

	function tambah(){
		$get_pasien = $this->db->select('*')->from('m_pasien')->get();
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();
		
		$isi['title'] = "Registrasi";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Registrasi";
		$isi['m4'] = " Tambah Data Registrasi";
		$isi['fill'] = "billing/registrasi/tregistrasi";

		$isi['kodeunik2'] = $this->master_model->buat_kode_reg();

		$isi['no_registrasi']	    = '';
		$isi['tanggal_registrasi']	    = '';
		$isi['pasien'] = $get_pasien->result();
		$isi['addpkun'] = $get_kun->result();
		$this->load->view('vhome', $isi);
	}

	function get_data_registrasi(){
		$no_rek_medik=$this->input->post('no_rek_medik');
		$data=$this->master_model->get_data_registrasi_bykode($no_rek_medik);
		echo json_encode($data);
	}

	function ubah(){
		$get_pasien = $this->db->select('*')->from('m_pasien')->get();
		$get_kun = $this->db->select('*')->from('r_jenis_kunjungan')->get();

		$isi['title'] = "Registrasi";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "Billing";
		$isi['m3'] = "Registrasi";
		$isi['m4'] = " Ubah Data Registrasi";
		$isi['fill'] = "billing/registrasi/eregistrasi";

		$key = $this->uri->segment(3);
		$this->db->where('no_registrasi', $key);
		$query = $this->db->get('t_registrasi');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['no_registrasi'] 	= $row->no_registrasi;
				$isi['tanggal_registrasi']	    = $row->tanggal_registrasi;
				$isi['no_rek_medik']	    = $row->no_rek_medik;
				$isi['pasien'] 			= $get_pasien->result();
				$isi['addpkun']	    = $get_kun->result();
			}
		}
		else {
				$isi['no_registrasi'] 	= '';
				$isi['tanggal_registrasi']	    = '';
				$isi['pasien'] 			= '';
				$isi['addpkun']	    = '';
		}
		$this->load->view('vhome', $isi);
	}

	function simpan(){
		$key = $this->input->post('no_registrasi');
		$data_reg['no_registrasi'] = $this->input->post('no_registrasi');
		$data_reg['tanggal_registrasi'] = $this->input->post('tanggal_registrasi');
		$data_reg['no_rek_medik'] = $this->input->post('no_rek_medik');
		$data_reg['jenis_kunjungan_id'] = $this->input->post('jenis_kunjungan_id');

		$this->load->model('master_model');
		$query = $this->master_model->get_registrasi($key);
		if($query->num_rows()>0)
		{
			//awas!!\|/\|/
			$this->master_model->getupdate_reg($key,$data_reg);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-block fade in">
                                  					<button data-dismiss="alert" class="close close-sm" type="button">
                                      					<i class="icon-remove"></i>
                                  					</button>
                                  					<strong>Data berhasil diubah</strong>
                              						</div>');
		} 

		else 
		{
			$this->master_model->getinsert_reg($data_reg);
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
			$this->master_model->getdelete_reg($key);
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Data berhasil dihapus</strong>
                              </div>');
		}
		Redirect('registrasi');
	}

	public function cetak_id($no_registrasi) {
		     $data = $this->load->model('master_model');
		    $this->load->view('laporan/cetak_registrasi',$data);
		    $html = $this->output->get_output();
		    $this->load->library('dompdf_gen');
		    $this->dompdf->load_html($html);
		    $this->dompdf->render();
		    $sekarang=date("d:F:Y:h:m:s");
		    $this->dompdf->stream("Kartu Pasien, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
 }

   public function load_mahasiswa()
	  {
	    $angkatan = $_GET['angkatan'];
	    if ($angkatan == 0) {
	      $data = $this->db->get('tb_mahasiswa')->result();
	    }
	    else
	    {
	      $data = $this->db->get_where('tb_mahasiswa', ['angkatan_id'=>$angkatan])->result();
	    }
	    if (!empty($data)) 
	    {
	      $no=1; foreach ($data as $row): ?>
	      <tr>
	        <td><?php echo $no++ ?></td>
	        <td><?php echo $row->nim ?></td>
	        <td><?php echo $row->nama ?></td>
	        <td><?php echo $row->alamat ?></td>
	      </tr>
	      <?php endforeach ?> <?php
	    }
	    else
	    {
	      ?>
	        <tr><td align="center">Tidak ada data</td></tr>
	      <?php
	    }
	    
	  }

}
