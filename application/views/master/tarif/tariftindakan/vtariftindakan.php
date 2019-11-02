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
  function select_data($kode_tindakan,$tarif_tindakan_id,$tindakan,$tarif,$disc_persen,$disc_rupiah,$tgl_berlaku,$ket,$is_aktif) {
    $("#tarif_tindakan_id").val($tarif_tindakan_id);
    $("#kode_tindakan").val($kode_tindakan);
    
    $("#tindakan").val($tindakan);
    $("#tarif").val($tarif);
    $("#disc_persen").val($disc_persen);
    $("#disc_rupiah").val($disc_rupiah);
    $("#tgl_berlaku").val($tgl_berlaku);
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
                      Data Tarif Tindakan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>tariftindakan/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                      Tambah Data Tarif Tindakan <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Tindakan</th>
                                  <th>Nama Tindakan</th>
                                  <th>Tarif</th>
                                  <th>Disc(%)</th>
                                  <th>Disc(Rp)</th>
                                  <th>Tanggal Berlaku</th>
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

                                  <td><?php echo $row->kode_tindakan; ?></td>
                                  <td><?php echo $row->tindakan; ?></td>
                                  <td><?php echo $row->tarif; ?></td>
                                  <td><?php echo $row->disc_persen; ?></td>
                                  <td><?php echo $row->disc_rupiah; ?></td>
                                  <td><?php echo $row->tgl_berlaku; ?></td>
                                  <td><?php echo $row->ket; ?></td>
                                  <td><?php echo $row->is_aktif; ?> </td>

                                  <td><a href="<?php echo base_url(); ?>tariftindakan/ubah/<?php echo $row->tarif_tindakan_id; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>tariftindakan/hapus/<?php echo $row->tarif_tindakan_id; ?>" onclick="return confirm('Anda yakin ingin menghapus tarif tindakan <?php echo $row->tindakan; ?> ?')">Hapus</a>
                                      | <a data-toggle="modal" href="#myModal" onclick="select_data(
                                        '<?= $row->kode_tindakan ?>',
                                        '<?= $row->tarif_tindakan_id ?>',
                                        '<?= $row->tindakan ?>',
                                        '<?= $row->tarif ?>',
                                        '<?= $row->disc_persen ?>',
                                        '<?= $row->disc_rupiah ?>',
                                        '<?= $row->tgl_berlaku ?>',
                                        '<?= $row->ket ?>',
                                        '<?= $row->is_aktif ?>', )">Lihat</a>
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
                                              <h4 class="modal-title">Lihat Data Tarif Tindakan</h4>
                                          </div>
                                          <div class="modal-body">
                                          <label>Kode Tarif Tindakan</label>
                                          <div>
                                              <input class="form-control" id="tarif_tindakan_id" name="tarif_tindakan_id"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Kode Tindakan</label>
                                          <div>
                                              <input class="form-control" id="kode_tindakan" name="kode_tindakan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Nama Tindakan</label>
                                          <div>
                                              <input class="form-control" id="tindakan" name="tindakan"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Tarif</label>
                                          <div>
                                              <input class="form-control" id="tarif" name="tarif"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                           <label>Discon Persen</label>
                                          <div>
                                              <input class="form-control" id="disc_persen" name="disc_persen"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Discon Rupiah</label>
                                          <div>
                                              <input class="form-control" id="disc_rupiah" name="disc_rupiah"  minlength="2" type="text" readonly="readonly" required />
                                          </div><br>

                                          <label>Tanggal Berlaku</label>
                                          <div>
                                              <input class="form-control" id="tgl_berlaku" name="tgl_berlaku"  minlength="2" type="text" readonly="readonly" required />
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