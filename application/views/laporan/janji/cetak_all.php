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
  <title>LAPORAN JANJI PASIEN</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>LAPORAN JANJI PASIEN <br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a>
<hr>
<table >
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kode Janji</th>
                                  <th>Tanggal Janji</th>
                                  <th>Jam Janji</th>
                                  <th>Dokter</th>
                                  <th>Nama Pasien</th>
                                  <th>Telp Pasien</th>
                                  <th>Jenis Kunjungan</th>
                                  <th>Keterangan</th>
                                  <th>Status</th>
                      
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                                $no=1;
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">

                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $row->janji_id; ?></td>
                                  <td><?php echo $row->tanggal_janji; ?></td>
                                  <td><?php echo $row->jam; ?></td>
                                  <td><?php echo $row->nama_pelaksana;  ?> - <?php echo $row->peran_pelaksana; ?></td>
                                  <td><?php echo $row->nm_pasien; ?></td>
                                  <td><?php echo $row->no_telp; ?></td>
                                  <td><?php echo $row->jenis_kunjungan; ?></td>
                                  <td><?php echo $row->keterangan; ?></td>
                                  <td><?php echo $row->is_aktif; ?> </td>

                              </tr>
                              <?php } ?>
                              </tbody>
                            
                          </table>
</body>
</html>
