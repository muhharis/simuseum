<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* File      : Klinik2.php
* Language    : PHP
* Package   : CodeIgniter 3.0
* Location    : application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author      : MuhHaris
* Email       :muhharis90@yahoo.com
* HP      : 089-537-625-7021
*/
// ------------------------------------------------------------------------
class M_cart extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function get(){
    return $this->db->get('produk');
  }

  public function bayar($data){
    return $this->db->insert('order',$data);
  }
  public function getupdate($key,$data_pen){
    $this->db->where('no_penerimaan_obat', $key);
    $this->db->update('in_penerimaan_obat', $data_pen);
  }

  public  function get_order(){
    $data_order = "SELECT
                    t_harga_jual.harga_jual_id,
                    m_barang.kode_barang,
                    m_barang.nm_barang,
                    m_barang.foto_brg,
                    in_penerimaan_obat.jumlah,
                    t_harga_jual.harga_jual,
                    t_harga_jual.disc_persen,
                    t_harga_jual.disc_rupiah 
                  FROM
                    t_harga_jual
                    INNER JOIN m_barang ON m_barang.kode_barang = t_harga_jual.kode_barang
                    INNER JOIN in_penerimaan_obat ON m_barang.kode_barang = in_penerimaan_obat.id_barang";
          return $this->db->query($data_order);
  }

  function buat_kode_kw()  {
      $this->db->select('RIGHT(order.id_order,4) as kode', FALSE);
      $this->db->order_by('id_order','DESC');    
      $this->db->limit(1);    
      $query = $this->db->get('order');      //cek dulu apakah ada sudah ada kode di tabel.    
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
      $kodejadi = "NO-NOTA-PEMBELIAN-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
      return $kodejadi;  
  }

}
