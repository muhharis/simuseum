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
<script>
  function select_data($no_penerimaan_obat,$tanggal_penerimaan,$jam,$nm_pemasok,$nm_barang,$jumlah,$ket) {
    $("#no_penerimaan_obat").val($no_penerimaan_obat);
    $("#tanggal_penerimaan").val($tanggal_penerimaan);
    $("#jam").val($jam);
    $("#nm_pemasok").val($nm_pemasok);
    $("#nm_barang").val($nm_barang);
    $("#jumlah").val($jumlah);
    $("#ket").val($ket);
  }
</script>
<?php 
$info = $this->session->flashdata('info');
if(!empty($info))
{
  echo $info;
}
?>
<section class="panel">
                  <header class="panel-heading">
                      Data Daftar Penerimaan Obat/Produk
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>penerimaanobat/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Penerimaan Obat <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nomor Penerimaan</th>
                                  <th>Tanggal/Jam</th>
                                  <th>Pemasok</th>
                                  <th>Produk</th>
                                  <th>Jumlah</th>
                                  <th>Keterangan</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                $no = 1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">

                                  <td><?php echo $no++; ?></td>

                                  <td><?php echo $row->no_penerimaan_obat; ?></td>
                                  <td><?php echo $row->tanggal_penerimaan; ?>/<?php echo $row->jam; ?></td>
                                  <td><?php echo $row->nm_pemasok; ?></td>
                                  <td><?php echo $row->nm_barang; ?></td>
                                  <td><?php echo $row->jumlah; ?></td>
                                  <td><?php echo $row->ket; ?></td>

                                  <td><a href="<?php echo base_url(); ?>penerimaanobat/ubah/<?php echo $row->no_penerimaan_obat; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>penerimaanobat/hapus/<?php echo $row->no_penerimaan_obat; ?>" onclick="return confirm('Anda yakin ingin menghapus penerimaan dengan kode <?php echo $row->no_penerimaan_obat; ?> ?')">Hapus</a>
                                       <!--<a data-toggle="modal" href="#ubah" onclick="select_data(
                                        '<?= $row->kode_penerimaan ?>',
                                        '<?= $row->tanggal_penerimaan ?>',
                                        '<?= $row->jam ?>',
                                        '<?= $row->nm_pemasok ?>',
                                        '<?= $row->nm_barang ?>',
                                        '<?= $row->jumlah ?>',
                                        '<?= $row->ket ?>', )">Ubah</a>-->
                                      | <a data-toggle="modal" href="#lihat" onclick="select_data(
                                        '<?= $row->no_penerimaan_obat ?>',
                                        '<?= $row->tanggal_penerimaan ?>',
                                        '<?= $row->jam ?>',
                                        '<?= $row->nm_pemasok ?>',
                                        '<?= $row->nm_barang ?>',
                                        '<?= $row->jumlah ?>',
                                        '<?= $row->ket ?>', )">Lihat</a>
                                  </td>
                              </tr>
