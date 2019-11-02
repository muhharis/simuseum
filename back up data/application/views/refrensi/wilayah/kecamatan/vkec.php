<script>
  function select_data($nm_kab,$kd_kec,$nm_kec) {
    $("#nm_kab").val($nm_kab);
    $("#kd_kec").val($kd_kec);
    $("#nm_kec").val($nm_kec);
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
                      Data Kecamatan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>kecamatan/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Kecamatan <i class="icon-plus"></i>
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
                                  <th>Kecamatan</th>
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
                                  <td><a href="<?php echo base_url(); ?>kecamatan/ubah/<?php echo $row->kd_kec; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>kecamatan/hapus/<?php echo $row->kd_kec; ?>" onclick="return confirm('Anda yakin ingin menghapus kecamatan <?php echo $row->nm_kec; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->nm_kab ?>',
                                        '<?= $row->kd_kec ?>',
                                        '<?= $row->nm_kec ?>')">Lihat</a>
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
                                              <h4 class="modal-title">Data Kecamatan</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Nama Kabupaten</label>
                                          <div>
                                              <input class="form-control" id="nm_kab" name="nm_kab"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kode Kecamatan</label>
                                          <div>
                                              <input class="form-control" id="kd_kec" name="kd_kec"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                           <label>Nama Kecamatan</label>
                                          <div>
                                              <input class="form-control" id="nm_kec" name="nm_kec"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->