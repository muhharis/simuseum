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
  function select_data($nm_prop,$kd_kab,$nm_kab) {
    $("#nm_prop").val($nm_prop);
    $("#kd_kab").val($kd_kab);
    $("#nm_kab").val($nm_kab);
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
                      Data Kabupaten
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>kabupaten/tambah">
                              <div class="btn-group">
                                  <button class="btn green" title="Tambah Data Kabupaten">
                                      Tambah Data Kabupaten <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Propinsi</th>
                                  <th>Kabupaten</th>
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
                                  <td><a href="<?php echo base_url(); ?>kabupaten/ubah/<?php echo $row->kd_kab; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>kabupaten/hapus/<?php echo $row->kd_kab; ?>" onclick="return confirm('Anda yakin ingin menghapus kabupaten <?php echo $row->nm_kab; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->nm_prop ?>',
                                        '<?= $row->kd_kab ?>',
                                        '<?= $row->nm_kab ?>')">Lihat</a>
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

                                          
                                          <label>Nama Propinsi</label>
                                          <div>
                                              <input class="form-control" id="nm_prop" name="nm_prop"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kode Kabupaten</label>
                                          <div>
                                              <input class="form-control" id="kd_kab" name="kd_kab"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                           <label>Nama Kabupaten</label>
                                          <div>
                                              <input class="form-control" id="nm_kab" name="nm_kab"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->