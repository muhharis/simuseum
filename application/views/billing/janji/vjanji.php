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
  function select_data($tanggal_janji,$jam,$nama_pelaksana,$peran_pelaksana,$nm_pasien,$no_telp,$jenis_kunjungan,$keterangan,$is_aktif) {
    $("#tanggal_janji").val($tanggal_janji);
    $("#jam").val($jam);
    $("#nama_pelaksana").val($nama_pelaksana);
    $("#peran_pelaksana").val($peran_pelaksana);
    $("#nm_pasien").val($nm_pasien);
    $("#no_telp").val($no_telp);
    $("#jenis_kunjungan").val($jenis_kunjungan);
    $("#keterangan").val($keterangan);
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
                      Data Daftar Janji
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>janji/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Janji <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tanggal Janji</th>
                                  <th>Jam Janji</th>
                                  <th>Dokter</th>
                                  <th>Nama Pasien</th>
                                  <th>Telp Pasien</th>
                                  <th>Jenis Kunjungan</th>
                                  <th>Keterangan</th>
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
                                  <td><?php echo $row->tanggal_janji; ?></td>
                                  <td><?php echo $row->jam; ?></td>
                                  <td><?php echo $row->nama_pelaksana;  ?> - <?php echo $row->peran_pelaksana; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->no_telp; ?></td>
                                  <td><?php echo $row->jenis_kunjungan; ?></td>
                                  <td><?php echo $row->keterangan; ?></td>
                                  <td><?php echo $row->is_aktif; ?> </td>

                                  <td><a href="<?php echo base_url(); ?>janji/ubah/<?php echo $row->janji_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>janji/hapus/<?php echo $row->janji_id; ?>" onclick="return confirm('Anda yakin ingin menghapus janji atas nama pasien <?php echo $row->nm_pasien; ?> ?')">Hapus</a>
                                 | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->tanggal_janji ?>',
                                        '<?= $row->jam ?>',
                                        '<?= $row->nama_pelaksana ?>',
                                        '<?= $row->peran_pelaksana ?>',
                                        '<?= $row->nm_pasien ?>',
                                        '<?= $row->no_telp ?>',
                                        '<?= $row->jenis_kunjungan ?>',
                                        '<?= $row->keterangan ?>',
                                        '<?= $row->is_aktif ?>',)">Lihat</a>
                                  | <a href="<?php echo base_url(); ?>lap_janji/cetak_id/<?php echo $row->janji_id; ?>">Cetak</a>
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
                                              <h4 class="modal-title">Data Janji Pasien</h4>
                                          </div>
                                          <div class="modal-body">

                                          
                                          <label>Tanggal Janji</label>
                                          <div>
                                              <input class="form-control" id="tanggal_janji" name="tanggal_janji"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pelaksana</label>
                                          <div>
                                              <input class="form-control" id="nama_pelaksana" name="nama_pelaksana"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>
                                          <label>Peran Pelaksana</label>
                                          <div>
                                              <input class="form-control" id="peran_pelaksana" name="peran_pelaksana"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Pasien</label>
                                          <div>
                                              <input class="form-control" id="nm_pasien" name="nm_pasien"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Telepon Pasien</label>
                                          <div>
                                              <input class="form-control" id="no_telp" name="no_telp"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Jenis Kunjungan</label>
                                          <div>
                                              <input class="form-control" id="jenis_kunjungan" name="jenis_kunjungan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Keterangan</label>
                                          <div>
                                              <input class="form-control" id="keterangan" name="keterangan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Status Janji</label>
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