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
<script type="text/javascript">
  function cekform(){
    if(!$("#foto_pemasok").val()) {
      alert('Foto pemasok tidak boleh kosong');
      $("#foto_pemasok").focus();
      return false;
    }
  }
</script>
<script type="text/javascript"> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#foto_pemasok").change(function() {
        $("#message").empty(); // To remove the previous error message
        var foto_pemasok = this.files[0];
        var imagefile = foto_pemasok.type;
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
      $("#foto_pemasok").css("color","green");
      $('#image_preview').css("display", "block");
      $('#previewing').attr('src', e.target.result);
      $('#previewing').attr('width', '250px');
      $('#previewing').attr('height', '230px');
    }
  </script>
<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>index.php/pemasok" class="icon-mail-reply"></a>
                              Tambah Data Pemasok
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>index.php/pemasok/simpan" method="POST" onsubmit="return cekform();">
                                    <div class="form-group ">
                                          <label for="kode_pemasok" class="control-label col-lg-2">Kode Pemasok</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kode_pemasok" name="kode_pemasok" value="<?= $kodeunik2; ?>" minlength="2" type="text" readonly required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_pemasok" class="control-label col-lg-2">Nama Pemasok</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="nm_pemasok" name="nm_pemasok" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="no_ktp" class="control-label col-lg-2">Nomor KTP</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="no_ktp" name="no_ktp" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="alamat" class="control-label col-lg-2">Alamat Lengkap</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="alamat" name="alamat" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="kota" class="control-label col-lg-2">Kota</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kota" name="kota" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="telp" class="control-label col-lg-2">Nomor Telepon</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="telp" name="telp" minlength="2" type="text" required />
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <label class="control-label col-lg-2">Foto Pemasok</label>
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
                                                   <input type="file" id="foto_pemasok" name="foto_pemasok" class="default">
                                                   </span>
                                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Hapus Gambar</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="ket" class="control-label col-lg-2">Keterangan</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="ket" name="ket" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="is_aktif" class="control-label col-lg-2">Status Pemasok</label>
                                          <div class="col-lg-10">
                                            <select id="is_aktif" name="is_aktif" class="form-control input-sm m-bot15">
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

              