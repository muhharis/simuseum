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

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>biaya_pasien" class="icon-mail-reply"></a>
                              Tambah Data Biaya Administrasi Pembayaran
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>biaya_pasien/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="no_rek_medik" class="control-label col-lg-2">Kode Kwitansi</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="kode_kwitansi" name="kode_kwitansi" value="<?= $kodeunik2; ?>"  minlength="2" type="text" readonly  required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="tgl" class="control-label col-lg-2">Tanggal / Jam</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                             <input type="text" class="form-control" name="tgl" style="width:266px;" id="tgl_awal" value="<?php  $tgl=date('Y-m-d'); echo $tgl; ?>" readonly="readonly" required>
                                              <input type="text" class="form-control" name="jam" id="jam" style=" width:266px;" />
                                            </div>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="kode_pelaksana" class="control-label col-lg-2">Nama Pelaksana</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="kode_pelaksana" name="kode_pelaksana" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addpel as $nama)
                                                    {
                                                      echo '<option value="'.$nama->kode_pelaksana.'">'.$nama->nama_pelaksana.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="no_registrasi" class="control-label col-lg-2">No Registrasi</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="no_registrasi"  id="no_registrasi" required>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="b_periksa" class="control-label col-lg-2">Biaya Periksa</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="b_periksa" name="b_periksa"  minlength="2" type="text"   required onkeyup="sum();" /> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="b_obat" class="control-label col-lg-2">Biaya Obat</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="b_obat" name="b_obat"  minlength="2" type="text" required onkeyup="sum();"/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="total_bayar" class="control-label col-lg-2">Total Bayar</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="total_bayar" name="total_bayar" minlength="2" type="text"   required onkeyup="das();"/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="tunai" class="control-label col-lg-2">Tunai</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="tunai" name="tunai"  minlength="2" type="text" required onkeyup="das();"/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="kembali" class="control-label col-lg-2">Kembalian</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="kembali" name="kembali"  minlength="2" type="text"   required/> 
                                          </div>
                                      </div>
                                  
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" title="Simpan">Simpan</button>
                                              <button class="btn btn-default" type="reset" title="Ulang">Ulang</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

              <script>
              function sum() {
                    var txtFirstNumberValue = document.getElementById('b_obat').value;
                    var txtSecondNumberValue = document.getElementById('b_periksa').value;
                    var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                       document.getElementById('total_bayar').value = result;
                    }
              }

              function das() {
                    var txtFirstNumberValue = document.getElementById('tunai').value;
                    var txtSecondNumberValue = document.getElementById('total_bayar').value;
                    var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
                    if (!isNaN(result)) {
                       document.getElementById('kembali').value = result;
                    }
              }
              </script>