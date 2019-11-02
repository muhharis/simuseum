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
                      Data Laporan Penjualan
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                          <div class="clearfix">
                            <form action="<?php echo base_url(); ?>lap_penjualan/cetak_all">
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
                                  <th>ID Order</th>
                                  <th>ID Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Harga Jual</th>
                                  <th>Jumlah</th>
                                  <th>Sub Total</th>
                                  <th>Waktu</th>
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
                                  <td><?php echo $row->id_order; ?></td>
                                  <td><?php echo $row->kode_barang; ?></td>
                                  <td><?php echo $row->nm_barang; ?></td> 
                                  <td><?php echo $row->harga_jual; ?></td>
                                  <td><?php echo $row->qty; ?></td>
                                  <td><?php echo $row->subtotal; ?></td>
                                  <td><?php echo $row->time; ?></td>
                                  <td><a href="<?php echo base_url(); ?>lap_penjualan/cetak_id/<?php echo $row->id_order; ?>"><button class="btn btn-primary" title="Cetak Data"><i class="icon-print"></i>
                                  </button></a>
                                  </td>
                              </tr>

                              <?php } ?>
                              </tbody>
                            
                          </table>
                      </div>
                  </div>
              </section>