<!-- Modal UBAH
<div>
<form action="<?php //echo base_url(); ?>penerimaanobat/simpan" method="POST" />
                              <div class="modal fade" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Tambah Penerimaan</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>No Penerimaan</label>
                                          <div>
                                              <input class="form-control" id="kode_penerimaan" name="kode_penerimaan"  minlength="2" type="text"  readonly="readonly" required/> 
                                          </div><br>

                                          <label>Tanggal / Jam</label>
                                          <div class="form-inline">
                                              <input type="text" class="form-control" name="tanggal_penerimaan" style="width:266px;" id="tgl_awal" required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php //print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
                                          </div><br>

                                          <label>Nama Pemasok</label>
                                          <div>
                                          <select class="form-control" id="kode_pemasok" name="kode_pemasok" minlength="2" required />
                                              
                                              <?php 
                                                 // foreach($addpm as $nama)
                                                    {
                                                      //echo '<option value="'.$nama->kode_pemasok.'">'.$nama->nm_pemasok.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div><br>

                                          <label>Produk/Barang</label>
                                          <div>
                                          <select class="form-control" id="kode_barang" name="kode_barang" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  //foreach($addbr as $nama)
                                                    {
                                                      //echo '<option value="'.$nama->kode_barang.'">'.$nama->nm_barang.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div><br>

                                          <label>Jumlah</label>
                                          <div>
                                              <input name="jumlah" id="jumlah" class="form-control" type="text" style="width:537px;" required>
                                          </div><br>

                                          <label>Keterangan</label>
                                          <div>
                                              <input class="form-control" id="ket" name="ket"  minlength="2" type="text" required />
                                          </div><br>

                                          <div class="modal-footer">
                                              <button class="btn btn-danger" type="submit" title="Simpan">Simpan</button>
                                              <button class="btn btn-default" type="reset" title="Ulang">Ulang</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
</form>
</div>
modal -->
                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>

<!-- Modal TAMBAH
<div>
<form action="<?php //echo base_url(); ?>penerimaanobat/simpan" method="POST" />
                              <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Ubah Penerimaan</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>No Penerimaan</label>
                                          <div>
                                              <input class="form-control" id="kode_penerimaan" name="kode_penerimaan" value="<?php// if ($kode_penerimaan=true){
                                                //cho "COBA/";
                                              }; ?>"  minlength="2" type="text" required/> 
                                          </div><br>

                                          <label>Tanggal / Jam</label>
                                          <div class="form-inline">
                                              <input type="text" class="form-control" name="tanggal_penerimaan" style="width:266px;" id="tgl_akhir" required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php //print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
                                          </div><br>

                                          <label>Nama Pemasok</label>
                                          <div>
                                          <select class="form-control" id="kode_pemasok" name="kode_pemasok" minlength="2" required />
                                              
                                              <?php 
                                                  //foreach($addpm as $nama)
                                                    {
                                                     // echo '<option value="'.$nama->kode_pemasok.'">'.$nama->nm_pemasok.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div><br>

                                          <label>Produk/Barang</label>
                                          <div>
                                          <select class="form-control" id="kode_barang" name="kode_barang" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  //foreach($addbr as $nama)
                                                    {
                                                     // echo '<option value="'.$nama->kode_barang.'">'.$nama->nm_barang.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div><br>

                                          <label>Jumlah</label>
                                          <div>
                                              <input name="jumlah" id="jumlah" class="form-control" type="text" style="width:537px;" required>
                                          </div><br>

                                          <label>Keterangan</label>
                                          <div>
                                              <input class="form-control" id="ket" name="ket"  minlength="2" type="text" required />
                                          </div><br>

                                          <div class="modal-footer">
                                              <button class="btn btn-danger" type="submit" title="Simpan">Simpan</button>
                                              <button class="btn btn-default" type="reset" title="Ulang">Ulang</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
</form>
</div>
  modal -->


<!-- Modal LIHAT-->
 <div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Lihat Penerimaan Obat/Produk</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>No Penerimaan Obat/Produk</label>
                                          <div>
                                              <input class="form-control" id="no_penerimaan_obat" name="no_penerimaan_obat"  minlength="2" type="text"  readonly="readonly" required/> 
                                          </div><br>

                                          <label>Tanggal / Jam</label>
                                          <div class="form-inline">
                                              <input type="text" class="form-control" name="tanggal_penerimaan" style="width:266px;" id="tanggal_penerimaan" readonly="readonly" required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
                                          </div><br>

                                          <label>Nama Pemasok</label>
                                          <div>
                                              <input class="form-control" id="nm_pemasok" name="nm_pemasok"  minlength="2" type="text"  readonly="readonly" required/> 
                                          </div><br>

                                          <label>Produk/Barang</label>
                                          <div>
                                              <input class="form-control" id="nm_barang" name="nm_barang"  minlength="2" type="text"  readonly="readonly" required/> 
                                          </div><br>

                                          <label>Jumlah</label>
                                          <div>
                                              <input name="jumlah" id="jumlah" class="form-control" type="text" style="width:537px;" readonly="readonly" required>
                                          </div><br>

                                          <label>Keterangan</label>
                                          <div>
                                              <input class="form-control" id="ket" name="ket"  minlength="2" type="text" style="width:537px;" readonly="readonly" required>
                                          </div><br>

                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
 <!-- modal -->
