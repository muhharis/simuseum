<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>kelaspelayanan" class="icon-mail-reply"></a>
                              Ubah Data Pelaksana
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>peranpelaksana/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="peran_pelaksana_id" class="control-label col-lg-2">Kode Pelaksana</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="peran_pelaksana_id" name="peran_pelaksana_id" minlength="2" type="text" value="<?php echo $peran_pelaksana_id; ?>" required readonly="readonly" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="peran_pelaksana" class="control-label col-lg-2">Nama Pelaksana</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="peran_pelaksana" name="peran_pelaksana" minlength="2" type="text" value="<?php echo $peran_pelaksana; ?>" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="is_aktif" class="control-label col-lg-2">Status Pelaksana</label>
                                          <div class="col-lg-10">
                                            <select id="is_aktif" name="is_aktif" value="<?php echo $is_aktif; ?>" class="form-control input-sm m-bot15">
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

              