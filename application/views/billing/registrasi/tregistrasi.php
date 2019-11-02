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
<form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>registrasi/simpan" method="POST">

                    <section class="panel">
                          <header class="panel-heading"><a href="<?php echo base_url(); ?>registrasi" class="icon-mail-reply"></a>
                              Tambah Data Registrasi
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
                                        <label class="control-label col-lg-2" >NO RM</label>
                                        <div class="col-xs-10">
                                            <input name="no_rek_medik" id="no_rek_medik" class="form-control" type="text" minlength="2" required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-lg-2">Nama Pasien</label>
                                        <div class="col-xs-10">
                                            <input name="nm_pasien" class="form-control" type="text" minlength="2" readonly required/>
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <label class="control-label col-lg-2">Alamat</label>
                                        <div class="col-xs-10">
                                            <input name="alamat" class="form-control" type="text" minlength="2" readonly required/>
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
                              <b>Registrasi</b>
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                      <div class="form-group ">
                                          <label for="no_registrasi" class="control-label col-lg-2">No Registrasi</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="no_registrasi" name="no_registrasi"  minlength="2" type="text"  value="<?= $kodeunik2; ?>" readonly   required/> 
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="tanggal_registrasi" class="control-label col-lg-2">Tanggal Registrasi</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tanggal_registrasi"  id="tgl_awal" required>
                                            </div>
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
                                          </select >
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
              