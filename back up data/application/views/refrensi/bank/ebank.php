<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>bank" class="icon-mail-reply"></a>
                              Tambah Data Bank
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>bank/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Kode Bank</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="bank_id" name="bank_id" value="<?php echo $bank_id; ?>" minlength="2" type="text" required readonly="readonly"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="bank" class="control-label col-lg-2">Nama Bank</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="bank" name="bank" minlength="2" value="<?php echo $bank; ?>" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Bank</label>
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

              