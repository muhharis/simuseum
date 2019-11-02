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
<!DOCTYPE html>
<html>
<head>
  <title>LAPORAN PENERIMAAN OBAT/PRODUK</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN PENERIMAAN OBAT/PRODUK <br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a>
<hr>
<table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nomor Penerimaan</th>
                                  <th>Tanggal/Jam</th>
                                  <th>Pemasok</th>
                                  <th>Produk</th>
                                  <th>Jumlah</th>
                                  <th>Keterangan</th>
                             
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                $no = 1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">

                                  <td><?php echo $no++; ?></td>

                                  <td><?php echo $row->no_penerimaan_obat; ?></td>
                                  <td><?php echo $row->tanggal_penerimaan; ?>/<?php echo $row->jam; ?></td>
                                  <td><?php echo $row->nm_pemasok; ?></td>
                                  <td><?php echo $row->nm_barang; ?></td>
                                  <td><?php echo $row->jumlah; ?></td>
                                  <td><?php echo $row->ket; ?></td>
                              </tr>
                              <?php } ?>
                              </tbody>
                            
                          </table>
</body>
</html>
