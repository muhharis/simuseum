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

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>penerimaanhadiah" class="icon-mail-reply"></a>
                              Tambah Data Penerimaan Hadiah
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>penerimaanhadiah/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">No Penerimaan Hadiah</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="no_penerimaan_hadiah" value="<?php echo $no_penerimaan_hadiah; ?>" name="no_penerimaan_hadiah"  minlength="2" type="text" readonly required/> 
                                          </div>
                                      </div>

<!--  TDATATABLE -->
<div>
          <h5 class='judul-transaksi'>

          </h5>
          <table class='table table-bordered'>
            <thead>
              <tr>
              <th>Hadiah</th>
               <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                <select class="form-control" id="id_hadiah" name="id_hadiah" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addhd as $nama)
                                                    {
                                                      echo '<option value="'.$nama->id_hadiah.'">'.$nama->hadiah.'</option>';
                                                      }
                                              ?>
                                          </select >
               </td>
                <td><input type="text" onkeypress="return hanyaAngka(event)" placeholder="" name="jumlah" id="jumlah" class="form-control"></td>
              </tr>
            </tbody>
            <tbody></tbody>
          </table><hr>
<!----------------->

                                      <div class="form-group ">
                                          <label for="no_rek" class="control-label col-lg-2">Tanggal / Jam</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tanggal" style="width:266px;" id="tgl_awal" value="<?php  echo $tanggal ?>" readonly="readonly" required>
                                              <input type="time" class="form-control" value="<?php echo $jam; ?>" name="jam" id="jam" style=" width:266px;"  required/>
                                            </div>
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                             <input class="form-control" id="ket" placeholder="Kosongi jika tidak perlu" name="ket"  minlength="2" type="text" />
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

              