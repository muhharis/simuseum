<!--<script>
  function select_data($no_rek_medik,$nm_pasien,$gender,$tmpt_lahir,$alamat,$is_aktif) {
    $("#no_rek_medik").val($no_rek_medik);
    $("#nm_pasien").val($nm_pasien);
    $("#gender").val($gender);
    $("#tmpt_lahir").val($tmpt_lahir);
    
    $("#alamat").val($alamat);
    $("#is_aktif").val($is_aktif);
  }
</script> -->
<?php 
$info = $this->session->flashdata('info');
if(!empty($info))
{
  echo $info;
}
?>
<section class="panel">
                  <header class="panel-heading">
                      Data Daftar Master Pasien
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>masterpasien/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                       Tambah Data Master Pasien <i class="icon-plus"></i>
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Rekam Medis</th>
                                  <th>Nama Pasien</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Tempat Lahir</th>
                                  <th>Tanggal Lahir</th>
                                  <th>Alamat Lengkap</th>
                                  <th>Aktif/Tidak</th>
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

                                  <td><?php echo $row->no_rek_medik; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->gender; ?></td>
                                  <td><?php echo $row->tmpt_lahir; ?></td>
                                  <td><?php echo $row->tgl_lahir; ?></td>
                                  <td><?php echo $row->alamat; ?></td>
                                  <td><?php echo $row->is_aktif; ?></td>

                                  <td><a href="<?php echo base_url(); ?>masterpasien/ubah/<?php echo $row->no_rek_medik; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>masterpasien/hapus/<?php echo $row->no_rek_medik; ?>" onclick="return confirm('Anda yakin ingin menghapus pasien dengan nama <?php echo $row->nm_pasien; ?> ?')">Hapus</a>
                                      | <a href="<?php echo base_url(); ?>masterpasien/lihat/<?php echo $row->no_rek_medik; ?>">Detail</a>
                                  </td>
                              </tr>
                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>

<!-- Modal LIHAT
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
                                              <input type="text" class="form-control" name="jam" id="jam" value="<?php //print date('H:i:s'); ?>" style=" width:266px;" readonly="readonly" required/>
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
modal -->
