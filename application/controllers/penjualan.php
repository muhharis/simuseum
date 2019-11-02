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
class Penjualan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_cart');
    $this->load->helper('URL');
  }

  public function index(){
    $data['kodeunik2'] = $this->M_cart->buat_kode_kw();
    $data['product'] = $this->M_cart->get_order()->result();
    $data['cart'] = $this->cart->contents();
    $this->load->view('billing/penjualan/vpenjualan',$data);
  }

  public function beli(){
    $data = array(
      'id' => $this->input->post('harga_jual_id'),
      'name' => $this->input->post('nm_barang'),
      'price' => $this->input->post('harga_jual'),
      'jumlah' => $this->input->post('jumlah'),
      //'gambar' => $this->input->post('gambar'),
      'qty' =>$this->input->post('qty')
      );
  $this->cart->insert($data);
    redirect('Penjualan');
  }

  public function keranjang_belanja(){
    $data['kodeunik2'] = $this->M_cart->buat_kode_kw();
    $data['cart'] = $this->cart->contents();
    $this->load->view('billing/penjualan/tpenjualan',$data);
  }

  public function ubah(){
    $cart_info = $_POST['cart'] ;
      foreach( $cart_info as $id => $cart)
      {
        $rowid = $cart['rowid'];
        $price = $cart['price'];
        $stok = $cart['stok'];
       // $gambar = $cart['gambar'];
        $amount = $price * $cart['qty'];
        $qty = $cart['qty'];
        $data = array('rowid' => $rowid,
                'price' => $price,
               // 'gambar' => $gambar,
                //'stok' => $stok,
                'amount' => $amount,
                'qty' => $qty);
        $this->cart->update($data);
      }
    redirect('penjualan/keranjang_belanja');
  }

  public function hapus($rowid){
    if ($rowid =="semua"){
        $this->cart->destroy();
      }else{
        $data = array('rowid' => $rowid,
                  'qty' =>0);
        $this->cart->update($data);
      }
    redirect('penjualan/keranjang_belanja');
}

public function bayar(){
    $cart = $this->cart->contents();
      foreach($cart as $item){
        $data = array(
          'id_order' => $item['id_order'],
          'harga_jual_id' => $item['id'],
          'qty' => $item['qty'],
          //'stok' => $item['stok'],
          'subtotal' => $item['subtotal']
        );

        $this->M_cart->bayar($data);
      }
    $this->cart->destroy();
    redirect('penjualan/keranjang_belanja');
  }

   function cetak_all() {
       $data['cart'] = $this->cart->contents();
    $this->load->view('laporan/nota/cetak_all',$data);
      $html = $this->output->get_output();
      $this->load->library('dompdf_gen');
      $this->dompdf->load_html($html);
      $this->dompdf->render();
      $sekarang=date("d:F:Y:h:m:s");
      $this->dompdf->stream("Penerimaan Hadiah, Tanggal ".$sekarang.".pdf",array('Attachment'=>0));
   }
}
