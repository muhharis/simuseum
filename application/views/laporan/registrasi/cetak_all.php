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
  <title>LAPORAN REGISTRASI PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN REGISTRASI PASIEN <br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
 Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a><hr>

<table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Registrasi</th>
                                  <th>No Rekam Medik</th>
                                  <th>Nama Pasien</th>
                                  <th>Jenis Kunjungan</th>
                                  <th>Tgl</th>
                     
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
                              </tr>

                              <?php } ?>
                            
                              </tbody>
                            
                          </table>
</body>
</html>
