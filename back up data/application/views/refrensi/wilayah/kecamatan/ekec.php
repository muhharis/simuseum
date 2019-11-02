<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>index.php/kecamatan" class="icon-mail-reply"></a>
                              Ubah Data Kecamatan
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>index.php/kecamatan/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="kd_prop" class="control-label col-lg-2">Kode Kabupaten</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kd_kab" name="kd_kab" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($Kabupaten as $kab)
                                                {
                                                 echo '<option value="'.$kab->kd_kab.'">'.$kab->nm_kab.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kec" class="control-label col-lg-2">Kode Kecamatan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kd_kec" name="kd_kec" value="<?php echo $kd_kec?>" minlength="2" type="text" required readonly="readonly" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kec" class="control-label col-lg-2">Nama Kecamatan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="nm_kec" name="nm_kec" value="<?php echo $nm_kec?>" minlength="2" type="text" required />
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

              