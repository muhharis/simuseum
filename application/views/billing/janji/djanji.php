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
                          <header class="panel-heading"><a href="<?php echo base_url(); ?>janji" class="icon-mail-reply"></a>
                              Kembali
                          </header>
                    </section>
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <b>Bukti Janji Pasien<br>Klinik Kecantikan Mutiavie Jepara</b>
                          </div>

                          <div class="panel-body bio-graph-info">
                              <h4>[ <u><?php echo $janji_id; ?></u> ] [ <u><?php echo $no_registrasi; ?></u> ]</h4><hr>
                              <div class="row">
                              
                                  <div class="bio-row">
                                      <p><span>Kode Kunjungan </span>: <?php echo $jenis_kunjungan_id; ?> </p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Nomor KTP/Identitas </span>: <?php echo $nm_pasien; ?></p>
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
                   
                              <td><br><hr><a href="<?php echo base_url().'masterpasien/cetak_id/'.$no_rek_medik;?>"><button>cetak</button></a> </td>
                          </div>

                      </section>
                      
                  </aside>
              </div>



<form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>janji" method="POST" onsubmit="return cekform();">

                    <section class="panel">
                          <header class="panel-heading"><a href="<?php echo base_url(); ?>janji" class="icon-mail-reply"></a>
                              Lihat Data Janji
                          </header>
                    </section>

<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading">
                              <b>Pasien</b>
                          </header>
                          <div class="panel-body">
                              <div class=" form">

                                       <div class="form-group">
                                        <label class="control-label col-lg-2" >NO Registrasi</label>
                                        <div class="col-xs-10">
                                            <input name="no_registrasi" id="no_registrasi" value="<?php echo $no_registrasi; ?>" class="form-control" type="text" minlength="2" readonly required/>
                                        </div>
                                      </div> 
                              </div>

                          </div>
                      </section>
                  </div>
 </div>
<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">
                        <header class="panel-heading">
                              <b>Janji</b>
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                      <div class="form-group ">
                                          <label for="janji_id" class="control-label col-lg-2">Kode Janji</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="janji_id" name="janji_id" minlength="2" type="text" value="<?php echo $janji_id; ?>" readonly   required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="jenis_kunjungan_id" class="control-label col-lg-2">Jenis Kunjungan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="jenis_kunjungan_id" name="jenis_kunjungan_id" minlength="2" type="text" value="<?php echo $jenis_kunjungan_id; ?>" readonly   required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="kode_pelaksana" class="control-label col-lg-2">Pelaksana</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kode_pelaksana" name="kode_pelaksana" minlength="2" type="text" value="<?php echo $kode_pelaksana; ?>" readonly   required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="tanggal_janji" class="control-label col-lg-2">Tanggal / Jam</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tanggal_janji" value="<?php echo $tanggal_janji; ?>" style="width:266px;" id="tgl_awal" readonly required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php echo $jam; ?>" style=" width:266px;" readonly="readonly" readonly required/>
                                            </div>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="keterangan" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="keterangan" name="keterangan" value="<?php echo $keterangan; ?>" minlength="2" type="text" readonly  required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="keterangan" class="control-label col-lg-2">Status Janji</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="keterangan" name="keterangan" value="<?php echo $is_aktif; ?>" minlength="2" type="text" readonly required />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                           <div class="col-lg-offset-2 col-lg-10">
                                              <a class="btn btn-success" type="button" href="<?php echo base_url(); ?>janji">Kembali</a>
                                          </div>
                                      </div>
                                  
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

</form>