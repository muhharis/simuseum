<!--
* File      : Klinik2.php
* Language    : PHP
* Package   : CodeIgniter 3.0
* Location    : application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author      : MuhHaris
* Email       :muhharis90@yahoo.com
* HP      : 089-537-625-7021
*/
-->
<?php 
$info = $this->session->flashdata('info');
if(!empty($info))
{
  echo $info;
}
?>
<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>peranpelaksana" class="icon-mail-reply"></a>
                              Tambah Data Pelaksana
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>peranpelaksana/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="peran_pelaksana_id" class="control-label col-lg-2">Kode Pelaksana</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="peran_pelaksana_id" name="peran_pelaksana_id" value="<?= $kodeunik2; ?>" minlength="2" type="text" readonly required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="peran_pelaksana" class="control-label col-lg-2">Nama Pelaksana</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="peran_pelaksana" name="peran_pelaksana" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Pelaksana</label>
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

              