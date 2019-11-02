<script>
  function select_data($satuan_id,$satuan,$is_aktif) {
    $("#satuan_id").val($satuan_id);
    $("#satuan").val($satuan);
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
                      Data Satuan Barang
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>satuanbarang/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Satuan Barang <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Satuan</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                  $no =1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $row->satuan; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>satuanbarang/ubah/<?php echo $row->satuan_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>satuanbarang/hapus/<?php echo $row->satuan_id; ?>" onclick="return confirm('Anda yakin ingin menghapus satuan barang barang <?php echo $row->satuan; ?> ?')">Hapus</a>
                                | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->satuan_id ?>',
                                        '<?= $row->satuan ?>',
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
                                              <h4 class="modal-title">Data Kategori Barang</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Satuan Barang</label>
                                          <div>
                                              <input class="form-control" id="satuan_id" name="satuan_id"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Satuan Barang</label>
                                          <div>
                                              <input class="form-control" id="satuan" name="satuan"  minlength="2" type="text" readonly="readonly" required />
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