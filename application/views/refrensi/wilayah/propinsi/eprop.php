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

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>propinsi" class="icon-mail-reply"></a>
                              Ubah Data Propinsi
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>propinsi/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="kd_prop" class="control-label col-lg-2">Kode Propinsi</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="kd_prop" name="kd_prop" value="<?php echo $kd_prop; ?>" minlength="2" type="text" readonly="readonly" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_prop" class="control-label col-lg-2">Nama Propinsi</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="nm_prop" name="nm_prop" value="<?php echo $nm_prop; ?>" minlength="2" type="text" required />
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