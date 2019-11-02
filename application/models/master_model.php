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
class Master_model extends CI_Model {

/////////////////////////////////////////--------START REFERENSI-------/////////////////////////////////////////
//PROPINSI REFERENSI
	function buat_kode_prop()  {
		  $this->db->select('RIGHT(r_prop.kd_prop,4) as kode', FALSE);
		  $this->db->order_by('kd_prop','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_prop');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-WIL-PROP-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function get_prop($key){
		$this->db->where('kd_prop',$key);
		$hasil = $this->db->get('r_prop');
		return $hasil;
	}

	function getupdate_prop($key,$data){
		$this->db->where('kd_prop', $key);
		$this->db->update('r_prop', $data);
	}

	function getinsert_prop($data){
		$this->db->insert('r_prop', $data);
	}

	function getdelete_prop($key){
		$this->db->where('kd_prop', $key);
		$this->db->delete('r_prop');
	}

//KABUPATEN REFERENSI
	function buat_kode_kab()  {
		  $this->db->select('RIGHT(r_kab.kd_kab,4) as kode', FALSE);
		  $this->db->order_by('kd_kab','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_kab');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-WIL-KAB-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_kabupaten(){
		$data_kab = "SELECT
  						r_prop.nm_prop,
  						r_prop.kd_prop,
  						r_kab.nm_kab,
  						r_kab.kd_kab
					FROM r_prop
 					INNER JOIN r_kab
    				ON r_prop.kd_prop = r_kab.kd_prop";
					return $this->db->query($data_kab);
	}

	function get_kab($key){
		$this->db->where('kd_kab',$key);
		$hasil = $this->db->get('r_kab');
		return $hasil;
		//return $this->db->get('r_kab');
	}

	function getupdate_kab($key,$data_kab){
		$this->db->where('kd_kab', $key);
		$this->db->update('r_kab', $data_kab);
	}

	function getinsert_kab($data_kab){
		$this->db->insert('r_kab', $data_kab);
	}

	function getdelete_kab($key){
		$this->db->where('kd_kab', $key);
		$this->db->delete('r_kab');
	}

//KACAMATAN REFERENSI
	function buat_kode_kec()  {
		  $this->db->select('RIGHT(r_kec.kd_kec,4) as kode', FALSE);
		  $this->db->order_by('kd_kec','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_kec');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-WIL-KEC-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_kecamatan(){
		$data_kec = "SELECT
					  r_kec.kd_kec,
					  r_kec.nm_kec,
					  r_kab.kd_kab,
					  r_kab.nm_kab,
					  r_prop.kd_prop,
					  r_prop.nm_prop
					FROM r_prop
					  INNER JOIN r_kab
					    ON r_prop.kd_prop = r_kab.kd_prop
					  INNER JOIN r_kec
					    ON r_kab.kd_kab = r_kec.kd_kab";

					  

					return $this->db->query($data_kec);
	}
	function get_kec($key){
		$this->db->where('kd_kec',$key);
		$hasil = $this->db->get('r_kec');
		return $hasil;
	}

	function getupdate_kec($key,$data_kec){
		$this->db->where('kd_kec', $key);
		$this->db->update('r_kec', $data_kec);
	}

	function getinsert_kec($data_kec){
		$this->db->insert('r_kec', $data_kec);
	}

	function getdelete_kec($key){
		$this->db->where('kd_kec', $key);
		$this->db->delete('r_kec');
	}

//KELURAHAN REFERENSI
	function buat_kode_kelurahan()  {
		  $this->db->select('RIGHT(r_kel.kd_kel,4) as kode', FALSE);
		  $this->db->order_by('kd_kel','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_kel');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-WIL-KEL-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_kelurahan(){
		$data_kel = "SELECT
					  r_kel.kd_kel,
					  r_kel.nm_kel,
					  r_kec.kd_kec,
					  r_kec.nm_kec,
					  r_kab.kd_kab,
					  r_kab.nm_kab,
					  r_prop.kd_prop,
					  r_prop.nm_prop
					FROM r_prop
					  INNER JOIN r_kab
					    ON r_prop.kd_prop = r_kab.kd_prop
					  INNER JOIN r_kec
					    ON r_kab.kd_kab = r_kec.kd_kab
							INNER JOIN r_kel
					    		ON r_kec.kd_kec = r_kel.kd_kec";
					return $this->db->query($data_kel);
	}

	function get_kel($key){
		$this->db->where('kd_kel',$key);
		$hasil = $this->db->get('r_kel');
		return $hasil;
	}

	function getupdate_kel($key,$data_kel){
		$this->db->where('kd_kel', $key);
		$this->db->update('r_kel', $data_kel);
	}

	function getinsert_kel($data_kel){
		$this->db->insert('r_kel', $data_kel);
	}

	function getdelete_kel($key){
		$this->db->where('kd_kel', $key);
		$this->db->delete('r_kel');
	}
	
//REFERENSI KELAS PELAYANAN REFERENSI
	function buat_kode_kelas_pelayanan()  {
		  $this->db->select('RIGHT(r_kelas.kelas_id,4) as kode', FALSE);
		  $this->db->order_by('kelas_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_kelas');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-KLS-PEL-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_kelas_pel($key){
		$this->db->where('kelas_id',$key);
		$hasil = $this->db->get('r_kelas');
		return $hasil;
	}

	function getupdate_kelas_pel($key,$data_kel_pel){
		$this->db->where('kelas_id', $key);
		$this->db->update('r_kelas', $data_kel_pel);
	}

	function getinsert_kelas_pel($data_kel_pel){
		$this->db->insert('r_kelas', $data_kel_pel);
	}

	function getdelete_kelas_pel($key){
		$this->db->where('kelas_id', $key);
		$this->db->delete('r_kelas');
	}

//KELAS REFERENSI PERAN PELAKSANA
	function buat_kode_peran_pelaksana()  {
		  $this->db->select('RIGHT(r_peran_pelaksana.peran_pelaksana_id,4) as kode', FALSE);
		  $this->db->order_by('peran_pelaksana_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_peran_pelaksana');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-PR-PEL-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_pp($key){
		$this->db->where('peran_pelaksana_id',$key);
		$hasil = $this->db->get('r_peran_pelaksana');
		return $hasil;
	}

	function getupdate_pp($key,$data_peran){
		$this->db->where('peran_pelaksana_id', $key);
		$this->db->update('r_peran_pelaksana', $data_peran);
	}

	function getinsert_pp($data_peran){
		$this->db->insert('r_peran_pelaksana', $data_peran);
	}

	function getdelete_pp($key){
		$this->db->where('peran_pelaksana_id', $key);
		$this->db->delete('r_peran_pelaksana');
	}

//REFERENSI JENIS GRUP TINDAKAN
	function buat_kode_grup_tindakan()  {
		  $this->db->select('RIGHT(r_grup_tindakan.grup_tindakan_id,4) as kode', FALSE);
		  $this->db->order_by('grup_tindakan_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_grup_tindakan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-GRUP-TIN-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_gt($key){
		$this->db->where('grup_tindakan_id',$key);
		$hasil = $this->db->get('r_grup_tindakan');
		return $hasil;
	}

	function getupdate_gt($key,$data_tindakan){
		$this->db->where('grup_tindakan_id', $key);
		$this->db->update('r_grup_tindakan', $data_tindakan);
	}

	function getinsert_gt($data_tindakan){
		$this->db->insert('r_grup_tindakan', $data_tindakan);
	}

	function getdelete_gt($key){
		$this->db->where('grup_tindakan_id', $key);
		$this->db->delete('r_grup_tindakan');
	}

//REFERENSI KATEGORI BARANG
	function buat_kode_kategori_barang()  {
		  $this->db->select('RIGHT(r_kategori_brg.kategori_brg_id,4) as kode', FALSE);
		  $this->db->order_by('kategori_brg_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_kategori_brg');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-KAT-BRG-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_kb($key){
		$this->db->where('kategori_brg_id',$key);
		$hasil = $this->db->get('r_kategori_brg');
		return $hasil;
	}

	function getupdate_kb($key,$data_kb){
		$this->db->where('kategori_brg_id', $key);
		$this->db->update('r_kategori_brg', $data_kb);
	}

	function getinsert_kb($data_kb){
		$this->db->insert('r_kategori_brg', $data_kb);
	}

	function getdelete_kb($key){
		$this->db->where('kategori_brg_id', $key);
		$this->db->delete('r_kategori_brg');
	}

//REFERENSI KATEGORI DAFTAR BARANG SATUAN
	function buat_kode_satuan_brg()  {
		  $this->db->select('RIGHT(r_satuan.satuan_id,4) as kode', FALSE);
		  $this->db->order_by('satuan_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_satuan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-SATUAN-BRG-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}	
	function get_bds($key){
		$this->db->where('satuan_id',$key);
		$hasil = $this->db->get('r_satuan');
		return $hasil;
	}

	function getupdate_bds($key,$data_satuan){
		$this->db->where('satuan_id', $key);
		$this->db->update('r_satuan', $data_satuan);
	}

	function getinsert_bds($data_satuan){
		$this->db->insert('r_satuan', $data_satuan);
	}

	function getdelete_bds($key){
		$this->db->where('satuan_id', $key);
		$this->db->delete('r_satuan');
	}

//REFERENSI AGAMA
	function buat_kode_agama()  {
		  $this->db->select('RIGHT(r_agama.agama_id,4) as kode', FALSE);
		  $this->db->order_by('agama_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_agama');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-REF-AGAMA-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_agama($key){
		$this->db->where('agama_id',$key);
		$hasil = $this->db->get('r_agama');
		return $hasil;
	}

	function getupdate_agama($key,$data_agama){
		$this->db->where('agama_id', $key);
		$this->db->update('r_agama', $data_agama);
	}

	function getinsert_agama($data_agama){
		$this->db->insert('r_agama', $data_agama);
	}

	function getdelete_agama($key){
		$this->db->where('agama_id', $key);
		$this->db->delete('r_agama');
	}

//REFERENSI KATEGORI PENDIDIKAN
	function buat_kode_pendidikan()  {
		  $this->db->select('RIGHT(r_pend.pend_id,4) as kode', FALSE);
		  $this->db->order_by('pend_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_pend');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-REF-PEND-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}	
	function get_pend($key){
		$this->db->where('pend_id',$key);
		$hasil = $this->db->get('r_pend');
		return $hasil;
	}

	function getupdate_pend($key,$data_pend){
		$this->db->where('pend_id', $key);
		$this->db->update('r_pend', $data_pend);
	}

	function getinsert_pend($data_pend){
		$this->db->insert('r_pend', $data_pend);
	}

	function getdelete_pend($key){
		$this->db->where('pend_id', $key);
		$this->db->delete('r_pend');
	}

//REFERENSI STATUS KAWIN
	function buat_kode_sk()  {
		  $this->db->select('RIGHT(r_status_kawin.id_sk,4) as kode', FALSE);
		  $this->db->order_by('id_sk','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_status_kawin');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-REF-SK-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_statuskawin($key){
		$this->db->where('id_sk',$key);
		$hasil = $this->db->get('r_status_kawin');
		return $hasil;
	}

	function getupdate_statuskawin($key,$data_statuskawin){
		$this->db->where('id_sk', $key);
		$this->db->update('r_status_kawin', $data_statuskawin);
	}

	function getinsert_statuskawin($data_statuskawin){
		$this->db->insert('r_status_kawin', $data_statuskawin);
	}

	function getdelete_statuskawin($key){
		$this->db->where('id_sk', $key);
		$this->db->delete('r_status_kawin');
	}

//REFERENSI KATEGORI PEKERJAAN
	function buat_kode_pekerjaan()  {
		  $this->db->select('RIGHT(r_pekerjaan.id_pekerjaan,4) as kode', FALSE);
		  $this->db->order_by('id_pekerjaan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_pekerjaan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-REF-PKRJA-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_pek($key){
		$this->db->where('id_pekerjaan',$key);
		$hasil = $this->db->get('r_pekerjaan');
		return $hasil;
	}

	function getupdate_pek($key,$data_pek){
		$this->db->where('id_pekerjaan', $key);
		$this->db->update('r_pekerjaan', $data_pek);
	}

	function getinsert_pek($data_pek){
		$this->db->insert('r_pekerjaan', $data_pek);
	}

	function getdelete_pek($key){
		$this->db->where('id_pekerjaan', $key);
		$this->db->delete('r_pekerjaan');
	}

//REFERENSI DAFTAR BANK
	function buat_kode_bank()  {
		  $this->db->select('RIGHT(r_bank.bank_id,4) as kode', FALSE);
		  $this->db->order_by('bank_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_bank');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-REF-BANK-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_bank($key){
		$this->db->where('bank_id',$key);
		$hasil = $this->db->get('r_bank');
		return $hasil;
	}

	function getupdate_bank($key,$data_bank){
		$this->db->where('bank_id', $key);
		$this->db->update('r_bank', $data_bank);
	}

	function getinsert_bank($data_bank){
		$this->db->insert('r_bank', $data_bank);
	}

	function getdelete_bank($key){
		$this->db->where('bank_id', $key);
		$this->db->delete('r_bank');
	}

//REKENING KLINIK
	function buat_kode_rek()  {
		  $this->db->select('RIGHT(r_rekening.rek_id,4) as kode', FALSE);
		  $this->db->order_by('rek_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('r_rekening');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-REK-KLINIK-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_rek(){
		$data_rek = "SELECT
						r_bank.bank_id,
						r_bank.bank,
						r_rekening.rek_id,
						r_rekening.no_rek,
						r_rekening.is_aktif 
					FROM
						r_rekening
						INNER JOIN r_bank ON r_bank.bank_id = r_rekening.bank_id";
		return $this->db->query($data_rek);
	}

	function get_rekening($key){
		$this->db->where('rek_id',$key);
		$hasil = $this->db->get('r_rekening');
		return $hasil;
	}

	function getupdate_rek($key,$data_rek){
		$this->db->where('rek_id', $key);
		$this->db->update('r_rekening', $data_rek);
	}

	function getinsert_rek($data_rek){
		$this->db->insert('r_rekening', $data_rek);
	}

	function getdelete_rek($key){
		$this->db->where('rek_id', $key);
		$this->db->delete('r_rekening');
	}

/////////////////////////////////////////--------END REFERENSI--------/////////////////////////////////////////

/////////////////////////////////////////--------START MASTER--------/////////////////////////////////////////

	function get_grup($key){
		$this->db->where('grup_id',$key);
		$hasil = $this->db->get('grup');
		return $hasil;
	}

	function getupdate_grup($key,$data_grup){
		$this->db->where('rek_id', $key);
		$this->db->update('grup', $data_grup);
	}

	function getinsert_grup($data_grup){
		$this->db->insert('grup', $data_grup);
	}

	function getdelete_grup($key){
		$this->db->where('grup_id', $key);
		$this->db->delete('grup');
	}
//REFERENSI DAFTAR PERAN PELAKSANA


//////////////////////DAFTAR USER////////////////////////
function get_daftar(){
		$datauser = "SELECT
						grup.grup_id,
						grup.grup,
						`user`.code_user,
						`user`.nama,
						`user`.pass,
						`user`.is_aktif 
					FROM
						`user`
						INNER JOIN grup ON grup.grup_id = `user`.grup_id
					";
		return $this->db->query($datauser);
	}
function get_user_daftar($key){
		$this->db->where('code_user',$key);
		$hasil = $this->db->get('user');
		return $hasil;
	}

	function getupdate_user_daftar($key,$datauser){
	$this->db->where('code_user', $key);
	$this->db->update('user', $datauser);
	}

	function getinsert_user_daftar($datauser){
	$this->db->insert('user', $datauser);
	}

	function getdelete_user_daftar($key){
	$this->db->where('code_user', $key);
	$this->db->delete('user');
	}
//////////////////////END DAFTAR USER////////////////////////
	
//MASTER TINDAKAN
	function buat_kode_tin()  {
		  $this->db->select('RIGHT(m_tindakan.kode_tindakan,4) as kode', FALSE);
		  $this->db->order_by('kode_tindakan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_tindakan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-TIN-MED-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_tin(){
		$data_tin = "SELECT
					r_grup_tindakan.grup_tindakan,
					m_tindakan.kode_tindakan,
					m_tindakan.tindakan,
					m_tindakan.s_pelaksana,
					m_tindakan.is_aktif
					FROM
					m_tindakan
					INNER JOIN r_grup_tindakan ON m_tindakan.grup_tindakan_id = r_grup_tindakan.grup_tindakan_id
					";
		return $this->db->query($data_tin);
	}

	function get_tindakan($key){
		$this->db->where('kode_tindakan',$key);
		$hasil = $this->db->get('m_tindakan');
		return $hasil;
	}

	function getupdate_tin($key,$data_tin){
		$this->db->where('kode_tindakan', $key);
		$this->db->update('m_tindakan', $data_tin);
	}

	function getinsert_tin($data_tin){
		$this->db->insert('m_tindakan', $data_tin);
	}

	function getdelete_tin($key){
		$this->db->where('kode_tindakan', $key);
		$this->db->delete('m_tindakan');
	}
	function buat_kode_tindakan()  {
		  $this->db->select('RIGHT(m_tindakan.kode_tindakan,4) as kode', FALSE);
		  $this->db->order_by('kode_tindakan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_tindakan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "TINDAKAN-KLINIK-MUTIAVIE-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

//MASTER PELAKSANA
	function get_pel(){
		$data_pel = "SELECT
					  m_pelaksana.kode_pelaksana,
					  m_pelaksana.nama_pelaksana,
					  r_peran_pelaksana.peran_pelaksana,
					  m_pelaksana.is_aktif
					FROM m_pelaksana
					  INNER JOIN r_peran_pelaksana
					    ON m_pelaksana.peran_pelaksana_id = r_peran_pelaksana.peran_pelaksana_id
					";
		return $this->db->query($data_pel);
	}

	function get_pelaksana($key){
		$this->db->where('kode_pelaksana',$key);
		$hasil = $this->db->get('m_pelaksana');
		return $hasil;
	}

	function getupdate_pel($key,$data_pel){
		$this->db->where('kode_pelaksana', $key);
		$this->db->update('m_pelaksana', $data_pel);
	}

	function getinsert_pel($data_pel){
		$this->db->insert('m_pelaksana', $data_pel);
	}

	function getdelete_pel($key){
		$this->db->where('kode_pelaksana', $key);
		$this->db->delete('m_pelaksana');
	}

	function buat_kode_pelaksana()  {
		  $this->db->select('RIGHT(m_pelaksana.kode_pelaksana,4) as kode', FALSE);
		  $this->db->order_by('kode_pelaksana','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_pelaksana');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "PELKSANA-KLINIK-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

//MASTER BARANG
	function get_bar(){
		$data_bar = "SELECT
						m_barang.kode_barang,
						m_barang.nm_barang,
						m_barang.spesifikasi,
						m_barang.is_aktif,
						m_barang.foto_brg,
						r_grup_barang.nm_grup_brg,
						r_satuan.satuan,
						r_kategori_brg.kategori_brg
						FROM
						m_barang
						INNER JOIN r_grup_barang ON m_barang.grup_brg_id = r_grup_barang.grup_brg_id
						INNER JOIN r_kategori_brg ON m_barang.kategori_brg_id = r_kategori_brg.kategori_brg_id
						INNER JOIN r_satuan ON m_barang.satuan_id = r_satuan.satuan_id
					";
		return $this->db->query($data_bar);
	}

	function buat_kode_barang()  {
		  $this->db->select('RIGHT(m_barang.kode_barang,4) as kode', FALSE);
		  $this->db->order_by('kode_barang','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_barang');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "BRG-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function get_barang($key){
		$this->db->where('kode_barang',$key);
		$hasil = $this->db->get('m_barang');
		return $hasil;
	}

	function getupdate_bar($key,$data_bar){
		$this->db->where('kode_barang', $key);
		$this->db->update('m_barang', $data_bar);
	}

	function getinsert_bar($data_bar){
		$this->db->insert('m_barang', $data_bar);
	}

	function getdelete_bar($key){
		$this->db->where('kode_barang', $key);
		$this->db->delete('m_barang');
	}

//MASTER PEMASOK
	function buat_kode_pemasok()  {
		  $this->db->select('RIGHT(m_pemasok.kode_pemasok,4) as kode', FALSE);
		  $this->db->order_by('kode_pemasok','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_pemasok');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-PEM-KLINIK-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_pemasok($key){
		$this->db->where('kode_pemasok',$key);
		$hasil = $this->db->get('m_pemasok');
		return $hasil;
	}

	function getupdate_pemasok($key,$data_pemasok){
		$this->db->where('kode_pemasok', $key);
		$this->db->update('m_pemasok', $data_pemasok);
	}

	function getinsert_pemasok($data_pemasok){
		$this->db->insert('m_pemasok', $data_pemasok);
	}

	function getdelete_pemasok($key){
		$this->db->where('kode_pemasok', $key);
		$this->db->delete('m_pemasok');
	}

//MASTER TARIF TINDAKAN
	function get_tartin(){
		$data_tarif_tindakan = "SELECT
								  t_tarif_tindakan.tarif_tindakan_id,
								  t_tarif_tindakan.kode_tindakan,
								  t_tarif_tindakan.grup_tindakan_id,
								  t_tarif_tindakan.kelas_id,
								  t_tarif_tindakan.tarif,
								  t_tarif_tindakan.disc_persen,
								  t_tarif_tindakan.disc_rupiah,
								  t_tarif_tindakan.tgl_berlaku,
								  t_tarif_tindakan.ket,
								  t_tarif_tindakan.is_aktif,
								  m_tindakan.tindakan,
								  r_kelas.kelas,
								  r_grup_tindakan.grup_tindakan
									FROM t_tarif_tindakan
									INNER JOIN m_tindakan ON t_tarif_tindakan.kode_tindakan = m_tindakan.kode_tindakan
									INNER JOIN r_kelas ON t_tarif_tindakan.kelas_id = r_kelas.kelas_id
									INNER JOIN r_grup_tindakan ON t_tarif_tindakan.grup_tindakan_id = r_grup_tindakan.grup_tindakan_id
					";

		return $this->db->query($data_tarif_tindakan);
	}

	function get_tartin2(){
		$data_tarif_tindakan2 = "SELECT
								t_tarif_tindakan.tarif_tindakan_id,
								t_tarif_tindakan.tarif,
								m_tindakan.kode_tindakan,
								m_tindakan.tindakan 
							FROM
								t_tarif_tindakan
								INNER JOIN m_tindakan ON m_tindakan.kode_tindakan = t_tarif_tindakan.kode_tindakan
					";

		return $this->db->query($data_tarif_tindakan2);
	}

	function buat_kode_tarif_tindakan()  {
		  $this->db->select('RIGHT(t_tarif_tindakan.tarif_tindakan_id,4) as kode', FALSE);
		  $this->db->order_by('tarif_tindakan_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('t_tarif_tindakan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "TARIF-TINDAKAN-PASIEN-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function get_tarif_tindakan($key){
		$this->db->where('tarif_tindakan_id',$key);
		$hasil = $this->db->get('t_tarif_tindakan');
		return $hasil;
	}

	function getupdate_tarif_tindakan($key,$data_tarif_tindakan){
		$this->db->where('tarif_tindakan_id', $key);
		$this->db->update('t_tarif_tindakan', $data_tarif_tindakan);
	}

	function getinsert_tarif_tindakan($data_tarif_tindakan){
		$this->db->insert('t_tarif_tindakan', $data_tarif_tindakan);
	}

	function getdelete_tarif_tindakan($key){
		$this->db->where('tarif_tindakan_id', $key);
		$this->db->delete('t_tarif_tindakan');
	}

//MASTER HARGA BELI
	function buat_kode_harbel()  {
		  $this->db->select('RIGHT(t_harga_beli.harga_beli_id,4) as kode', FALSE);
		  $this->db->order_by('harga_beli_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('t_harga_beli');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-HARGA-BELI-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_harbel(){
		$data_harga_beli = "SELECT
							  r_kategori_brg.kategori_brg,
							  t_harga_beli.harga_beli,
							  t_harga_beli.tgl_berlaku,
							  m_barang.nm_barang,
							  t_harga_beli.harga_beli_id,
							  t_harga_beli.ket,
							  m_barang.kode_barang
							FROM m_barang
							  INNER JOIN t_harga_beli
							    ON m_barang.kode_barang = t_harga_beli.kode_barang
							  INNER JOIN r_kategori_brg
							    ON r_kategori_brg.kategori_brg_id = t_harga_beli.kategori_brg_id
					";

		return $this->db->query($data_harga_beli);
	}
	function get_harga_beli($key){
		$this->db->where('harga_beli_id',$key);
		$hasil = $this->db->get('t_harga_beli');
		return $hasil;
	}

	function getupdate_harga_beli($key,$data_harga_beli){
		$this->db->where('harga_beli_id', $key);
		$this->db->update('t_harga_beli', $data_harga_beli);
	}

	function getinsert_harga_beli($data_harga_beli){
		$this->db->insert('t_harga_beli', $data_harga_beli);
	}

	function getdelete_harga_beli($key){
		$this->db->where('harga_beli_id', $key);
		$this->db->delete('t_harga_beli');
	}	

//MASTER HARGA JUAL
	function get_harjual(){
		$data_harga_jual = "SELECT
						m_barang.kode_barang,
						m_barang.nm_barang,
						r_kelas.kelas,
						r_kelas.kelas_id,
						t_harga_jual.harga_jual_id,
						t_harga_jual.harga_jual,
						t_harga_jual.disc_persen,
						t_harga_jual.disc_rupiah,
						t_harga_jual.tgl_berlaku,
						t_harga_jual.ket 
					FROM
						t_harga_jual
						INNER JOIN m_barang ON m_barang.kode_barang = t_harga_jual.kode_barang
						INNER JOIN r_kelas ON r_kelas.kelas_id = t_harga_jual.kelas_id";
		return $this->db->query($data_harga_jual);
	}

	function buat_kode_harga_jual()  {
		  $this->db->select('RIGHT(t_harga_jual.harga_jual_id,4) as kode', FALSE);
		  $this->db->order_by('harga_jual_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('t_harga_jual');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "HARGA-JUAL-BRG-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	

	function get_harga_jual($key){
		$this->db->where('harga_jual_id',$key);
		$hasil = $this->db->get('t_harga_jual');
		return $hasil;
	}

	function getupdate_harga_jual($key,$data_harga_jual){
		$this->db->where('harga_jual_id', $key);
		$this->db->update('t_harga_jual', $data_harga_jual);
	}

	function getinsert_harga_jual($data_harga_jual){
		$this->db->insert('t_harga_jual', $data_harga_jual);
	}

	function getdelete_harga_jual($key){
		$this->db->where('harga_jual_id', $key);
		$this->db->delete('t_harga_jual');
	}	

//MASTER HADIAH
	function buat_kode_hadiah()  {
		  $this->db->select('RIGHT(m_hadiah.id_hadiah,4) as kode', FALSE);
		  $this->db->order_by('id_hadiah','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_hadiah');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KD-DAF-HADIAH-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	function get_hd($key){
		$this->db->where('id_hadiah',$key);
		$hasil = $this->db->get('m_hadiah');
		return $hasil;
	}

	function getupdate_hd($key,$data_hd){
		$this->db->where('id_hadiah', $key);
		$this->db->update('m_hadiah', $data_hd);
	}

	function getinsert_hd($data_hd){
		$this->db->insert('m_hadiah', $data_hd);
	}

	function getdelete_hd($key){
		$this->db->where('id_hadiah', $key);
		$this->db->delete('m_hadiah');
	}

/////////////////////////////////////////--------END MASTER--------/////////////////////////////////////////

/////////////////////////////////////////--------START INVENTORI--------/////////////////////////////////////////

//DAFTAR PENERIMAAN OBAT
	 function buat_kode_penerimaan_obat()   {
		  $this->db->select('RIGHT(in_penerimaan_obat.no_penerimaan_obat,4) as kode', FALSE);
		  $this->db->order_by('no_penerimaan_obat','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('in_penerimaan_obat');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "PENERIMAAN-OBAT-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function get_pen(){
		$data_pen = "SELECT
						m_barang.kode_barang,
						m_barang.nm_barang,
						m_pemasok.kode_pemasok,
						m_pemasok.nm_pemasok,
						in_penerimaan_obat.tanggal_penerimaan,
						in_penerimaan_obat.jam,
						in_penerimaan_obat.no_penerimaan_obat,
						in_penerimaan_obat.jumlah,
						in_penerimaan_obat.ket 
					FROM
						in_penerimaan_obat
						INNER JOIN m_pemasok ON m_pemasok.kode_pemasok = in_penerimaan_obat.id_pemasok
						INNER JOIN m_barang ON m_barang.kode_barang = in_penerimaan_obat.id_barang
					";
		return $this->db->query($data_pen);

	}
	function get_penerimaan($key){
		$this->db->where('no_penerimaan_obat',$key);
		$hasil = $this->db->get('in_penerimaan_obat');
		return $hasil;
	}

	function getupdate_pen($key,$data_pen){
		$this->db->where('no_penerimaan_obat', $key);
		$this->db->update('in_penerimaan_obat', $data_pen);
	}

	function getinsert_pen($data_pen){
		$this->db->insert('in_penerimaan_obat', $data_pen);
	}

	function getdelete_pen($key){
		$this->db->where('no_penerimaan_obat', $key);
		$this->db->delete('in_penerimaan_obat');
	}

//DAFTAR STOK OPNAME OBAT
	function get_stokop(){
		$data_stok = "SELECT
						  m_pemasok.nm_pemasok,
						  m_barang.nm_barang,
						  t_penerimaan_rinci.kode_penerimaan,
						  t_penerimaan_rinci.tanggal_penerimaan,
						  t_penerimaan_rinci.jam,
						  t_penerimaan_rinci.jumlah,
						  t_penerimaan_rinci.ket
						FROM m_pemasok
						  INNER JOIN t_penerimaan_rinci
						    ON m_pemasok.kode_pemasok = t_penerimaan_rinci.kode_pemasok
						  INNER JOIN m_barang
						    ON m_barang.kode_barang = t_penerimaan_rinci.kode_barang
					";
		return $this->db->query($data_stok);

	}
	function get_stokopnameobat($key){
		$this->db->where('kode_stok_opname_obat',$key);
		$hasil = $this->db->get('t_stok_opname_rinci');
		return $hasil;
	}

	function getupdate_stokopnameobat($key,$data_stok){
		$this->db->where('kode_stok_opname_obat', $key);
		$this->db->update('t_stok_opname_rinci', $data_stok);
	}

	function getinsert_stokopnameobat($data_stok){
		$this->db->insert('t_stok_opname_rinci', $data_stok);
	}

	function getdelete_stokopnameobat($key){
		$this->db->where('kode_stok_opname_obat', $key);
		$this->db->delete('t_stok_opname_rinci');
	}

//DAFTAR PENERIMAAN HADIAH

	 function buat_kode_penerimaan_hadiah()   {
		  $this->db->select('RIGHT(in_penerimaan_hadiah.no_penerimaan_hadiah,4) as kode', FALSE);
		  $this->db->order_by('no_penerimaan_hadiah','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('in_penerimaan_hadiah');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "PENERIMAAN-HADIAH-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function get_penha(){
		$data_penha = "SELECT
						m_hadiah.id_hadiah,
						m_hadiah.hadiah,
						in_penerimaan_hadiah.no_penerimaan_hadiah,
						in_penerimaan_hadiah.tanggal,
						in_penerimaan_hadiah.jam,
						in_penerimaan_hadiah.jumlah,
						in_penerimaan_hadiah.ket 
					FROM
						in_penerimaan_hadiah
						INNER JOIN m_hadiah ON m_hadiah.id_hadiah = in_penerimaan_hadiah.id_hadiah
					";
		return $this->db->query($data_penha);

	}
	function get_penerimaanhadiah($key){
		$this->db->where('no_penerimaan_hadiah',$key);
		$hasil = $this->db->get('in_penerimaan_hadiah');
		return $hasil;
	}

	function getupdate_penerimaanhadiah($key,$data_penha){
		$this->db->where('no_penerimaan_hadiah', $key);
		$this->db->update('in_penerimaan_hadiah', $data_penha);
	}

	function getinsert_penerimaanhadiah($data_penha){
		$this->db->insert('in_penerimaan_hadiah', $data_penha);
	}

	function getdelete_penerimaanhadiah($key){
		$this->db->where('no_penerimaan_hadiah', $key);
		$this->db->delete('in_penerimaan_hadiah');
	}


/////////////////////////////////////////--------END INVENTORI-------/////////////////////////////////////////

/////////////////////////////////////////--------START MASTER--------/////////////////////////////////////////

 function buat_kode_rm()   {
		  $this->db->select('RIGHT(m_pasien.no_rek_medik,4) as kode', FALSE);
		  $this->db->order_by('no_rek_medik','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "REKMED-MUTIAVIE-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
		function get_pas(){
			$data_pas = "	SELECT
							m_pasien.no_rek_medik,
							m_pasien.nm_pasien,
							m_pasien.tgl_lahir,
							m_pasien.tmpt_lahir,
							m_pasien.no_identitas,
							m_pasien.no_telp,
							m_pasien.gol_darah,
							m_pasien.alamat,
							m_pasien.foto_pasien,
							m_pasien.create_at,
							m_pasien.is_aktif,
							r_agama.agama_id,
							r_agama.agama,
							r_pend.pend_id,
							r_pend.pendidikan,
							r_kel.kd_kel,
							r_kel.kd_kec,
							r_gender.id_gender,
							r_gender.gender,
							r_status_kawin.id_sk,
							r_status_kawin.status_kawin,
							r_pekerjaan.id_pekerjaan,
							r_pekerjaan.pekerjaan 
						FROM
							m_pasien
							INNER JOIN r_gender ON r_gender.id_gender = m_pasien.id_gender
							INNER JOIN r_agama ON r_agama.agama_id = m_pasien.agama_id
							INNER JOIN r_kel ON r_kel.kd_kel = m_pasien.kd_kel
							INNER JOIN r_pekerjaan ON r_pekerjaan.id_pekerjaan = m_pasien.id_pekerjaan
							INNER JOIN r_pend ON r_pend.pend_id = m_pasien.pend_id
							INNER JOIN r_status_kawin ON r_status_kawin.id_sk = m_pasien.id_sk

					";
		return $this->db->query($data_pas);

	}

	function get_pasien($key){
		$this->db->where('no_rek_medik',$key);
		$hasil = $this->db->get('m_pasien');
		return $hasil;
	}

	function getupdate_pasien($key,$data_pas){
		$this->db->where('no_rek_medik', $key);
		$this->db->update('m_pasien', $data_pas);
	}

	function getinsert_pasien($data_pas){
		$this->db->insert('m_pasien', $data_pas);
	}

	function getdelete_pasien($key){
		$this->db->where('no_rek_medik', $key);
		$this->db->delete('m_pasien');
	}


//DAFTAR REGISTRASI
	function get_reg(){
		$data_reg = "	SELECT
						r_jenis_kunjungan.jenis_kunjungan_id,
						r_jenis_kunjungan.jenis_kunjungan,
						m_pasien.no_rek_medik,
						m_pasien.nm_pasien,
						t_registrasi.tanggal_registrasi,
						t_registrasi.no_registrasi 
					FROM
						t_registrasi
						INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik
						INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = t_registrasi.jenis_kunjungan_id
					";
		return $this->db->query($data_reg);

	}

	function get_registrasi($key){
		$this->db->where('no_registrasi',$key);
		$hasil = $this->db->get('t_registrasi');
		return $hasil;
	}

	function getupdate_reg($key,$data_reg){
		$this->db->where('no_registrasi', $key);
		$this->db->update('t_registrasi', $data_reg);
	}

	function getinsert_reg($data_reg){
		$this->db->insert('t_registrasi', $data_reg);
	}

	function getdelete_reg($key){
		$this->db->where('no_registrasi', $key);
		$this->db->delete('t_registrasi');
	}

	function get_data_registrasi_bykode($no_rek_medik){
		$hsl=$this->db->query("SELECT * FROM m_pasien WHERE no_rek_medik='$no_rek_medik'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'no_rek_medik' => $data->no_rek_medik,
					'nm_pasien' => $data->nm_pasien,
					'alamat' => $data->alamat,
					);
			}
		}
		return $hasil;
	}

	function buat_kode_reg()  {
		  $this->db->select('RIGHT(t_registrasi.no_registrasi,4) as kode', FALSE);
		  $this->db->order_by('no_registrasi','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('t_registrasi');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "REGISTRASI-PASIEN-MUTIAVIE-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

//////JANJI/////
	function get_jan(){
		$data_janji = "SELECT
						r_peran_pelaksana.peran_pelaksana_id,
						r_peran_pelaksana.peran_pelaksana,
						m_pelaksana.kode_pelaksana,
						m_pelaksana.nama_pelaksana,
						t_registrasi.no_registrasi,
						m_pasien.no_rek_medik,
						m_pasien.nm_pasien,
						m_pasien.no_telp,
						t_janji.janji_id,
						r_jenis_kunjungan.jenis_kunjungan_id,
						r_jenis_kunjungan.jenis_kunjungan,
						t_janji.tanggal_janji,
						t_janji.jam,
						t_janji.keterangan,
						t_janji.is_aktif 
					FROM
						t_janji
						INNER JOIN m_pelaksana ON m_pelaksana.kode_pelaksana = t_janji.kode_pelaksana
						INNER JOIN r_peran_pelaksana ON r_peran_pelaksana.peran_pelaksana_id = m_pelaksana.peran_pelaksana_id
						INNER JOIN t_registrasi ON t_registrasi.no_registrasi = t_janji.no_registrasi
						INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik
						INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = t_janji.jenis_kunjungan_id
															";
		return $this->db->query($data_janji);

	}
	function get_janji($key){
		$this->db->where('janji_id',$key);
		$hasil = $this->db->get('t_janji');
		return $hasil;
	}

	function getupdate_jan($key,$data_janji){
		$this->db->where('janji_id', $key);
		$this->db->update('t_janji', $data_janji);
	}

	function getinsert_jan($data_janji){
		$this->db->insert('t_janji', $data_janji);
	}

	function getdelete_jan($key){
		$this->db->where('janji_id', $key);
		$this->db->delete('t_janji');
	}

	function get_data_janji_bykode($no_registrasi){
		$hsl=$this->db->query("SELECT * FROM t_registrasi WHERE no_registrasi='$no_registrasi'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'no_registrasi' => $data->no_registrasi,
					'no_rek_medik' => $data->no_rek_medik,
					);
			}
		}
		return $hasil;
	}

	function buat_kode_janji()  {
		  $this->db->select('RIGHT(t_janji.janji_id,4) as kode', FALSE);
		  $this->db->order_by('janji_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('t_janji');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "JANJI-PASIEN-MUTIAVIE-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
//DAFTAR PENGELUARAN KLINIK
	function get_peng(){
		$data_peng = "	SELECT
						r_jenis_pengeluaran.jenis_pengeluaran_id,
						r_jenis_pengeluaran.jenis_pengeluaran,
						t_pengeluaran.pengeluaran_id,
						t_pengeluaran.pengeluaran,
						t_pengeluaran.tanggal_pengeluaran,
						t_pengeluaran.jumlah,
						t_pengeluaran.ket 
					FROM
						t_pengeluaran
						INNER JOIN r_jenis_pengeluaran ON r_jenis_pengeluaran.jenis_pengeluaran_id = t_pengeluaran.jenis_pengeluaran_id

					";
		return $this->db->query($data_peng);

	}

	function get_pengeluaran($key){
		$this->db->where('pengeluaran_id',$key);
		$hasil = $this->db->get('t_pengeluaran');
		return $hasil;
	}

	function getupdate_peng($key,$data_peng){
		$this->db->where('pengeluaran_id', $key);
		$this->db->update('t_pengeluaran', $data_peng);
	}

	function getinsert_peng($data_peng){
		$this->db->insert('t_pengeluaran', $data_peng);
	}

	function getdelete_peng($key){
		$this->db->where('pengeluaran_id', $key);
		$this->db->delete('t_pengeluaran');
	}

	function buat_kode_pengeluaran()  {
		  $this->db->select('RIGHT(t_pengeluaran.pengeluaran_id,4) as kode', FALSE);
		  $this->db->order_by('pengeluaran_id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('t_pengeluaran');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "PENGELUARAN-KLINIK-MUTIAVIE-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

//DAFTAR PELAYANAN KLINIK
	function get_pelayanan(){
		$data_pela = "	SELECT
							r_jenis_kunjungan.jenis_kunjungan_id,
							r_jenis_kunjungan.jenis_kunjungan,
							t_registrasi.no_registrasi,
							m_pasien.no_rek_medik,
							m_pasien.nm_pasien,
							m_pelayanan.kode_pelayanan,
							m_pelayanan.antrian,
							m_pelayanan.tgl_pelayanan,
							m_pelayanan.is_aktif,
							m_pasien.alamat 
						FROM
							m_pelayanan
							INNER JOIN r_jenis_kunjungan ON r_jenis_kunjungan.jenis_kunjungan_id = m_pelayanan.id_kunjungan
							INNER JOIN t_registrasi ON t_registrasi.no_registrasi = m_pelayanan.no_registrasi
							INNER JOIN m_pasien ON m_pasien.no_rek_medik = t_registrasi.no_rek_medik
					";
		return $this->db->query($data_pela);

	}

	function get_pela($key){
		$this->db->where('kode_pelayanan',$key);
		$hasil = $this->db->get('m_pelayanan');
		return $hasil;
	}

	function getupdate_pela($key,$data_pela){
		$this->db->where('kode_pelayanan', $key);
		$this->db->update('m_pelayanan', $data_pela);
	}

	function getinsert_pela($data_pela){
		$this->db->insert('m_pelayanan', $data_pela);
	}

	function getdelete_pela($key){
		$this->db->where('kode_pelayanan', $key);
		$this->db->delete('m_pelayanan');
	}

	function buat_kode_pelayanan()  {
		  $this->db->select('RIGHT(m_pelayanan.kode_pelayanan,4) as kode', FALSE);
		  $this->db->order_by('kode_pelayanan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_pelayanan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "PELAYANAN-PASIEN-MUTIAVIE-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

////BIAYA PASIEN///
		function get_biaya_pasien(){
			$data_biaya = "	SELECT
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
							AND m_pasien.no_rek_medik = t_registrasi.no_rek_medik";
		return $this->db->query($data_biaya);

	}

	function buat_kode_bayar()  {
		  $this->db->select('RIGHT(m_bayar.kode_kwitansi,4) as kode', FALSE);
		  $this->db->order_by('kode_kwitansi','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('m_bayar');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KWITANSI-PASIEN-MUTIAVIE-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function get_biaya($key){
		$this->db->where('kode_kwitansi',$key);
		$hasil = $this->db->get('m_bayar');
		return $hasil;
	}

	function getupdate_biaya($key,$data_biaya){
		$this->db->where('kode_kwitansi', $key);
		$this->db->update('m_bayar', $data_biaya);
	}

	function getinsert_biaya($data_biaya){
		$this->db->insert('m_bayar', $data_biaya);
	}

	function getdelete_biaya($key){
		$this->db->where('kode_kwitansi', $key);
		$this->db->delete('m_bayar');
	}

////PENJUALAN///
	function get_biaya_penjualan(){
			$data_penjualan = "	SELECT
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
							INNER JOIN m_barang ON m_barang.kode_barang = t_harga_jual.kode_barang";
		return $this->db->query($data_penjualan);

	}

	function get_penjualan($key){
		$this->db->where('kode_kwitansi',$key);
		$hasil = $this->db->get('order');
		return $hasil;
	}

	function getupdate_penjualan($key,$data_penjualan){
		$this->db->where('id_order', $key);
		$this->db->update('order', $data_penjualan);
	}

	function getinsert_penjualan($data_penjualan){
		$this->db->insert('order', $data_penjualan);
	}

	function getdelete_penjualan($key){
		$this->db->where('id_order', $key);
		$this->db->delete('order');
	}
/////////////////////////////////////////--------END MASTER-------/////////////////////////////////////////

//JENIS KUNJUNGAN
	function get_kun($key){
		$this->db->where('Jenis_kunjungan_id',$key);
		$hasil = $this->db->get('r_jenis_kunjungan');
		return $hasil;
	}

	function getupdate_kun($key,$data_kun){
		$this->db->where('Jenis_kunjungan_id', $key);
		$this->db->update('r_jenis_kunjungan', $data_kun);
	}

	function getinsert_kun($data_kun){
		$this->db->insert('r_jenis_kunjungan', $data_kun);
	}

	function getdelete_kun($key){
		$this->db->where('Jenis_kunjungan_id', $key);
		$this->db->delete('r_jenis_kunjungan');
	}










	
//JENIS KUNJUNGAN
	function get_gen($key){
		$this->db->where('id_gender',$key);
		$hasil = $this->db->get('r_gender');
		return $hasil;
	}

	function getupdate_gen($key,$data_gen){
		$this->db->where('id_gender', $key);
		$this->db->update('r_gender', $data_gen);
	}

	function getinsert_gen($data_gen){
		$this->db->insert('r_gender', $data_gen);
	}

	function getdelete_gen($key){
		$this->db->where('id_gender', $key);
		$this->db->delete('r_gender');
	}




//JENIS STATUS
	function get_sta($key){
		$this->db->where('id',$key);
		$hasil = $this->db->get('r_status');
		return $hasil;
	}

	function getupdate_sta($key,$data_sta){
		$this->db->where('id', $key);
		$this->db->update('r_status', $data_sta);
	}

	function getinsert_sta($data_sta){
		$this->db->insert('r_status', $data_sta);
	}

	function getdelete_sta($key){
		$this->db->where('id', $key);
		$this->db->delete('r_status');
	}








//GRUP BANRANG
	function get_gb($key){
		$this->db->where('grup_brg_id',$key);
		$hasil = $this->db->get('r_grup_barang');
		return $hasil;
	}

	function getupdate_gb($key,$data_gb){
		$this->db->where('grup_brg_id', $key);
		$this->db->update('r_grup_barang', $data_gb);
	}

	function getinsert_gb($data_gb){
		$this->db->insert('r_grup_barang', $data_gb);
	}

	function getdelete_gb($key){
		$this->db->where('grup_brg_id', $key);
		$this->db->delete('r_grup_barang');
	}











//STATUS JENIS PENGELUARAN KLINIK
	function get_jen_peng($key){
		$this->db->where('id',$key);
		$hasil = $this->db->get('r_jenis_pengeluaran');
		return $hasil;
	}

	function getupdate_jen_peng($key,$data_jen_peng){
		$this->db->where('id', $key);
		$this->db->update('r_jenis_pengeluaran', $data_jen_peng);
	}

	function getinsert_jen_peng($data_peng){
		$this->db->insert('r_jenis_pengeluaran', $data_jen_peng);
	}

	function getdelete_jen_peng($key){
		$this->db->where('id', $key);
		$this->db->delete('r_jenis_pengeluaran');
	}


















}
