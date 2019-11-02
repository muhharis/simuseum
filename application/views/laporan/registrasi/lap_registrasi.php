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
<section class="panel">
                  <header class="panel-heading">
                      Data Laporan Registrasi Pasien
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>lap_registrasi/cetak_all">
                              <div class="btn-group"><br>
                                  <button class="btn btn-danger" title="Cetak Semua"><i class="icon-print"></i>
                                       Cetak Semua
                                  </button>
                              </div>
                            </form>
                          </div>
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Registrasi</th>
                                  <th>No Rekam Medik</th>
                                  <th>Nama Pasien</th>
                                  <th>Jenis Kunjungan</th>
                                  <th>Tgl</th>
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

                                  <td><?php echo $row->no_registrasi; ?></td>
                                  <td><?php echo $row->no_rek_medik; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->jenis_kunjungan; ?></td>
                                  <td><?php echo $row->tanggal_registrasi; ?></td>

                                  <td><a href="<?php echo base_url(); ?>lap_registrasi/cetak_id/<?php echo $row->no_registrasi; ?>"><button class="btn btn-primary" title="Cetak Data"><i class="icon-print" ></i>
                                  </button></a> 
                                  </td>
                              </tr>

                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>