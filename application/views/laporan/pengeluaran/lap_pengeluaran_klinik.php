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
                     Laporan Data Pengeluaran Klinik
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>lap_pengeluaran_klinik/cetak_all">
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
                                  <th>Kode Pengeluaran</th>
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
                                  <td><?php echo $row->pengeluaran_id; ?></td>
                                  <td><?php echo $row->tanggal_pengeluaran; ?></td>
                                  <td><?php echo $row->jenis_pengeluaran; ?></td>
                                  <td><?php echo $row->pengeluaran; ?></td>
                                  <td><?php echo $row->jumlah; ?></td>
                                  <td><?php echo $row->ket; ?></td>

                                  <td><a href="<?php echo base_url(); ?>lap_pengeluaran_klinik/cetak_id/<?php echo $row->pengeluaran_id; ?>"><button class="btn btn-primary" title="Cetak Data"><i class="icon-print"></i>
                                  </button></a>
                                  </td>
                              </tr>
                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>
 