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

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>penerimaanobat" class="icon-mail-reply"></a>
                              Tambah Data Penerimaan Obat/Produk
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>penerimaanobat/simpan" method="POST">
                                      <div class="form-group ">
                                          <label for="no_penerimaan_obat" class="control-label col-lg-2">No Penerimaan Obat/Produk</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="no_penerimaan_obat" name="no_penerimaan_obat" value="<?= $kodeunik2; ?>"  minlength="2" type="text" readonly="readonly" required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="id_pemasok" class="control-label col-lg-2">Nama Pemasok</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="id_pemasok" name="id_pemasok" minlength="2" required />
                                              
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
                                          <label for="tanggal_penerimaan" class="control-label col-lg-2">Tanggal / Jam</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tanggal_penerimaan" style="width:266px;" id="tgl_awal" value="<?php  $tgl=date('Y-m-d'); echo $tgl; ?>" readonly="readonly" required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
                                            </div>
                                          </div>
                                      </div>

                                     <!-- <div class="form-group ">
                                          <label for="jumlah" class="control-label col-lg-2">Jumlah</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="jumlah" name="jumlah"  minlength="2" type="text"  required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="id_barang" class="control-label col-lg-2">Nama Barang</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="id_barang" name="id_barang" minlength="2" required />
                                              
                                              <?php 
                                                 // foreach($addbr as $nama)
                                                    {
                                                     // echo '<option value="'.$nama->kode_barang.'">'.$nama->nm_barang.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div>
                                      </div> -->
<!--  TDATATABLE -->
<div>
          <h5 class='judul-transaksi'>

          </h5>
          <table class='table table-bordered'>
            <thead>
              <tr>
              <th>Barang</th>
               <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                <select class="form-control" id="id_barang" name="id_barang" minlength="2" required />
                                              
                                              <?php 
                                                  foreach($addbr as $nama)
                                                    {
                                                      echo '<option value="'.$nama->kode_barang.'">'.$nama->nm_barang.'</option>';
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
                                          <label for="ket" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                             <input class="form-control" placeholder="Kosongi jika tidak perlu" id="ket" name="ket"  minlength="2" type="text" />
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