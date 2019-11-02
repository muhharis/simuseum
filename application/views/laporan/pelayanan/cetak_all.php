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
  <title>LAPORAN PELAYANAN PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN PELAYANAN PASIEN<br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a>
<hr>
<table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No RM</th>
                                  <th>Nama Pasien</th>
                                  <th>Alamat</th>
                                  <th>No Registarsi</th>
                                  <th>Kunjungan</th>
                                  <th>Antrian</th>
                                  <th>Tanggal Pelayanan</th>
                                  <th>Status Pelayanan</th>
                        
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                $no=1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">

                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $row->no_rek_medik; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->alamat; ?></td>
                                  <td><?php echo $row->no_registrasi; ?></td>
                                  <td><?php echo $row->jenis_kunjungan; ?></td>
                                  <td><?php echo $row->antrian; ?></td>
                                  <td><?php echo $row->tgl_pelayanan; ?></td>
                                  <td><?php echo $row->is_aktif; ?></td>
                              </tr>
                              <?php } ?>
                              </tbody>
                            
                          </table>
</body>
</html>