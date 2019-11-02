<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>penerimaanhadiah" class="icon-mail-reply"></a>
                              Tambah Data Penerimaan Hadiah
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>penerimaanhadiah/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">No Penerimaan Hadiah</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="kode_penerimaan_hadiah" name="kode_penerimaan_hadiah"  minlength="2" type="text"   required/> 
                                          </div>
                                      </div>

                                      

                                      <div class="form-group ">
                                          <label for="id_hadiah" class="control-label col-lg-2">Hadiah</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="id_hadiah" name="id_hadiah" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addhd as $nama)
                                                    {
                                                      echo '<option value="'.$nama->id_hadiah.'">'.$nama->hadiah.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Jumlah</label>
                                          <div class="col-lg-10">
                                             <input name="jumlah" id="jumlah" class="form-control" type="text" style="width:537px;" required>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="no_rek" class="control-label col-lg-2">Tanggal / Jam</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tanggal_penerimaan" style="width:266px;" id="tgl_awal" required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
                                            </div>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                             <input class="form-control" id="ket" name="ket"  minlength="2" type="text" required />
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

              