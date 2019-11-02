<!--
* File      : Klinik2.php
* Language    : PHP
* Package   : CodeIgniter 3.0
* Location    : application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author      : MuhHaris
* Email       :muhharis90@yahoo.com
* HP      : 089-537-625-7021
*/
-->
<script>
  function select_data($tanggal_pengeluaran,$jenis_pengeluaran,$pengeluaran,$jumlah,$ket) {
    $("#tanggal_pengeluaran").val($tanggal_pengeluaran);
    $("#jenis_pengeluaran").val($jenis_pengeluaran);
    $("#pengeluaran").val($pengeluaran);
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
                      Data Pengeluaran Klinik
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>pengeluaran/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Pengeluaran Klinik <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tanggal Pengeluaran</th>
                                  <th>Jenis Pengeluaran</th>
                                  <th>Pengeluaran</th>
                                  <th>Jumlah</th>
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
                                  <td><?php echo $row->tanggal_pengeluaran; ?></td>
                                  <td><?php echo $row->jenis_pengeluaran; ?></td>
                                  <td><?php echo $row->pengeluaran; ?></td>
                                  <td><?php echo $row->jumlah; ?></td>
                                  <td><?php echo $row->ket; ?></td>

                                  <td><a href="<?php echo base_url(); ?>pengeluaran/ubah/<?php echo $row->pengeluaran_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>pengeluaran/hapus/<?php echo $row->pengeluaran_id; ?>" onclick="return confirm('Anda yakin ingin menghapus pengeluaran <?php echo $row->pengeluaran; ?> ?')">Hapus</a>
                                 | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->tanggal_pengeluaran ?>',
                                        '<?= $row->jenis_pengeluaran ?>',
                                        '<?= $row->pengeluaran ?>',
                                        '<?= $row->jumlah ?>',
                                        '<?= $row->ket ?>',)">Lihat</a>
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
                                              <h4 class="modal-title">Data Pengeluaran Klinik</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Tanggal Pengeluaran</label>
                                          <div>
                                              <input class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Jenis Pengeluaran</label>
                                          <div>
                                              <input class="form-control" id="jenis_pengeluaran" name="jenis_pengeluaran"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Pengeluaran</label>
                                          <div>
                                              <input class="form-control" id="pengeluaran" name="pengeluaran"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Jumlah</label>
                                          <div>
                                              <input class="form-control" id="jumlah" name="jumlah"  minlength="2" type="text" readonly="readonly" required />
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