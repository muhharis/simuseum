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

<div class="row">
                  <aside class="panel-body">
                     <section class="panel">
                          <header class="panel-heading"><a href="<?php echo base_url(); ?>masterpasien" class="icon-mail-reply"></a>
                              Kembali
                          </header>
                    </section>
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <b>Kartu Pasien <br>Klinik Kecantikan Mutiavie Jepara</b>
                          </div>

                          <div class="panel-body bio-graph-info">
                              <h1>[ <u><?php echo $no_rek_medik; ?></u> ]</h1><hr>
                              <div class="row">
                              
                                  <div class="bio-row">
                                      <p><span>Nama Pasien </span>: <?php echo $nm_pasien; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nomor KTP/Identitas </span>: <?php echo $no_identitas; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nomor Telepon </span>: <?php echo $no_telp; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Tempat/Tgl Lahir</span>: <?php echo $tmpt_lahir; ?>/<?php echo $tgl_lahir; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Jenis Kelmin </span>: <?php echo $id_gender; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Golongan Darah </span>: <?php echo $gol_darah; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Alamat Lengkap </span>: <?php echo $alamat; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Agama </span>: <?php echo $agama_id; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Status Perkawinan </span>: <?php echo $id_sk; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Pendidikan </span>: <?php echo $pend_id; ?></p>
                                  </div>
                                  
                                  <div class="bio-row">
                                      <p><span>Pekerjaan </span>: <?php echo $id_pekerjaan; ?></p>
                                  </div>
                              </div><hr><b><u>Penanggung Jawab : <br><br><br><br><?php echo $this->session->userdata('ses_nama');?></u></b>
                   
                              <td><br><hr><a href="<?php echo base_url().'masterpasien/cetak_id/'.$no_rek_medik;?>"><button type="button" class="btn btn-primary"><i class="icon-print"></i> Cetak Data</button></a> </td>
                          </div>

                      </section>
                      
                  </aside>
              </div>