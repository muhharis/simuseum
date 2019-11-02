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

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>tariftindakan" class="icon-mail-reply"></a>
                              Tambah Data Tarif Tindakan
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>tariftindakan/simpan" method="POST" onsubmit="return cekform();">
                                    <div class="form-group ">
                                          <label for="tarif_tindakan_id" class="control-label col-lg-2">Kode Tarif Tindakan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="tarif_tindakan_id" name="tarif_tindakan_id" value="<?php echo $tarif_tindakan_id; ?>" minlength="2" type="text" required readonly="readonly" />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="grup_tindakan_id" class="control-label col-lg-2">Grup Tindakan</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="grup_tindakan_id" name="grup_tindakan_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addgt as $kode)
                                                {
                                                  echo '<option value="'.$kode->grup_tindakan_id.'">'.$kode->grup_tindakan.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="kode_tindakan" class="control-label col-lg-2">Tindakan</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kode_tindakan" name="kode_tindakan" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addtindakan as $kode)
                                                {
                                                  echo '<option value="'.$kode->kode_tindakan.'">'.$kode->tindakan.'</option>';
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
                                          <label for="kelas_id" class="control-label col-lg-2">Kelas</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kelas_id" name="kelas_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addkelas as $kode)
                                                {
                                                  echo '<option value="'.$kode->kelas_id.'">'.$kode->kelas.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="tarif" class="control-label col-lg-2">Tarif</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="tarif" name="tarif" value="<?php echo $tarif; ?>" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="disc_persen" class="control-label col-lg-2">Diskon(%)</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="disc_persen" name="disc_persen" value="<?php echo $disc_persen; ?>" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="disc_rupiah" class="control-label col-lg-2">Diskon(Rp)</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="disc_rupiah" name="disc_rupiah" value="<?php echo $disc_rupiah; ?>" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="ket" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                              <textarea  class=" form-control" minlength="2" id="ket" name="ket" value="<?php echo $ket; ?>" required ></textarea>
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
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

              