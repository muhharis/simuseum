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
  function select_data($no_rek_medik,$nm_pasien,$gender,$tmpt_lahir,$tgl_lahir,$alamat,$is_aktif) {
    $("#no_rek_medik").val($no_rek_medik);
    $("#nm_pasien").val($nm_pasien);
    $("#gender").val($gender);
    $("#tmpt_lahir").val($tmpt_lahir);
    $("#tgl_lahir").val($tgl_lahir);
    $("#alamat").val($alamat);
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
                      Data Daftar Master Pasien
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>masterpasien/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                       Tambah Data Master Pasien <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Rekam Medis</th>
                                  <th>Nama Pasien</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Tempat Lahir</th>
                                  <th>Tanggal Lahir</th>
                                  <th>Alamat Lengkap</th>
                                  <th>Aktif/Tidak</th>
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

                                  <td><?php echo $row->no_rek_medik; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->gender; ?></td>
                                  <td><?php echo $row->tmpt_lahir; ?></td>
                                  <td><?php echo $row->tgl_lahir; ?></td>
                                  <td><?php echo $row->alamat; ?></td>
                                  <td><?php echo $row->is_aktif; ?></td>

                                  <td><a href="<?php echo base_url(); ?>masterpasien/ubah/<?php echo $row->no_rek_medik; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>masterpasien/hapus/<?php echo $row->no_rek_medik; ?>" onclick="return confirm('Anda yakin ingin menghapus pasien dengan nama <?php echo $row->nm_pasien; ?> ?')">Hapus</a>
                                      | <a href="<?php echo base_url(); ?>masterpasien/detail/<?php echo $row->no_rek_medik; ?>">Lihat</a> <!--<a href="<?php// echo base_url().'masterpasien/cetak_id/'.$row->no_rek_medik;?>">cetak</a> --><!--<a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->no_rek_medik ?>',
                                        '<?= $row->nm_pasien ?>',
                                        '<?= $row->gender ?>',
                                        '<?= $row->tmpt_lahir ?>',
                                        '<?= $row->tgl_lahir ?>',
                                        '<?= $row->alamat ?>',
                                        '<?= $row->is_aktif ?>',)">Lihat</a>
                                      | --> 
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
                                              <h4 class="modal-title">Data Kabupaten</h4>
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

                                          <label>Jenis Kelamin</label>
                                          <div>
                                              <input class="form-control" id="gender" name="gender"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Tempat Lahir</label>
                                          <div>
                                              <input class="form-control" id="tmpt_lahir" name="tmpt_lahir"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Tanggal Lahir</label>
                                          <div>
                                              <input class="form-control" id="tgl_lahir" name="tgl_lahir"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Alamat</label>
                                          <div>
                                              <input class="form-control" id="alamat" name="alamat"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Status Pasien</label>
                                          <div>
                                              <input class="form-control" id="is_aktif" name="is_aktif"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button class="btn btn-success" type="button">Ok</button>
                                          </div>
                  
                                      </div>
                                  </div>
                              </div>
                      
                              <!-- modal -->