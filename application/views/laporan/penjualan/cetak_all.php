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
  <title>LAPORAN PENJUALAN PRODUK/OBAT</title>
</head>
<body>
  <img src="assets/img/logo-header.png"><br><br>
<b>NOTA PENJUALAN PRODUK/OBAT <br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a>
<hr>                
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                         
                                  <th>ID Order</th>
                                  <th>ID Barang</th>
                                  <th>Nama Barang</th>
                                  <th>Harga Jual</th>
                                  <th>Jumlah</th>
                                  <th>Sub Total</th>
                               
                                
                              </tr>
                              </thead>
                              
                              <tbody>
                                <?php 
                      
                                  foreach ($data->result() as $row) {
                                ?>
                              <tr class="">

                            
                                  <td><?php echo $row->id_order; ?></td>
                                  <td><?php echo $row->kode_barang; ?></td>
                                  <td><?php echo $row->nm_barang; ?></td> 
                                  <td><?php echo $row->harga_jual; ?></td>
                                  <td><?php echo $row->qty; ?></td>
                                  <td><?php echo $row->subtotal; ?></td>
                              </tr>

                              <?php } ?>
                              </tbody>
                            
                          </table>
                          </body>
</html>