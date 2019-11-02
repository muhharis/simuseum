<script>
  function select_data($kd_prop,$nm_prop) {
    $("#kd_prop").val($kd_prop);
    $("#nm_prop").val($nm_prop);
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
                      Data Propinsi
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>propinsi/tambah">
                              <div class="btn-group">
                                  <button class="btn green" title="Tambah Data Propinsi">
                                      Tambah Data Propinsi <i class="icon-plus" ></i>
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
                                  <td><a href="<?php echo base_url(); ?>propinsi/ubah/<?php echo $row->kd_prop; ?>" title="ubah">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>propinsi/hapus/<?php echo $row->kd_prop; ?>" onclick="return confirm('Anda yakin ingin menghapus propinsi <?php echo $row->nm_prop; ?> ?')" title="hapus">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->kd_prop ?>',
                                        '<?= $row->nm_prop ?>')">Lihat</a>
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
                                              <h4 class="modal-title">Data Propinsi</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Propinsi</label>
                                          <div>
                                              <input class="form-control" id="kd_prop" name="kd_prop"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Propinsi</label>
                                          <div>
                                              <input class="form-control" id="nm_prop" name="nm_prop"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->