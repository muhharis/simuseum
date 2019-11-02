<script type="text/javascript">
  function cekform(){
    if(!$("#foto_brg").val()) {
      alert('Foto barang tidak boleh kosong');
      $("#foto_brg").focus();
      return false;
    }
  }
</script>
<script type="text/javascript"> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#foto_brg").change(function() {
        $("#message").empty(); // To remove the previous error message
        var foto_brg = this.files[0];
        var imagefile = foto_brg.type;
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
      $("#foto_brg").css("color","green");
      $('#image_preview').css("display", "block");
      $('#previewing').attr('src', e.target.result);
      $('#previewing').attr('width', '250px');
      $('#previewing').attr('height', '230px');
    }
  </script>
<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>produk" class="icon-mail-reply"></a>
                              Tambah Data Produk
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>produk/simpan" method="POST" onsubmit="return cekform();">
                                    <div class="form-group ">
                                          <label for="kode_barang" class="control-label col-lg-2">Kode Produk</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="kode_barang" name="kode_barang" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_barang" class="control-label col-lg-2">Nama Produk</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="nm_barang" name="nm_barang" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="grup_brg_id" class="control-label col-lg-2">Grup Barang</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="grup_brg_id" name="grup_brg_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addgb as $nama)
                                                {
                                                  echo '<option value="'.$nama->grup_brg_id.'">'.$nama->nm_grup_brg.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="kategori_brg_id" class="control-label col-lg-2">Kategori Barang</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="kategori_brg_id" name="kategori_brg_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addkb as $nama)
                                                {
                                                  echo '<option value="'.$nama->kategori_brg_id.'">'.$nama->kategori_brg.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="satuan_id" class="control-label col-lg-2">Satuan</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="satuan_id" name="satuan_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                foreach($addbds as $nama)
                                                {
                                                  echo '<option value="'.$nama->satuan_id.'">'.$nama->satuan.'</option>';
                                                }
                                              ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="spesifikasi" class="control-label col-lg-2">Spesifikasi</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="spesifikasi" name="spesifikasi" minlength="2" type="text" required />
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label class="control-label col-lg-2">Foto Barang</label>
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
                                                   <input type="file" id="foto_brg" name="foto_brg" class="default">
                                                   </span>
                                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Hapus Gambar</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Barang</label>
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

              