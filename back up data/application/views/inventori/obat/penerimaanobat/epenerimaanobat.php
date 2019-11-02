<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>penerimaanobat" class="icon-mail-reply"></a>
                              Ubah Data Rekening Bank
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>penerimaanobat/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">No Penerimaan</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="kode_penerimaan" name="kode_penerimaan" value="<?php echo $kode_penerimaan; ?>" minlength="2" type="text" readonly="readonly"  required/> 
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
                                          <label for="rek_id" class="control-label col-lg-2">Nama Pemasok</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="kode_pemasok" name="kode_pemasok" minlength="2" required />
                                              
                                              <?php 
                                                  foreach($addpm as $nama)
                                                    {
                                                      echo '<option value="'.$nama->kode_pemasok.'">'.$nama->nm_pemasok.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Produk/Barang</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="kode_barang" name="kode_barang" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addbr as $nama)
                                                    {
                                                      echo '<option value="'.$nama->kode_barang.'">'.$nama->nm_barang.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Jumlah</label>
                                          <div class="col-lg-10">
                                             <input name="jumlah" id="jumlah" class="form-control" type="text" value="<?php echo $jumlah; ?>" style="width:900px;" required>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                             <input class="form-control" id="ket" name="ket"  value="<?php echo $ket; ?>" style="width:900px;" minlength="2" type="text" required />
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

              