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
  <title>LAPORAN BIAYA ADMINISTRASI PEMBAYARAN PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN BIAYA ADMINISTRASI PEMBAYARAN PASIEN<br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a>
<hr>
<table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Kwitansi</th>
                                  <th>Tgl/Jam</th>
                                  <th>No Reg</th>
                                
                                  <th>Nama Pasien</th>
                                  <th>Pelaksana</th>
                                  <th>Biaya Periksa</th>
                                  <th>Biaya Obat</th>
                                  <th>Total Bayar</th>
                                  <th>Tunai</th>
                                  <th>Kembali</th>
                              
                                
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
                                  
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->nama_pelaksana; ?></td>
                                  <td><?php echo $row->b_periksa; ?></td>
                                  <td><?php echo $row->b_obat; ?></td>
                                  <td><?php echo $row->total_bayar; ?></td>
                                  <td><?php echo $row->tunai; ?></td>
                                  <td><?php echo $row->kembali; ?></td>
                              </tr>

                              <?php } ?>
                              </tbody>
                            
                          </table>
</body>
</html>  
