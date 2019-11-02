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
<b>NOTA BELANJA PRODUK/OBAT <br>KLINIK KECANTIKAN MUTIAVIE JEPARA</b><br><br>
Tanggal : <?php echo date('d / M / y'); ?> || <a align="right"><b><u>Penanggung Jawab : <?php echo $this->session->userdata('ses_nama');?></u></b></a>
<hr>
                          <table  class="table table-striped table-hover table-bordered">
                            <thead >
                              <tr>
                                <!--<th>Gambar</th> -->
                                <th>No</th>
                            
                                
                                <th>Nama Produk</th>
                          
                                <th>Harga Produk</th>
                                <th width="150">Jumlah</th>
                                <th width="155">Subtotal</th>
                          
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $no=1;
                                $total = 0;
                                if(count($cart) > 0){
                                foreach($cart as $item){
                                  $total += $item['subtotal'];
                              ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                
                                <!--<td><img src="<?php //echo base_url('assets/images/'.$item['gambar']) ?>" width="100"></td> -->
                                
                                <td align="center"><?php echo $item['name']; ?></td>
                                <!--<td><?php echo $item['stok']; ?></td> -->
                                <td align="center">Rp <?php echo number_format($item['price'],0,',','.'); ?></td>
                                <td align="center"><?php echo $item['qty']; ?> Produk</td>
                           
                                <td align="center">Rp <?php echo number_format($item['subtotal'],0,',','.'); ?></td>

                              </tr>
                            <?php }}else{echo'<tr><td colspan="6" align="center"><h3>Keranjang Belanja Kosong.</h3></td></tr>'; } ?>
                            </tbody><br>
                          </table><hr>
                    
                      <h4>Total Pembayaran : Rp <?php echo number_format($total,0,',','.'); ?></h4>
</body>
</html>
