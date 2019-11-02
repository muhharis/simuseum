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
<form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>pengeluaran/simpan" method="POST">

                  

              <div class="row">
                  <div class="col-lg-12">

                      <section class="panel">
                          <header class="panel-heading"><a href="<?php echo base_url(); ?>registrasi" class="icon-mail-reply"></a>
                              Tambah Data Pengeluaran Klinik
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                      <div class="form-group ">
                                          <label for="pengeluaran_id" class="control-label col-lg-2">Kode Pengeluaran</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="pengeluaran_id" name="pengeluaran_id" value="<?php echo $pengeluaran_id; ?>"  minlength="2" type="text" readonly required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="jenis_pengeluaran_id" class="control-label col-lg-2">Jenis Pengeluaran</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="jenis_pengeluaran_id" name="jenis_pengeluaran_id" value="<?php echo $jenis_pengeluaran_id; ?>" minlength="2" type="text" readonly required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="pengeluaran" class="control-label col-lg-2">Pengeluaran</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="pengeluaran" name="pengeluaran" value="<?php echo $pengeluaran; ?>" minlength="2" type="text" readonly required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="pengeluaran" class="control-label col-lg-2">Jumlah</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" minlength="2" type="text" readonly required/> 
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="tanggal_pengeluaran" class="control-label col-lg-2">Tanggal Pengeluaran</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tanggal_pengeluaran" value="<?php echo $tanggal_pengeluaran; ?>" id="tgl_awal" readonly required>
                                            </div>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="ket" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="ket" name="ket" value="<?php echo $ket; ?>"  minlength="2" type="text" readonly required/> 
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
              