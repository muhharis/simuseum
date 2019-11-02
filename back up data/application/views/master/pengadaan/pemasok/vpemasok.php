<script>
  function select_data($kode_pemasok,$nm_pemasok,$no_ktp,$alamat,$kota,$telp,$ket,$is_aktif) {
    $("#kode_pemasok").val($kode_pemasok);
    $("#nm_pemasok").val($nm_pemasok);
    $("#no_ktp").val($no_ktp);
    $("#alamat").val($alamat);
    $("#kota").val($kota);
    $("#telp").val($telp);
    $("#kota").val($kota);
    $("#ket").val($ket);
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
                      Data Pemasok
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>pemasok/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Pemasok <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <!--<th>Kode Pemasok</th>-->
                                  <th>Nama Pemasok</th>
                                  <th>Nomor KTP</th>
                                  <th>Alamat Lengkap</th>
                                  <!--<th>Kota Asal</th>-->
                                  <th>Telepon</th>
                                  <th>Keterangan</th>
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
                                  <!--<td><?php //echo $row->kode_pemasok; ?></td>-->
                                  <td><?php echo $row->nm_pemasok; ?></td>
                                  <td><?php echo $row->no_ktp; ?></td>
                                  <td><?php echo $row->alamat; ?></td>
                                  <!--<td><?php //echo $row->kota; ?></td>-->
                                  <td><?php echo $row->telp; ?></td>
                                  <td><?php echo $row->ket; ?></td>
                                  <td><?php echo $row->is_aktif;
                                      ?>
                                  </td>
                                  <td><a href="<?php echo base_url(); ?>pemasok/ubah/<?php echo $row->kode_pemasok; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>pemasok/hapus/<?php echo $row->kode_pemasok; ?>" onclick="return confirm('Anda yakin ingin menghapus pemasok <?php echo $row->nm_pemasok; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->kode_pemasok ?>',
                                        '<?= $row->nm_pemasok ?>',
                                        '<?= $row->no_ktp ?>',
                                        '<?= $row->alamat ?>',
                                        '<?= $row->kota ?>',
                                        '<?= $row->telp ?>',
                                        '<?= $row->ket ?>',
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
                                              <h4 class="modal-title">Data Pemasok</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Kode Pemasok</label>
                                          <div>
                                              <input class="form-control" id="kode_pemasok" name="kode_pemasok"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pemasok</label>
                                          <div>
                                              <input class="form-control" id="nm_pemasok" name="nm_pemasok"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nomor KTP</label>
                                          <div>
                                              <input class="form-control" id="no_ktp" name="no_ktp"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Alamat Lengkap</label>
                                          <div>
                                              <input class="form-control" id="alamat" name="alamat"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kota Asal</label>
                                          <div>
                                              <input class="form-control" id="kota" name="kota"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nomor Telepon</label>
                                          <div>
                                              <input class="form-control" id="telp" name="telp"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Keterangan</label>
                                          <div>
                                              <input class="form-control" id="ket" name="ket"  minlength="2" type="text" readonly="readonly" required />
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