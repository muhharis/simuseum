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
  function select_data($no_rek_medik,$nm_pasien,$alamat,$no_registrasi,$jenis_kunjungan,$antrian,$is_aktif) {
    $("#no_rek_medik").val($no_rek_medik);
    $("#nm_pasien").val($nm_pasien);
    $("#alamat").val($alamat);
    $("#no_registrasi").val($no_registrasi);
    $("#jenis_kunjungan").val($jenis_kunjungan);
    $("#antrian").val($antrian);
    //$("#masuk").val($masuk);
   // $("#keluar").val($keluar);
    $("#is_aktif").val($is_aktif);
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
                      Data Pelayanan Pasien
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>pelayananpasien/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Pelayanan Pasien <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No RM</th>
                                  <th>Nama Pasien</th>
                                  <th>Alamat</th>
                                  <th>No Registarsi</th>
                                  <th>Kunjungan</th>
                                  <th>Antrian</th>
                                 <!--<th>Masuk</th> -->
                                  <th>Status Pelayanan</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                $no=1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">

                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $row->no_rek_medik; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->alamat; ?></td>
                                  <td><?php echo $row->no_registrasi; ?></td>
                                  <td><?php echo $row->jenis_kunjungan; ?></td>
                                  <td><?php echo $row->antrian; ?></td>
                                  <!--<td><?php //echo $row->masuk; ?></td>
                                  <td><?php //echo $row->keluar; ?></td>-->
                                  <td><?php echo $row->is_aktif; ?></td>

                                  <td><a href="<?php echo base_url(); ?>pelayananpasien/ubah/<?php echo $row->kode_pelayanan; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>pelayananpasien/hapus/<?php echo $row->kode_pelayanan; ?>" onclick="return confirm('Anda yakin ingin menghapus pelayanan pasien atas nama <?php echo $row->nm_pasien; ?> ?')">Hapus</a>
                                 |<a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->no_rek_medik ?>',
                                        '<?= $row->nm_pasien ?>',
                                        '<?= $row->alamat ?>',
                                        '<?= $row->no_registrasi ?>',
                                        '<?= $row->jenis_kunjungan ?>',
                                        '<?= $row->antrian ?>',
                                        '<?= $row->is_aktif ?>',)">Lihat</a>
                                  </td>
                              </tr>
                              <?php } ?>
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
                                              <h4 class="modal-title">Data Pelayanan Pasien</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Nomor RM</label>
                                          <div>
                                              <input class="form-control" id="no_rek_medik" name="no_rek_medik"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pasien</label>
                                          <div>
                                              <input class="form-control" id="nm_pasien" name="nm_pasien"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Alamat</label>
                                          <div>
                                              <input class="form-control" id="alamat" name="alamat"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>No Registrasi</label>
                                          <div>
                                              <input class="form-control" id="no_registrasi" name="no_registrasi"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Jenis Kunjungan</label>
                                          <div>
                                              <input class="form-control" id="jenis_kunjungan" name="jenis_kunjungan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Antrian</label>
                                          <div>
                                              <input class="form-control" id="antrian" name="antrian"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Status Pelayanan</label>
                                          <div>
                                              <input class="form-control" id="is_aktif" name="is_aktif"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->