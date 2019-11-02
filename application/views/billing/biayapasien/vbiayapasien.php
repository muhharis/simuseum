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
  function select_data($kode_kwitansi,$tgl,$jam,$no_registrasi,$no_rek_medik,$nm_pasien,$nama_pelaksana,$b_periksa,$b_obat,$total_bayar,$tunai,$kembali) {
    $("#kode_kwitansi").val($kode_kwitansi);
    $("#tgl").val($tgl);
    $("#jam").val($jam);
    $("#no_registrasi").val($no_registrasi);
    $("#no_rek_medik").val($no_rek_medik);
    $("#nm_pasien").val($nm_pasien);
    $("#nama_pelaksana").val($nama_pelaksana);
    $("#b_periksa").val($b_periksa);
    $("#b_obat").val($b_obat);
    $("#total_bayar").val($total_bayar);
    $("#tunai").val($tunai);
    $("#kembali").val($kembali);

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
                      Data Administrasi Pembayaran Pasien
                  </header>
                  <div class="panel-body">
                     <!-- <form class="form-inline" role="form" action="<?php //echo base_url(); ?>registrasi/tambah">
                        <input name="tgl_lahir" id="tgl_awal" aria-controls="editable-sample" placeholder="Cari berdasar tanggal" style="width: 200px; height: 35px;" class="form-control">
                        <button type="submit" class="btn btn-success">Cari</button>
                       </form> -->
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>biaya_pasien/tambah">
                              <div class="btn-group"><br>
                                  <button class="btn green">
                                       Tambah Data Administrasi Pembayaran Pasien <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Kwitansi</th>
                                  <th>Tgl/Jam</th>
                                  <th>No Reg</th>
                                  <th>No Rekam Medik</th>
                                  <th>Nama Pasien</th>
                                  <th>Pelaksana</th>
                                  <th>Biaya Periksa</th>
                                  <th>Biaya Obat</th>
                                  <th>Total Bayar</th>
                                  <th>Tunai</th>
                                  <th>Kembali</th>
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

                                  <td><?php echo $row->kode_kwitansi; ?></td>
                                  <td><?php echo $row->tgl; ?>/<?php echo $row->jam; ?></td>
                                  <td><?php echo $row->no_registrasi; ?></td>
                                  <td><?php echo $row->no_rek_medik; ?></td> 
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->nama_pelaksana; ?></td>
                                  <td><?php echo $row->b_periksa; ?></td>
                                  <td><?php echo $row->b_obat; ?></td>
                                  <td><?php echo $row->total_bayar; ?></td>
                                  <td><?php echo $row->tunai; ?></td>
                                  <td><?php echo $row->kembali; ?></td>

                                  <td><a href="<?php echo base_url(); ?>biaya_pasien/ubah/<?php echo $row->kode_kwitansi; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>biaya_pasien/hapus/<?php echo $row->kode_kwitansi; ?>" onclick="return confirm('Hapus kwitansi atas pasien <?php echo $row->nm_pasien; ?>')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->kode_kwitansi ?>',
                                        '<?= $row->tgl ?>',
                                        '<?= $row->jam ?>',
                                        '<?= $row->no_registrasi ?>',
                                        '<?= $row->no_rek_medik ?>',
                                        '<?= $row->nm_pasien ?>',
                                        '<?= $row->nama_pelaksana ?>',
                                        '<?= $row->b_periksa ?>',
                                        '<?= $row->b_obat ?>',
                                        '<?= $row->total_bayar ?>',
                                        '<?= $row->tunai ?>',
                                        '<?= $row->kembali ?>',)">Lihat</a>
                                      | <a href="<?php echo base_url(); ?>biaya_pasien/cetak_id/<?php echo $row->kode_kwitansi; ?>">Cetak</a>
                                  </td>
                              </tr>

                              <?php } ?>
                              <!--<br><a href="<?php echo base_url().'registrasi/cetak_id/'.$no_registrasi;?>"><button>cetak</button></a> -->
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>
              <!-- Modal -->
                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Data Administrasi Pembayaran Pasien</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Kwitansi</label>
                                          <div>
                                              <input class="form-control" id="kode_kwitansi" name="kode_kwitansi"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                  
                                          <label>Tgl</label>
                                          <div>
                                              <input class="form-control" id="tgl" name="tgl"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>No Registrasi</label>
                                          <div>
                                              <input class="form-control" id="no_registrasi" name="no_registrasi"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pasien</label>
                                          <div>
                                              <input class="form-control" id="nm_pasien" name="nm_pasien"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pelaksana</label>
                                          <div>
                                              <input class="form-control" id="nama_pelaksana" name="nama_pelaksana"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          <label>Biaya Obat</label>
                                          <div>
                                              <input class="form-control" id="b_periksa" name="b_periksa"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Total Bayar</label>
                                          <div>
                                              <input class="form-control" id="b_obat" name="b_obat"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Tunai</label>
                                          <div>
                                              <input class="form-control" id="tunai" name="tunai"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kembali</label>
                                          <div>
                                              <input class="form-control" id="kembali" name="kembali"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->