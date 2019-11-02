<script>
  function select_data($harga_beli_id,$kode_barang,$nm_barang,$harga_beli,$tgl_berlaku,$ket) {
    $("#harga_beli_id").val($harga_beli_id);
    $("#kode_barang").val($kode_barang);
    $("#nm_barang").val($nm_barang);
    
    $("#harga_beli").val($harga_beli);
    $("#tgl_berlaku").val($tgl_berlaku);
    $("#ket").val($ket);
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
                      Data Haga Beli
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>hargabeli/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Harga Beli <i class="icon-plus"></i>
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
                                  <th>Tanggal Berlaku</th>
                                  <th>Harga Beli</th>
                                  
                                  <th>Keterangan</th>
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
                                  <td><?php echo $row->tgl_berlaku; ?></td>
                                  <td><?php echo $row->harga_beli; ?></td>
                                  
                                  <td><?php echo $row->ket; ?></td>

                                  <td><a href="<?php echo base_url(); ?>hargabeli/ubah/<?php echo $row->harga_beli_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>hargabeli/hapus/<?php echo $row->harga_beli_id; ?>" onclick="return confirm('Anda yakin ingin menghapus harga beli barang <?php echo $row->nm_barang; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->harga_beli_id ?>',
                                        '<?= $row->kode_barang ?>',
                                        '<?= $row->nm_barang ?>',
                                        '<?= $row->harga_beli ?>',
                                        '<?= $row->tgl_berlaku ?>',
                                        '<?= $row->ket ?>', )">Lihat</a>
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
                                              <h4 class="modal-title">Lihat Data Harga Beli</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>Kode Harga Beli</label>
                                          <div>
                                              <input class="form-control" id="harga_beli_id" name="harga_beli_id"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kode Barang</label>
                                          <div>
                                              <input class="form-control" id="kode_barang" name="kode_barang"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Barang</label>
                                          <div>
                                              <input class="form-control" id="nm_barang" name="nm_barang"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Harga Beli</label>
                                          <div>
                                              <input class="form-control" id="harga_beli" name="harga_beli"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Tanggal Berlaku</label>
                                          <div>
                                              <input class="form-control" id="tgl_berlaku" name="tgl_berlaku"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Keterangan</label>
                                          <div>
                                              <input class="form-control" id="ket" name="ket"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->