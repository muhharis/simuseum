<!--
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
-->
<!DOCTYPE html>
<html>
<head>
  <title>LAPORAN KWITANSI PENJUALAN PRODUK/OBAT</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>NOTAKWITANSI PENJUALAN PRODUK/OBAT <br>Klinik Kecantikan Mutiavie Jepara</b>
<hr>
  <?php 
  foreach($data->result() as $row){ 
  ?>
                          <div class="panel-body bio-graph-info">
                           
                              <div class="row">
                                <div class="bio-row">
                                      <p><span>Id Order </span>: <?php echo $row->id_order; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Kode Barang </span>: <?php echo $row->kode_barang; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nama Barang </span>: <?php echo $row->nm_barang; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Harga Jual </span>: <?php echo $row->harga_jual; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Jumlah </span>: <?php echo $row->qty; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Sub Total </span>: <?php echo $row->subtotal; ?></p>
                                  </div><br>
                              </div><hr><b><u>Penanggung Jawab : <br><br><br><br><?php echo $this->session->userdata('ses_nama');?></u></b>
                          </div>
<?php } 
?>
</table>
</body>
</html>





