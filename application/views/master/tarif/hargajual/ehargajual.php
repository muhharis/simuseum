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

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>hargajual" class="icon-mail-reply"></a>
                              Tambah Data Harga Jual
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>hargajual/simpan" method="POST" onsubmit="return cekform();">
                                  
                                    <div class="form-group ">
                                          <label for="harga_jual_id" class="control-label col-lg-2">Kode Harga Jual</label>
                                          <div class="col-lg-10">
                                              <input type="text" class="form-control" name="harga_jual_id" id="harga_jual_id" value="<?php echo $harga_jual_id; ?>" readonly="readonly">
                                          </div>
                                      </div>

                                      <!--<div class="form-group ">
                                          <label for="kategori_brg_id" class="control-label col-lg-2">Kategori Barang</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kategori_brg_id" name="kategori_brg_id" minlength="2" required  />
                                              <option></option>
                                              <?php 
                                                //foreach($addkb as $kode)
                                                {
                                                  //echo '<option value="'.$kode->kategori_brg_id.'">'.$kode->kategori_brg.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>-->

                                      <div class="form-group ">
                                          <label for="kode_barang" class="control-label col-lg-2">Barang</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kode_barang" name="kode_barang" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addbrg as $kode)
                                                {
                                                  echo '<option value="'.$kode->kode_barang.'">'.$kode->nm_barang.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="kelas_id" class="control-label col-lg-2">Kelas</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kelas_id" name="kelas_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addkp as $kode)
                                                {
                                                  echo '<option value="'.$kode->kelas_id.'">'.$kode->kelas.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="tgl_berlaku" class="control-label col-lg-2">Tanggal Berlaku</label>
                                          <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tgl_berlaku" id="tgl_awal">
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="harga_jual" class="control-label col-lg-2">Harga Jual</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="harga_jual" name="harga_jual" minlength="2" type="text" value="<?php echo $harga_jual; ?>" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="disc_persen" class="control-label col-lg-2">Diskon (%)</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="disc_persen" name="disc_persen" minlength="2" type="text" value="<?php echo $disc_persen; ?>" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="disc_rupiah" class="control-label col-lg-2">Diskon Rupiah</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="disc_rupiah" name="disc_rupiah" minlength="2" type="text" value="<?php echo $disc_rupiah; ?>" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="ket" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" placeholder="Kosongi jika tidak perlu" id="ket" name="ket"  minlength="2" type="text" />
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

              