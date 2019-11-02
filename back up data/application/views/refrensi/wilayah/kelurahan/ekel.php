<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>kelurahan" class="icon-mail-reply"></a>
                              Ubah Data Kelurahan
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>kelurahan/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="kd_prop" class="control-label col-lg-2">Kode Kecamatan</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kd_kec" name="kd_kec" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($kecamatan as $kec)
                                                {
                                                 echo '<option value="'.$kec->kd_kec.'">'.$kec->nm_kec.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Kode Kelurahan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kd_kel" name="kd_kel" value="<?php echo $kd_kel; ?>" minlength="2" type="text" required readonly="readonly" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Nama Kelurahan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="nm_kel" name="nm_kel" value="<?php echo $nm_kel; ?>" minlength="2" type="text" required />
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

              