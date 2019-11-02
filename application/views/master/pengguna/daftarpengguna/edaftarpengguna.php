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
<div class="row">
                  <div class="col-lg-12">

                      <section class="panel">

                          <header class="panel-heading"><a href="<?php echo base_url(); ?>daftaruser" class="icon-mail-reply"></a>
                              Ubah Data Daftar Pengguna
                          </header>
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" action="<?php echo base_url(); ?>daftaruser/simpan" method="POST">
                                    <div class="form-group ">
                                          <label for="id" class="control-label col-lg-2">Username</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" value="<?php echo $code_user; ?>" id="code_user" name="code_user" minlength="2" type="text" required readonly />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nama" class="control-label col-lg-2">Nama Pengguna</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" value="<?php echo $nama; ?>" id="nama" name="nama" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                     <!-- <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Username</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" value="<?php echo $username; ?>" id="username" name="username" minlength="2" type="text" required />
                                          </div>
                                      </div> -->
                                      <div class="form-group ">
                                          <label for="pass" class="control-label col-lg-2">Password</label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" value="<?php echo $pass; ?>" id="pass" name="pass" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="grup_id" class="control-label col-lg-2">Grup</label>
                                          <div class="col-lg-10">
                                          <select class="form-control" id="grup_id" name="grup_id" minlength="2" required />
                                              <option></option>
                                              <?php 
                                                  foreach($addgrup as $nama)
                                                    {
                                                      echo '<option value="'.$nama->grup_id.'">'.$nama->grup.'</option>';
                                                      }
                                              ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nm_kel" class="control-label col-lg-2">Status Pengguna</label>
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

              