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
  <title>LAPORAN REGISTRASI PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN REGISTRASI PASIEN <br>Klinik Kecantikan Mutiavie Jepara</b>
<hr>
  <?php 
  foreach($data->result() as $row){ 
  ?>
                          <div class="panel-body bio-graph-info">
                              <h1>[ <u><?php echo $row->no_registrasi; ?></u> ]</h1><hr>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>Nomor Rekam Medik </span>: <?php echo $row->no_rek_medik; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nama Pasien </span>: <?php echo $row->nm_pasien; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Jenis Kunjungan </span>: <?php echo $row->jenis_kunjungan; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Tanggal Kunjungan </span>: <?php echo $row->tanggal_registrasi; ?></p>
                                  </div><br>
                              </div><hr><b><u>Penanggung Jawab : <br><br><br><br><?php echo $this->session->userdata('ses_nama');?></u></b>
                          </div>
<?php } 
?>
</table>
</body>
</html>






