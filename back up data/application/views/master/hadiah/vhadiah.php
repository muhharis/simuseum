<script>
  function select_data($id_hadiah,$hadiah,$is_aktif) {
    $("#id_hadiah").val($id_hadiah);
    $("#hadiah").val($hadiah);
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
                      Data Daftar Hadiah
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>hadiah/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Daftar Hadiah <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Hadiah</th>
                                  <th>Status</th>
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
                                  <td><?php echo $row->hadiah; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>hadiah/ubah/<?php echo $row->id_hadiah; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>hadiah/hapus/<?php echo $row->id_hadiah; ?>" onclick="return confirm('Anda yakin ingin menghapus hadiah <?php echo $row->hadiah; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->id_hadiah ?>',
                                        '<?= $row->hadiah ?>',
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
                                              <h4 class="modal-title">Lihat Data Daftar Hadiah</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Hadiah</label>
                                          <div>
                                              <input class="form-control" id="id_hadiah" name="id_hadiah"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Hadiah</label>
                                          <div>
                                              <input class="form-control" id="hadiah" name="hadiah"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                           <label>Status Hadiah</label>
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