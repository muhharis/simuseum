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
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>registrasi" class="icon-mail-reply"></a>
                              Tambah Data Registrasi Pasien
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>registrasi/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="no_registrasi" class="control-label col-lg-2">No Registrasi</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="no_registrasi" name="no_registrasi"  minlength="2" type="text"  value="<?php echo $no_registrasi; ?>" readonly   required/> 
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="tanggal_registrasi" class="control-label col-lg-2">Tanggal Registrasi</label>
                                          <div class="col-xs-10">
                                            <input name="tanggal_registrasi" id="tanggal_registrasi"  class="form-control" type="text" value="<?php echo $tanggal_registrasi; ?>" minlength="2" readonly required/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-lg-2" >NO RM</label>
                                        <div class="col-xs-10">
                                            <input name="no_rek_medik" id="no_rek_medik"  class="form-control" type="text" value="<?php echo $no_rek_medik; ?>" minlength="2" readonly required/>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="jenis_kunjungan_id" class="control-label col-lg-2">Jenis Kunjungan</label>
                                          <div class="col-xs-10">
                                            
                                            <input name="jenis_kunjungan_id" id="jenis_kunjungan_id"  class="form-control" type="text"
                                           value="<?php echo $jenis_kunjungan_id; ?>" 
                                              minlength="2" readonly required/>
                                                 
                                                      
                                        </div>
                                      
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <a class="btn btn-success" type="button" href="<?php echo base_url(); ?>registrasi">Kembali</a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

              