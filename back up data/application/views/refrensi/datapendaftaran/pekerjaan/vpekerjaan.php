<script>
  function select_data($id_pekerjaan,$pekerjaan,$is_aktif) {
    $("#id_pekerjaan").val($id_pekerjaan);
    $("#pekerjaan").val($pekerjaan);
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
                      Data Pekerjaan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>pekerjaan/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Pekerjaan <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Pekerjaan</th>
                                  <th>Status</th>
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
                                  <td><?php echo $row->pekerjaan; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>pekerjaan/ubah/<?php echo $row->id_pekerjaan; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>pekerjaan/hapus/<?php echo $row->id_pekerjaan; ?>" onclick="return confirm('Anda yakin ingin menghapus pekerjaan <?php echo $row->pekerjaan; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->id_pekerjaan ?>',
                                        '<?= $row->pekerjaan ?>',
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
                                              <h4 class="modal-title">Data Pekerjaan</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>Kode Pekerjaan</label>
                                          <div>
                                              <input class="form-control" id="id_pekerjaan" name="id_pekerjaan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pekerjaan</label>
                                          <div>
                                              <input class="form-control" id="pekerjaan" name="pekerjaan"  minlength="2" type="text" readonly="readonly" required />
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