<script>
  function select_data($grup_tindakan,$kode_tindakan,$tindakan,$s_pelaksana,$is_aktif) {
    $("#grup_tindakan").val($grup_tindakan);
    $("#kode_tindakan").val($kode_tindakan);
    $("#tindakan").val($tindakan);
    $("#s_pelaksana").val($s_pelaksana);
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
                      Data Daftar Tindakan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>tindakan/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Daftar Tindakan <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Grup Tindakan</th>
                                  <th>Kode Tindakan</th>
                                  <th>Nama Tindakan</th>
                                  <th>Pelaksana</th>
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
                                  
                                  <td><?php echo $row->grup_tindakan; ?></td>
                                  <td><?php echo $row->kode_tindakan; ?></td>
                                  <td><?php echo $row->tindakan; ?></td>
                                  <td><?php echo $row->s_pelaksana; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>tindakan/ubah/<?php echo $row->kode_tindakan; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>tindakan/hapus/<?php echo $row->kode_tindakan; ?>" onclick="return confirm('Anda yakin ingin menghapus tindakan <?php echo $row->tindakan; ?> ?')">Hapus</a>
                                 | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->grup_tindakan ?>',
                                        '<?= $row->kode_tindakan ?>',
                                        '<?= $row->tindakan ?>',
                                        '<?= $row->s_pelaksana ?>',
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
                                              <h4 class="modal-title">Data Daftar Tindakan</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>Grup Tindakan</label>
                                          <div>
                                              <input class="form-control" id="grup_tindakan" name="grup_tindakan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kode Tindakan</label>
                                          <div>
                                              <input class="form-control" id="kode_tindakan" name="kode_tindakan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Tindakan</label>
                                          <div>
                                              <input class="form-control" id="tindakan" name="tindakan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Pelaksana</label>
                                          <div>
                                              <input class="form-control" id="s_pelaksana" name="s_pelaksana"  minlength="2" type="text" readonly="readonly" required />
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