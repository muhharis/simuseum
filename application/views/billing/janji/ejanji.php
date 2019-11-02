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
<form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>janji/simpan" method="POST" onsubmit="return cekform();">

                    <section class="panel">
                          <header class="panel-heading"><a href="<?php echo base_url(); ?>janji" class="icon-mail-reply"></a>
                              Ubah Data Janji
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
                                            <input name="no_registrasi" id="no_registrasi" class="form-control" type="text" minlength="2" required/>
                                        </div>
                                      </div> 
                                      <div class="form-group">
                                        <label class="control-label col-lg-2">No Rekam Medis</label>
                                        <div class="col-xs-10">
                                            <input name="no_rek_medik" id="no_rek_medik" class="form-control" type="text" minlength="2" readonly="readonly" required/>
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
                                          <select class="form-control" id="jenis_kunjungan_id" name="jenis_kunjungan_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addpkun as $nama)
                                                {
                                                  echo '<option value="'.$nama->jenis_kunjungan_id.'">'.$nama->jenis_kunjungan.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="kode_pelaksana" class="control-label col-lg-2">Pelaksana</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kode_pelaksana" name="kode_pelaksana" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addpelaksana as $nama)
                                                {
                                                  echo '<option value="'.$nama->kode_pelaksana.'">'.$nama->nama_pelaksana.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="tanggal_janji" class="control-label col-lg-2">Tanggal / Jam</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tanggal_janji" style="width:266px;" id="tgl_awal" required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
                                            </div>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                             <input class="form-control" id="keterangan" name="keterangan" placeholder="Kosongi jika tidak perlu"   minlength="2" type="text" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Barang</label>
                                          <div class="col-lg-10">
                                            <select id="is_aktif" name="is_aktif" class="form-control input-sm m-bot15">
                                              <option value="Aktif">Aktif</option>
                                              <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" title="Simpan">Simpan</button>
                                              <button class="btn btn-default" type="reset" title="Ulang">Ulang</button>
                                          </div>
                                      </div>
                                  
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

</form>