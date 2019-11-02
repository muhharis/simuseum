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
  <title>KARTU PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>KARTU PASIEN <br>Klinik Kecantikan Mutiavie Jepara</b>
<hr>
<?php 
foreach($data->result() as $row){ ?>
 <div class="panel-body bio-graph-info">
                              <h1>[ <u><?php echo $row->no_rek_medik; ?></u> ]</h1><hr>
                              <div class="row">
                               
                                  <div class="bio-row">
                                      <p><span>Nama Pasien </span>: <?php echo $row->nm_pasien; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nomor KTP/Identitas </span>: <?php echo $row->no_identitas; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nomor Telepon </span>: <?php echo $row->no_telp; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Tempat/Tgl Lahir</span>: <?php echo $row->tmpt_lahir; ?>/<?php echo $row->tgl_lahir; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Jenis Kelmin </span>: <?php echo $row->id_gender; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Golongan Darah </span>: <?php echo $row->gol_darah; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Alamat Lengkap </span>: <?php echo $row->alamat; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Agama </span>: <?php echo $row->agama_id; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Status Perkawinan </span>: <?php echo $row->id_sk; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Pendidikan </span>: <?php echo $row->pend_id; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Pekerjaan </span>: <?php echo $row->id_pekerjaan; ?></p>
                                  </div>
                              </div><hr><b><u>Penanggung Jawab : <br><br><br><br><?php echo $this->session->userdata('ses_nama');?></u></b>
                            
                          </div>
<?php } ?>
</table>
</body>
</html>
