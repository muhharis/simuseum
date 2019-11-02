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
<form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>pelayananpasien/simpan" method="POST">

                    <section class="panel">
                          <header class="panel-heading"><a href="<?php echo base_url(); ?>pelayananpasien" class="icon-mail-reply"></a>
                              Tambah Data Pelayanan Pasien
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
                                        <label class="control-label col-lg-2">No Rekam Medik</label>
                                        <div class="col-xs-10">
                                            <input name="no_rek_medik" class="form-control" type="text" minlength="2" readonly required/>
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
                              <b>Pelayanan</b>
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                      <div class="form-group ">
                                          <label for="kode_pelayanan" class="control-label col-lg-2">Kode Pelayanan</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="kode_pelayanan" name="kode_pelayanan"  minlength="2" type="text"  value="<?= $kodeunik2; ?>" readonly   required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="antrian" class="control-label col-lg-2">Antrian</label>
                                          <div class="col-sm-10">
                                                  <input type="text" onkeypress="return hanyaAngka(event)" placeholder="" name="antrian" id="antrian" class="form-control">
                                          
                                              </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="tgl_pelayanan" class="control-label col-lg-2">Tanggal Pelayanan</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tgl_pelayanan"  id="tgl_awal" required>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="id_kunjungan" class="control-label col-lg-2">Jenis Kunjungan</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="id_kunjungan" name="id_kunjungan" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addkun as $nama)
                                                    {
                                                      echo '<option value="'.$nama->jenis_kunjungan_id.'">'.$nama->jenis_kunjungan.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Pelayanan</label>
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
              