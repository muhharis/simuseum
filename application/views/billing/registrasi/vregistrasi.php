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
  function select_data($no_registrasi,$no_rek_medik,$nm_pasien,$jenis_kunjungan,$tanggal_registrasi) {
    $("#no_registrasi").val($no_registrasi);
    $("#no_rek_medik").val($no_rek_medik);
    $("#nm_pasien").val($nm_pasien);
    $("#jenis_kunjungan").val($jenis_kunjungan);
    $("#tanggal_registrasi").val($tanggal_registrasi);
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
                      Data Registrasi Pasien
                  </header>
                  <div class="panel-body">
                     <!-- <form class="form-inline" role="form" action="<?php //echo base_url(); ?>registrasi/tambah">
                        <input name="tgl_lahir" id="tgl_awal" aria-controls="editable-sample" placeholder="Cari berdasar tanggal" style="width: 200px; height: 35px;" class="form-control">
                        <button type="submit" class="btn btn-success">Cari</button>
                       </form> -->
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>registrasi/tambah">
                              <div class="btn-group"><br>
                                  <button class="btn green">
                                       Tambah Data Registrasi Pasien <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>



                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Registrasi</th>
                                  <th>No Rekam Medik</th>
                                  <th>Nama Pasien</th>
                                  <th>Jenis Kunjungan</th>
                                  <th>Tgl</th>
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

                                  <td><?php echo $row->no_registrasi; ?></td>
                                  <td><?php echo $row->no_rek_medik; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->jenis_kunjungan; ?></td>
                                  <td><?php echo $row->tanggal_registrasi; ?></td>

                                  <td><a href="<?php echo base_url(); ?>registrasi/ubah/<?php echo $row->no_registrasi; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>registrasi/hapus/<?php echo $row->no_registrasi; ?>" onclick="return confirm('Hapus no registrasi pasien atas nama <?php echo $row->nm_pasien; ?> dengan kunjungan <?php echo $row->jenis_kunjungan; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->no_registrasi ?>',
                                        '<?= $row->no_rek_medik ?>',
                                        '<?= $row->nm_pasien ?>',
                                        '<?= $row->jenis_kunjungan ?>',
                                        '<?= $row->tanggal_registrasi ?>',)">Lihat</a>
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
                                              <h4 class="modal-title">Data Registrasi Pasien</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Nomor Registrasi</label>
                                          <div>
                                              <input class="form-control" id="no_registrasi" name="no_registrasi"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>No RM</label>
                                          <div>
                                              <input class="form-control" id="no_rek_medik" name="no_rek_medik"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pasien</label>
                                          <div>
                                              <input class="form-control" id="nm_pasien" name="nm_pasien"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Jenis Kunjungan</label>
                                          <div>
                                              <input class="form-control" id="jenis_kunjungan" name="jenis_kunjungan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Tanggal Registrasi</label>
                                          <div>
                                              <input class="form-control" id="tanggal_registrasi" name="tanggal_registrasir"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->