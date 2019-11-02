<script>
  function select_data($kode_barang,$nm_barang,$spesifikasi,$nm_grup_brg,$satuan,$kategori_brg,$is_aktif) {
    $("#kode_barang").val($kode_barang);
    $("#nm_barang").val($nm_barang);
    $("#spesifikasi").val($spesifikasi);
    $("#nm_grup_brg").val($nm_grup_brg);
    $("#satuan").val($satuan);
    $("#kategori_brg").val($kategori_brg);
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
                      Data Daftar Produk
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>produk/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Produk <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Produk</th>
                                  <th>Nama Produk</th>
                                  <th>Spesifikasi</th>
                                  <th>Grup</th>
                                  <th>Satuan</th>
                                  <th>Kategori</th>
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
                                  <td><?php echo $row->kode_barang; ?></td>
                                  <td><?php echo $row->nm_barang; ?></td>
                                  <td><?php echo $row->spesifikasi; ?></td>
                                  <td><?php echo $row->nm_grup_brg; ?></td>
                                  <td><?php echo $row->satuan; ?></td>
                                  <td><?php echo $row->kategori_brg; ?></td>
                                  <td><?php echo $row->is_aktif; ?> </td>

                                  <td><a href="<?php echo base_url(); ?>produk/ubah/<?php echo $row->kode_barang; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>produk/hapus/<?php echo $row->kode_barang; ?>" onclick="return confirm('Anda yakin ingin menghapus produk <?php echo $row->nm_barang; ?> ?')">Hapus</a>
                                 | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->kode_barang ?>',
                                        '<?= $row->nm_barang ?>',
                                        '<?= $row->spesifikasi ?>',
                                        '<?= $row->nm_grup_brg ?>',
                                        '<?= $row->satuan ?>',
                                        '<?= $row->kategori_brg ?>',
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
                                              <h4 class="modal-title">Data Daftar Produk</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>Kode Barang</label>
                                          <div>
                                              <input class="form-control" id="kode_barang" name="kode_barang"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Barang</label>
                                          <div>
                                              <input class="form-control" id="nm_barang" name="nm_barang"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Spesifikasi</label>
                                          <div>
                                              <input class="form-control" id="spesifikasi" name="spesifikasi"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Grup Barang</label>
                                          <div>
                                              <input class="form-control" id="nm_grup_brg" name="nm_grup_brg"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Satuan</label>
                                          <div>
                                              <input class="form-control" id="satuan" name="satuan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kategori</label>
                                          <div>
                                              <input class="form-control" id="kategori_brg" name="kategori_brg"  minlength="2" type="text" readonly="readonly" required />
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