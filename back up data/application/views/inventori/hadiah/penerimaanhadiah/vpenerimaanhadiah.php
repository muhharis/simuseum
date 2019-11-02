<script>
  function select_data($kode_penerimaan_hadiah,$tanggal_penerimaan,$jam,$hadiah,$jumlah,$ket) {
    $("#kode_penerimaan_hadiah").val($kode_penerimaan_hadiah);
    $("#tanggal_penerimaan").val($tanggal_penerimaan);
    $("#jam").val($jam);
    $("#hadiah").val($hadiah);
    
    $("#jumlah").val($jumlah);
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
                      Data Daftar Penerimaan Hadiah
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>penerimaanhadiah/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                       Data Penerimaan Hadiah <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nomor Penerimaan</th>
                                  <th>Tanggal/Jam</th>
                                  <th>Hadiah</th>
                                  <th>Keterangan</th>
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

                                  <td><?php echo $row->kode_penerimaan_hadiah; ?></td>
                                  <td><?php echo $row->tanggal_penerimaan; ?>/<?php echo $row->jam; ?></td>
                                  <td><?php echo $row->hadiah; ?></td>
                                  <td><?php echo $row->ket; ?></td>

                                  <td><a href="<?php echo base_url(); ?>penerimaanhadiah/ubah/<?php echo $row->kode_penerimaan_hadiah; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>penerimaanhadiah/hapus/<?php echo $row->kode_penerimaan_hadiah; ?>" onclick="return confirm('Anda yakin ingin menghapus penerimaan hadiah dengan kode <?php echo $row->kode_penerimaan_hadiah; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#lihat" onclick="select_data(
                                        '<?= $row->kode_penerimaan_hadiah ?>',
                                        '<?= $row->tanggal_penerimaan ?>',
                                        '<?= $row->jam ?>',
                                        '<?= $row->hadiah ?>',
                                        '<?= $row->jumlah ?>',
                                        '<?= $row->ket ?>', )">Lihat</a>
                                  </td>
                              </tr>
                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>

<!-- Modal LIHAT-->
 <div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Lihat Penerimaan Hadiah</h4>
                                          </div>
                                          <div class="modal-body">

                                          <label>No Penerimaan Hadiah</label>
                                          <div>
                                              <input class="form-control" id="kode_penerimaan_hadiah" name="kode_penerimaan_hadiah"  minlength="2" type="text"  readonly="readonly" required/> 
                                          </div><br>

                                          <label>Tanggal / Jam</label>
                                          <div class="form-inline">
                                              <input type="text" class="form-control" name="tanggal_penerimaan" style="width:266px;" id="tanggal_penerimaan" readonly="readonly" required>
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
                                          </div><br>

                                          <label>Hadiah</label>
                                          <div>
                                              <input class="form-control" id="hadiah" name="hadiah"  minlength="2" type="text"  readonly="readonly" required/> 
                                          </div><br>

                                          <label>Jumlah</label>
                                          <div>
                                              <input name="jumlah" id="jumlah" class="form-control" type="text" style="width:537px;" readonly="readonly" required>
                                          </div><br>

                                          <label>Keterangan</label>
                                          <div>
                                              <input class="form-control" id="ket" name="ket"  minlength="2" type="text" style="width:537px;" readonly="readonly" required>
                                          </div><br>

                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button">Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
 <!-- modal -->
