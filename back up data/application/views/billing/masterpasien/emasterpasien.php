<script type="text/javascript">
  function cekform(){
    if(!$("#foto_pasien").val()) {
      alert('Foto pasien tidak boleh kosong');
      $("#foto_pasien").focus();
      return false;
    }
  }
</script>
<script type="text/javascript"> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#foto_pasien").change(function() {
        $("#message").empty(); // To remove the previous error message
        var foto_pasien = this.files[0];
        var imagefile = foto_pasien.type;
        var match= ["image/jpeg","image/png","image/jpg"];

        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing').attr('src','noimage.png');
          $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
    });

    function imageIsLoaded(e) {
      $("#foto_pasien").css("color","green");
      $('#image_preview').css("display", "block");
      $('#previewing').attr('src', e.target.result);
      $('#previewing').attr('width', '250px');
      $('#previewing').attr('height', '230px');
    }
  </script>
<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>masterpasien" class="icon-mail-reply"></a>
                              Ubah Data Master Pasien
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>masterpasien/simpan" method="POST">
                                    <!--<div class="form-group ">
                                          <label for="id" class="control-label col-lg-2">ID Pasien</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="id" name="id" value="<?php// echo $id; ?>"  minlength="2" type="text"  readonly="readonly" required/> 
                                          </div>
                                      </div> -->
                                      <div class="form-group ">
                                          <label for="no_rek_medik" class="control-label col-lg-2">No Rekam Medis</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="no_rek_medik" name="no_rek_medik" value="<?php echo $no_rek_medik; ?>"  minlength="2" type="text" readonly="readonly" required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_pasien" class="control-label col-lg-2">Nama Pasien</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="nm_pasien" name="nm_pasien" value="<?php echo $nm_pasien; ?>" minlength="2" type="text"   required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="id_gender" class="control-label col-lg-2">Jenis Kelamin</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="id_gender" name="id_gender" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addgen as $nama)
                                                    {
                                                      echo '<option value="'.$nama->id_gender.'">'.$nama->gender.'</option>';
                                                      }
                                              ?>
                                          </select >
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="tgl_lahir" class="control-label col-lg-2">Tanggal Lahir</label>
                                          <div class="form-inline">
                                            <div class="col-lg-10">
                                              <input type="text" class="form-control" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>"  id="tgl_awal" required>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="tmpt_lahir" class="control-label col-lg-2">Tempat Lahir</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?php echo $tmpt_lahir; ?>"  minlength="2" type="text"   required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="no_identitas" class="control-label col-lg-2">No KTP</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="no_identitas" name="no_identitas" value="<?php echo $no_identitas; ?>"  minlength="2" type="text"   required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="no_telp" class="control-label col-lg-2">No Telepon</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="no_telp" name="no_telp" value="<?php echo $no_telp; ?>" minlength="2" type="text"   required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="gol_darah" class="control-label col-lg-2">Golongan Darah</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="gol_darah" name="gol_darah" value="<?php echo $gol_darah; ?>" minlength="2" type="text"   required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="alamat" class="control-label col-lg-2">Alamat Lengkap</label>
                                          <div class="col-lg-10">
                                            <input class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>"  minlength="2" type="text"   required/> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="kd_kel" class="control-label col-lg-2">Kelurahan</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kd_kel" name="kd_kel" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addkel as $nama)
                                                    {
                                                      echo '<option value="'.$nama->kd_kel.'">'.$nama->nm_kel.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="agama_id" class="control-label col-lg-2">Agama</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="agama_id" name="agama_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addag as $nama)
                                                    {
                                                      echo '<option value="'.$nama->agama_id.'">'.$nama->agama.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Pendidikan</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="pend_id" name="pend_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addpend as $nama)
                                                    {
                                                      echo '<option value="'.$nama->pend_id.'">'.$nama->pendidikan.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Pekerjaan</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="id_pekerjaan" name="id_pekerjaan" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addpek as $nama)
                                                    {
                                                      echo '<option value="'.$nama->id_pekerjaan.'">'.$nama->pekerjaan.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="bank_id" class="control-label col-lg-2">Status Kawin</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" id="id_sk" name="id_sk" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addsk as $nama)
                                                    {
                                                      echo '<option value="'.$nama->id_sk.'">'.$nama->status_kawin.'</option>';
                                                      }
                                              ?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label class="control-label col-lg-2">Foto Pasien</label>
                                          <div class="col-lg-10">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 137px;">
                                                      <img src="<?php echo base_url(); ?>assets/img/poto.png" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;" required /></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Pilih Gambar</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Ulang</span>
                                                   <input type="file" id="foto_pasien" name="foto_pasien" class="default">
                                                   </span>
                                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Hapus Gambar</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Pasien</label>
                                          <div class="col-lg-10">
                                            <select id="is_aktif" name="is_aktif" class="form-control input-sm m-bot15">
                                              <option></option>
                                              <option value="Aktif">Aktif</option>
                                              <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit" title="Simpan">Simpan</button>
                                              <button class="btn btn-default" type="reset" title="Ulang">Ulang</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

              