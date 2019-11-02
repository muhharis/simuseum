<script>
  function select_data($grup_tindakan_id,$grup_tindakan,$is_aktif) {
    $("#grup_tindakan_id").val($grup_tindakan_id);
    $("#grup_tindakan").val($grup_tindakan);
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
                      Data Grup Tindakan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>index.php/jenistindakan/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Grup Tindakan <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Tindakan</th>
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
                                  <td><?php echo $row->grup_tindakan; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>index.php/jenistindakan/ubah/<?php echo $row->grup_tindakan_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>index.php/jenistindakan/hapus/<?php echo $row->grup_tindakan_id; ?>" onclick="return confirm('Anda yakin ingin menghapus tindakan <?php echo $row->grup_tindakan; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->grup_tindakan_id ?>',
                                        '<?= $row->grup_tindakan ?>',
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
                                              <h4 class="modal-title">Data Grup Tindakan</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Tindakan</label>
                                          <div>
                                              <input class="form-control" id="grup_tindakan_id" name="grup_tindakan_id"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Tindakan</label>
                                          <div>
                                              <input class="form-control" id="grup_tindakan" name="grup_tindakan"  minlength="2" type="text" readonly="readonly" required />
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