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

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>kabupaten" class="icon-mail-reply"></a>
                              Ubah Data Kabupaten
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>kabupaten/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="kd_prop" class="control-label col-lg-2">Kode Propinsi</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kd_prop" name="kd_prop" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($propinsi as $prop)
                                                {
                                                 echo '<option value="'.$prop->kd_prop.'">'.$prop->nm_prop.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="nm_kab" class="control-label col-lg-2">Kode Kabupaten</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kd_kab" name="kd_kab" value="<?php echo $kd_kab; ?>" minlength="2" type="text" required readonly="readonly" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kab" class="control-label col-lg-2">Nama Kabupaten</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="nm_kab" name="nm_kab" value="<?php echo $nm_kab; ?>" minlength="2" type="text" required />
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

              