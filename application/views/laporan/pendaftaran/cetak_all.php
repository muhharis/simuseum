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
  <title>LAPORAN PENDAFTARAN PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN PENDAFTARAN PASIEN <br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a>
<hr>
   <table class="table table-striped table-hover table-bordered">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Rekam Medis</th>
                                  <th>Nama Pasien</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Tempat Lahir</th>
                                  <th>Tanggal Lahir</th>
                                  <th>Alamat Lengkap</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                $no = 1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">

                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $row->no_rek_medik; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->id_gender; ?></td>
                                  <td><?php echo $row->tmpt_lahir; ?></td>
                                  <td><?php echo $row->tgl_lahir; ?></td>
                                  <td><?php echo $row->alamat; ?></td>
                                 
                              </tr>
                              <?php } ?>
                              </tbody>
     </table>
</body>
</html>