<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>rekbank" class="icon-mail-reply"></a>
                              Ubah Data Rekening Bank
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>rekbank/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Nama Bank</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="bank_id" name="bank_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addbank as $nama)
                                                    {
                                                      echo '<option value="'.$nama->bank_id.'">'.$nama->bank.'</option>';
                                                      }
                                              ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="rek_id" class="control-label col-lg-2">Kode Rekening</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="rek_id" name="rek_id" minlength="2" value="<?php echo $rek_id; ?>" type="text" required readonly="readonly" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="no_rek" class="control-label col-lg-2">Nomor Rekening</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="no_rek" name="no_rek" minlength="2" value="<?php echo $no_rek; ?>" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Rekening</label>
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

              