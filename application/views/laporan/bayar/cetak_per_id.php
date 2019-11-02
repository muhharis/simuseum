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
  <title>KWITANSI BAYAR PERIKSA PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>KWITANSI BAYAR PERIKSA PASIEN <br>Klinik Kecantikan Mutiavie Jepara</b>
<hr>
  <?php 
  foreach($data->result() as $row){ 
  ?>
                          <div class="panel-body bio-graph-info">
                              <h2>[ <u><?php echo $row->kode_kwitansi; ?></u> ]</h2><hr>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>Tanggal/Jam </span>: <?php echo $row->tgl; ?>/<?php echo $row->jam; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>No Registrasi Pasien </span>: <?php echo $row->no_registrasi; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>No Rekam Medik Pasien </span>: <?php echo $row->no_rek_medik; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nama Pasien </span>: <?php echo $row->nm_pasien; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Nama Pelaksana </span>: <?php echo $row->nama_pelaksana; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Biaya Periksa </span>: Rp <?php echo $row->b_periksa; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Biaya Obat </span>: Rp <?php echo $row->b_obat; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Total Bayar </span>: Rp <?php echo $row->total_bayar; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <hr><p><span><h3>Bayar Tunai : Rp <?php echo $row->tunai; ?></h3></span></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <hr><p><span><h3>Kembalian : Rp <?php echo $row->kembali; ?></h3></span></p>
                                  </div><br>
                              </div><b><u>[Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?>]</u></b>
                          </div>
<?php } 
?>
</table>
</body>
</html>

                               

