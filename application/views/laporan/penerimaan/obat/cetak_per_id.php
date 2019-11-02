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
  <title>LAPORAN PELAYANAN PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN PELAYANAN PASIEN <br>Klinik Kecantikan Mutiavie Jepara</b>
<hr>
  <?php 
  foreach($data->result() as $row){ 
  ?>
                          <div class="panel-body bio-graph-info">
                              <h1>[ <u><?php echo $row->no_penerimaan_obat; ?></u> ]</h1><hr>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>Tanggal/Jam Penerimaan </span>: <?php echo $row->tanggal_penerimaan; ?>/<?php echo $row->jam; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Pemasok </span>: <?php echo $row->nm_pemasok; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Produk </span>: <?php echo $row->nm_barang; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Jumlah </span>: <?php echo $row->jumlah; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Keterangan </span>: <?php echo $row->ket; ?></p>
                                  </div><br>
                              </div><hr><b><u>Penanggung Jawab : <br><br><br><br><?php echo $this->session->userdata('ses_nama');?></u></b>
                          </div>
<?php } 
?>
</table>
</body>
</html>
