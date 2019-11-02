<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>hargabeli" class="icon-mail-reply"></a>
                              Tambah Data Harga Beli
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>hargabeli/simpan" method="POST" onsubmit="return cekform();">
                                  
                                    <div class="form-group ">
                                          <label for="harga_beli_id" class="control-label col-lg-2">Kode Harga Beli</label>
                                          <div class="col-lg-10">
                                              <input type="text" class="form-control" name="harga_beli_id" id="harga_beli_id" value="<?php echo $harga_beli_id; ?>" readonly="readonly">
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="kategori_brg_id" class="control-label col-lg-2">Kategori Barang</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kategori_brg_id" name="kategori_brg_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addkb as $kode)
                                                {
                                                  echo '<option value="'.$kode->kategori_brg_id.'">'.$kode->kategori_brg.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="kode_barang" class="control-label col-lg-2">Barang</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kode_barang" name="kode_barang" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addbrg as $kode)
                                                {
                                                  echo '<option value="'.$kode->kode_barang.'">'.$kode->nm_barang.'</option>';
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
                                          <label for="harga_beli" class="control-label col-lg-2">Harga Beli</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="harga_beli" name="harga_beli" value="<?php echo $harga_beli; ?>" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="ket" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                              <textarea  class=" form-control" minlength="2" id="ket" name="ket" value="<?php echo $ket; ?>" required ></textarea>
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

              