<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>kelaspelayanan" class="icon-mail-reply"></a>
                              Ubah Data Kelas Pelayanan
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>kelaspelayanan/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Kode Kelas Pelayanan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kelas_id" name="kelas_id" minlength="2" type="text" value="<?php echo $kelas_id; ?>" required readonly="readonly" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Nama Kelas Pelayanan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kelas" name="kelas" minlength="2" type="text" value="<?php echo $kelas; ?>" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Kelas</label>
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

              