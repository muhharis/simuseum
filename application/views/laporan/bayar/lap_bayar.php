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
                      Data Laporan Biaya Administrasi Pembayaran Pasien
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>lap_pembayaran_pasien/cetak_all">
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
                                  <th>Kode Kwitansi</th>
                                  <th>Tgl/Jam</th>
                                  <th>No Reg</th>
                                  <th>No Rekam Medik</th>
                                  <th>Nama Pasien</th>
                                  <th>Pelaksana</th>
                                  <th>Biaya Periksa</th>
                                  <th>Biaya Obat</th>
                                  <th>Total Bayar</th>
                                  <th>Tunai</th>
                                  <th>Kembali</th>
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
                                  <td><?php echo $row->kode_kwitansi; ?></td>
                                  <td><?php echo $row->tgl; ?>/<?php echo $row->jam; ?></td>
                                  <td><?php echo $row->no_registrasi; ?></td>
                                  <td><?php echo $row->no_rek_medik; ?></td> 
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->nama_pelaksana; ?></td>
                                  <td><?php echo $row->b_periksa; ?></td>
                                  <td><?php echo $row->b_obat; ?></td>
                                  <td><?php echo $row->total_bayar; ?></td>
                                  <td><?php echo $row->tunai; ?></td>
                                  <td><?php echo $row->kembali; ?></td>
                                  <td><a href="<?php echo base_url(); ?>lap_pembayaran_pasien/cetak_id/<?php echo $row->kode_kwitansi; ?>"><button class="btn btn-primary" title="Cetak Data"><i class="icon-print"></i>
                                  </button></a>
                                  </td>
                              </tr>

                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>