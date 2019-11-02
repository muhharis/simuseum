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
  function select_data($peran_pelaksana_id,$peran_pelaksana,$is_aktif) {
    $("#peran_pelaksana_id").val($peran_pelaksana_id);
    $("#peran_pelaksana").val($peran_pelaksana);
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
                      Data Peran Pelaksana
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>peranpelaksana/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Peran Pelaksana <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Pelaksana</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                $no= 1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">
                                <td><?php echo $no++; ?></td>
                                  <td><?php echo $row->peran_pelaksana; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>peranpelaksana/ubah/<?php echo $row->peran_pelaksana_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>peranpelaksana/hapus/<?php echo $row->peran_pelaksana_id; ?>" onclick="return confirm('Anda yakin ingin menghapus peran pelaksana pelayanan <?php echo $row->peran_pelaksana; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->peran_pelaksana_id ?>',
                                        '<?= $row->peran_pelaksana ?>',
                                        '<?= $row->is_aktif ?>')">Lihat</a>
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
                                              <h4 class="modal-title">Data Peran Pelaksana</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Pelaksana</label>
                                          <div>
                                              <input class="form-control" id="peran_pelaksana_id" name="peran_pelaksana_id"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pelaksana</label>
                                          <div>
                                              <input class="form-control" id="peran_pelaksana" name="peran_pelaksana"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                           <label>Status</label>
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