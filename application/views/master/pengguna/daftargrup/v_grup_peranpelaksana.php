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
  function select_data($grup_id,$grup,$is_aktif) {
    $("#grup_id").val($grup_id);
    $("#grup").val($grup);
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
                      Data Daftar Grup Pengguna
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                           
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Grup Pengguna</th>
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
                                  <td><?php echo $row->grup; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><!--<a href="<?php echo base_url(); ?>grup_peranpelaksana/ubah/<?php echo $row->grup_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>grup_peranpelaksana/hapus/<?php echo $row->peran_pelaksana_id; ?>" onclick="return confirm('Anda yakin ingin menghapus peran pelaksana pelayanan <?php echo $row->peran_pelaksana; ?> ?')">Hapus</a> 
                                      | --> <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->grup_id ?>',
                                        '<?= $row->grup ?>',
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
                                              <h4 class="modal-title">Lihat Grup Pengguna</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Grup Pengguna</label>
                                          <div>
                                              <input class="form-control" id="grup_id" name="grup_id"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pengguna</label>
                                          <div>
                                              <input class="form-control" id="grup" name="grup"  minlength="2" type="text" readonly="readonly" required />
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