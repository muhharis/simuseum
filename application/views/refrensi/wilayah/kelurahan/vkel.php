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
  function select_data($nm_kec,$kd_kel,$nm_kel) {
    $("#nm_kec").val($nm_kec);
    $("#kd_kel").val($kd_kel);
    $("#nm_kel").val($nm_kel);
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
                      Data Kelurahan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>kelurahan/tambah">
                              <div class="btn-group">
                                  <button class="btn green" title="Tambah Data Kelurahan">
                                      Tambah Data Kelurahan <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Proinsi</th>
                                  <th>Kabupaten</th>
                                  <th>Kecamatan</th>
                                  <th>Kelurahan</th>
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
                                  <td><?php echo $row->kd_prop; ?> - <?php echo $row->nm_prop; ?></td>
                                  <td><?php echo $row->kd_kab; ?> - <?php echo $row->nm_kab; ?></td>
                                  <td><?php echo $row->kd_kec; ?> - <?php echo $row->nm_kec; ?></td>
                                  <td><?php echo $row->kd_kel; ?> - <?php echo $row->nm_kel; ?></td>
                                  <td><a href="<?php echo base_url(); ?>kelurahan/ubah/<?php echo $row->kd_kel; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>kelurahan/hapus/<?php echo $row->kd_kel; ?>" onclick="return confirm('Anda yakin ingin menghapus kelurahan <?php echo $row->nm_kel; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->nm_kec ?>',
                                        '<?= $row->kd_kel ?>',
                                        '<?= $row->nm_kel ?>')">Lihat</a>
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
                                              <h4 class="modal-title">Data Kelurahan</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Nama Kecamatan</label>
                                          <div>
                                              <input class="form-control" id="nm_kec" name="nm_kec"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kode Kelurahan</label>
                                          <div>
                                              <input class="form-control" id="kd_kel" name="kd_kel"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                           <label>Nama Kelurahan</label>
                                          <div>
                                              <input class="form-control" id="nm_kel" name="nm_kel"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->