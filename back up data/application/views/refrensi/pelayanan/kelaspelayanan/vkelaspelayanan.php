<script>
  function select_data($kelas_id,$kelas,$is_aktif) {
    $("#kelas_id").val($kelas_id);
    $("#kelas").val($kelas);
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
                      Data Kelas Pelayanan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>kelaspelayanan/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Kelas Pelayanan <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Kelas</th>
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
                                  <td><?php echo $row->kelas; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>kelaspelayanan/ubah/<?php echo $row->kelas_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>kelaspelayanan/hapus/<?php echo $row->kelas_id; ?>" onclick="return confirm('Anda yakin ingin menghapus kelas pelayanan <?php echo $row->kelas; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->kelas_id ?>',
                                        '<?= $row->kelas ?>',
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
                                              <h4 class="modal-title">Data Kelas Pelayanan</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Kelas</label>
                                          <div>
                                              <input class="form-control" id="kelas_id" name="kelas_id"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Kelas</label>
                                          <div>
                                              <input class="form-control" id="kelas" name="kelas"  minlength="2" type="text" readonly="readonly" required />
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