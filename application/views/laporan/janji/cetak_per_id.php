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
  <title>LAPORAN JANJI PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN JANJI PASIEN <br>Klinik Kecantikan Mutiavie Jepara</b>
<hr>
  <?php 
  foreach($data->result() as $row){ 
  ?>
                          <div class="panel-body bio-graph-info">
                              <h1>[ <u><?php echo $row->janji_id; ?></u> ]</h1><hr>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>Tanggal Janji </span>: <?php echo $row->tanggal_janji; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Jam Janji </span>: <?php echo $row->jam; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Dokter </span>: <?php echo $row->nama_pelaksana;  ?> - <?php echo $row->peran_pelaksana; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nama Pasien </span>: <?php echo $row->nm_pasien; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>No Telepom </span>: <?php echo $row->no_telp; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Jenis Kunjungan </span>: <?php echo $row->jenis_kunjungan; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Keterangan Janji </span>: <?php echo $row->keterangan; ?></p>
                                  </div><br>
                                  <div class="bio-row">
                                      <p><span>Status Janji </span>: <?php echo $row->is_aktif; ?></p>
                                  </div><br>
                              </div><hr><b><u>Penanggung Jawab : <br><br><br><br><?php echo $this->session->userdata('ses_nama');?></u></b>
                          </div>
<?php } 
?>
</table>
</body>
</html>




