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
                            <form action="<?php echo base_url(); ?>registrasi/tambah">
                              <div class="btn-group">
                                  <button class="btn green">
                                       Tambah Data Registrasi Pasien <i class="icon-plus"></i>
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
                                  <th>Alamat</th>
                                  <th>No Registrasi</th>
                                  <th>Jenis Kunjungan</th>
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
                                  <td><?php echo $row->jenis_kunjungan; ?></td>
                                  <td><?php echo $row->tmpt_lahir; ?></td>
                                  <td><?php echo $row->tgl_lahir; ?></td>

                                  <td><a href="<?php echo base_url(); ?>masterpasien/ubah/<?php echo $row->no_registrasi; ?>">Ubah</a>
                                      | <a href="<?php echo base_url(); ?>masterpasien/hapus/<?php echo $row->no_registrasi; ?>" onclick="return confirm('Anda yakin ingin menghapus pasien dengan nama <?php echo $row->nm_pasien; ?> ?')">Hapus</a>
                                      | <a href="<?php echo base_url(); ?>masterpasien/lihat/<?php echo $row->no_registrasi; ?>">Detail</a>
                                  </td>
                              </tr>
                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>