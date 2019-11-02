<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>tindakan" class="icon-mail-reply"></a>
                              Ubah Data Tindakan
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>tindakan/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="grup_tindakan_id" class="control-label col-lg-2">Grup Tindakan</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="grup_tindakan_id" name="grup_tindakan_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addgt as $nama)
                                                {
                                                  echo '<option value="'.$nama->grup_tindakan_id.'">'.$nama->grup_tindakan.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="kode_tindakan" class="control-label col-lg-2">Kode Tindakan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kode_tindakan" name="kode_tindakan" minlength="2" type="text" value="<?php echo $kode_tindakan; ?>" required readonly="readonly" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="tindakan" class="control-label col-lg-2">Tindakan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="tindakan" name="tindakan" minlength="2" type="text" value="<?php echo $tindakan; ?>" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="s_pelaksana" class="control-label col-lg-2">Pelaksana</label>
                                          <div class="col-lg-10">
                                            <select id="s_pelaksana" name="s_pelaksana" class="form-control input-sm m-bot15">
                                              <option value="Ya">Ya</option>
                                              <option value="Tidak">Tidak</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Tindakan</label>
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

              