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
<!--Akses Menu Untuk Admin-->
<?php if($this->session->userdata('akses')=='1'):?>
<!---BAR-->
  <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="20px" height="20px"src="<?php echo base_url(); ?>assets/img/images/user.png">
                            <span class="username"><?php echo $this->session->userdata('ses_nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="log-arrow-up"></div>
                            <!-- <li><a href="#">Profil</a></li> -->
                            <li><a href="<?php echo base_url(); ?>backup/backupklinik">Back Up Data</a></li>
                            <!-- <li><a href="#">Pengaturan</a></li> -->
                            <li><a href="<?php echo base_url(); ?>home/logout">Keluar</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
<!---END BAR-->
<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <li>
                  <h4 ><p style="font-size: 18px; font-family: verdana;" id="jam"></p></h4>
                     <span><h4>User : Administrator</h4></span>
                   
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>home">
                          <i class="icon-home"></i>
                          <span>Home</span>
                          <span></span>
                      </a>
                  </li>

                  <!--Refrensi-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-tasks"></i>
                          <span>Referensi</span>
                      </a>
                      <!--<ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>cart">Propinsi</a></li>
                              </ul> -->
                      <ul class="sub">
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Wilayah</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>propinsi">Propinsi</a></li>
                                  <li><a  href="<?php echo base_url(); ?>kabupaten">Kabupaten/Kota</a></li>
                                  <li><a  href="<?php echo base_url(); ?>kecamatan">Kecamatan</a></li>
                                  <li><a  href="<?php echo base_url(); ?>kelurahan">Kelurahan</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Pelayanan</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>kelaspelayanan">Kelas Pelayanan</a></li>
                                  <li><a  href="<?php echo base_url(); ?>peranpelaksana">Peran Pelaksana</a></li>
                                  <li><a  href="<?php echo base_url(); ?>jenistindakan">Grup Tindakan</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Farmasi</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>kategoribarang">Kategori Barang</a></li>
                                  <li><a  href="<?php echo base_url(); ?>satuanbarang">Satuan Barang</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Data Pendaftaran</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>agama">Agama</a></li>
                                  <li><a  href="<?php echo base_url(); ?>pendidikan">Pendidikan</a></li>
                                  <li><a  href="<?php echo base_url(); ?>pekerjaan">Pekerjaan</a></li>
                                  <li><a  href="<?php echo base_url(); ?>statuskawin">Status Kawin</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Bank</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>bank">Daftar Bank</a></li>
                                  <li><a  href="<?php echo base_url(); ?>rekbank">Rekening Mutiavie</a></li>
                              </ul>
                          </li>
                      </ul>
                  </li>

                  <!--master-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-book"></i>
                          <span>Master</span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu">
                              <a  href="boxed_page.html">Pengguna</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>grup_peranpelaksana">Daftar Grup</a></li>
                                  <li><a  href="<?php echo base_url(); ?>index.php/daftaruser">Daftar Pengguna</a></li>
                                  <!--<li><a  href="<?php echo base_url(); ?>index.php/editpass">Edit Password</a></li>
                                  <li><a  href="<?php echo base_url(); ?>index.php/">Reset Password</a></li> -->
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Pelayanan</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>tindakan">Tindakan</a></li>
                                  <!--<li><a  href="<?php //echo base_url(); ?>paketlayanan">Paket Layanan</a></li> -->
                                  <li><a  href="<?php echo base_url(); ?>pelaksana">Pelaksana</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Farmasi</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>produk">Produk</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Pengadaan</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>pemasok">Pemasok</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Tarif</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>tariftindakan">Tarif Tindakan</a></li>
                                  <li><a  href="<?php echo base_url(); ?>hargabeli">Harga Beli</a></li>
                                  <li><a  href="<?php echo base_url(); ?>hargajual">Harga Jual</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>hadiah">Daftar Hadiah</a>
                          </li>
                      </ul>
                  </li>
                  
                  <!--Produk&Obat-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-book"></i>
                          <span>Inventori</span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>penerimaanobat">Penerimaan Obat</a>
                              <a  href="<?php echo base_url(); ?>penerimaanhadiah">Penerimaan Hadiah</a>
                          </li>
                      </ul>
                  </li>

                  <!--Billing-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-laptop"></i>
                          <span>Billing</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>masterpasien">Master Pasien</a>
                              <a  href="<?php echo base_url(); ?>registrasi">Registrasi Pasien</a>
                              <a  href="<?php echo base_url(); ?>pelayananpasien">Pelayanan Pasien</a>
                              <a  href="<?php echo base_url(); ?>janji">Janji</a>
                              <a  href="<?php echo base_url(); ?>biaya_pasien">Biaya Administrasi Pasien</a>
                              <a  href="<?php echo base_url(); ?>penjualan">Penjualan Produk</a>
                              <!--<a  href="<?php echo base_url(); ?>pengeluaran">Pengeluaran Klinik</a> -->
                      </ul>
                  </li>

                  <!--Laporan-->
                  <li class="sub-menu">
                       <a href="javascript:;" >
                          <i class="icon-file-alt"></i>
                          <span>Laporan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url(); ?>lap_pendaftaran_pasien">Pendaftaran Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_registrasi">Registrasi Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_pelayanan_pasien">Pelayanan Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_janji">Janji</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_pembayaran_pasien">Biaya Administrasi Pembayaran Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_penjualan">Penjualan</a></li>
                         <!-- <li><a  href="<?php echo base_url(); ?>lap_pengeluaran_klinik">Pengeluaran</a></li> -->
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Penerimaan</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>lap_penerimaan_obat">Penerimaan Obat</a></li>
                                  <li><a  href="<?php echo base_url(); ?>lap_penerimaan_hadiah">Penerimaan Hadiah</a></li>
                              </ul>
                          </li>
                          <!--<li class="sub-menu">
                              <a  href="boxed_page.html">Stok Opname</a>
                              <ul class="sub">
                                  <li><a  href="javascript:;">Stok Oname Obat</a></li>
                                   <li><a  href="javascript:;">Stok Oname Hadiah</a></li>
                              </ul>
                          </li> -->
                      </ul>
                  </li>

                  <!--Lampiran-->
                  <!--Bantuan-->
                 <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-glass"></i>
                          <span>Bantuan</span>
                      </a>
                  </li> 
                 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-signout"></i>
                          <span>Keluar</span>
                      </a>
                  </li> -->
                  <!--multi level menu end-->

              </ul>

              <!-- sidebar menu end-->
          </div>
      </aside>
<!-- END HAK AKSES ADMIN -->


<!-- HAK AKSES DOKTER -->
<?php elseif($this->session->userdata('akses')=='2'):?>
<!---BAR-->
  <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="20px" height="20px"src="<?php echo base_url(); ?>assets/img/images/user.png">
                            <span class="username"><?php echo $this->session->userdata('ses_nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="log-arrow-up"></div>
                            <!-- <li><a href="#">Profil</a></li> -->
                            <!--<li><a href="<?php echo base_url(); ?>backup/backupklinik">Back Up Data</a></li> -->
                            <!-- <li><a href="#">Pengaturan</a></li> -->
                            <li><a href="<?php echo base_url(); ?>home/logout">Keluar</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
<!---END BAR-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                    <h1 style="font-size: 18px; font-family: verdana;" id="jam"></h1>
                     <h4>User : <br>Dokter</h4>
                    <hr>  
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>home">
                          <i class="icon-home"></i>
                          <span>Home</span>
                          <span></span>
                      </a>
                  </li>
                  <!--master-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-book"></i>
                          <span>Master</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Pelayanan</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>tindakan">Tindakan</a></li>
                                 <!-- <li><a  href="<?php //echo base_url(); ?>paketlayanan">Paket Layanan</a></li> -->
                                  <li><a  href="<?php echo base_url(); ?>pelaksana">Pelaksana</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Farmasi</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>produk">Produk</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Pengadaan</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>pemasok">Pemasok</a></li>
                              </ul>
                          </li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Tarif</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>tariftindakan">Tarif Tindakan</a></li>
                                  <li><a  href="<?php echo base_url(); ?>hargabeli">Harga Beli</a></li>
                                  <li><a  href="<?php echo base_url(); ?>hargajual">Harga Jual</a></li>
                              </ul>
                          </li>
                      </ul>
                  </li>
                  <!--Billing-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-laptop"></i>
                          <span>Billing</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>registrasi">Registrasi Pasien</a>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
<!-- END HAK AKSES DOKTER -->


<!-- HAK AKSES RESEPSIONIS -->
<?php elseif($this->session->userdata('akses')=='3'):?>
<!---BAR-->
  <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="20px" height="20px"src="<?php echo base_url(); ?>assets/img/images/user.png">
                            <span class="username"><?php echo $this->session->userdata('ses_nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="log-arrow-up"></div>
                            <!-- <li><a href="#">Profil</a></li> -->
                            <!--<li><a href="<?php echo base_url(); ?>backup/backupklinik">Back Up Data</a></li> -->
                            <!-- <li><a href="#">Pengaturan</a></li> -->
                            <li><a href="<?php echo base_url(); ?>home/logout">Keluar</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
<!---END BAR-->
    <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <li>
                    <h1 style="font-size: 18px; font-family: verdana;" id="jam"></h1>
                     <h4>User : <br>Resepsionis</h4>
                    <hr>  
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>home">
                          <i class="icon-home"></i>
                          <span>Home</span>
                          <span></span>
                      </a>
                  </li>
                  <!--INVENTORI-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-book"></i>
                          <span>Inventori</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>penerimaanhadiah">Penerimaan Hadiah</a>
                             <!-- <ul class="sub">
                                  <li><a  href="<?php //echo base_url(); ?>penerimaanhadiah">Penerimaan Hadiah</a></li>
                                  <li><a  href="<?php //echo base_url(); ?>stokopnameobat">--//>Stok Opname Hadiah</a></li>
                              </ul> -->
                          </li>
                      </ul>
                  </li>
                  <!--Billing-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-laptop"></i>
                          <span>Billing</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>masterpasien">Master Pasien</a>
                              <a  href="<?php echo base_url(); ?>registrasi">Registrasi Pasien</a>
                              <a  href="<?php echo base_url(); ?>pelayananpasien">Pelayanan Pasien</a>
                              <a  href="<?php echo base_url(); ?>janji">Janji</a>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
<!-- END HAK AKSES RESEPSIONIS -->

<!-- HAK AKSES KASIR -->
<?php elseif($this->session->userdata('akses')=='4'):?>
<!---BAR-->
  <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="20px" height="20px"src="<?php echo base_url(); ?>assets/img/images/user.png">
                            <span class="username"><?php echo $this->session->userdata('ses_nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="log-arrow-up"></div>
                            <!-- <li><a href="#">Profil</a></li> -->
                            <!--<li><a href="<?php echo base_url(); ?>backup/backupklinik">Back Up Data</a></li> -->
                            <!-- <li><a href="#">Pengaturan</a></li> -->
                            <li><a href="<?php echo base_url(); ?>home/logout">Keluar</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
<!---END BAR-->
<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <li>
                  <h1 style="font-size: 18px; font-family: verdana;" id="jam"></h1>
                     <h4>User : <br>Kasir</h4>
                    <hr>  
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>home">
                          <i class="icon-home"></i>
                          <span>Home</span>
                          <span></span>
                      </a>
                  </li>
                  <!--master-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-book"></i>
                          <span>Master</span>
                      </a>
                      <ul class="sub">

                          <!-- <li class="sub-menu">
                              <a  href="boxed_page.html">Pengadaan</a>
                              <ul class="sub">
                                  <li><a  href="<?php //echo base_url(); ?>pemasok">Pemasok</a></li>
                              </ul>
                          </li> -->

                          <li class="sub-menu">
                              <a  href="boxed_page.html">Tarif</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>tariftindakan">Tarif Tindakan</a></li>
                                  <li><a  href="<?php echo base_url(); ?>hargabeli">Harga Beli</a></li>
                                  <li><a  href="<?php echo base_url(); ?>hargajual">Harga Jual</a></li>
                              </ul>
                          </li>
                          <!--<li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>hadiah">Daftar Hadiah</a>
                          </li> -->
                      </ul>
                  </li>
                  <!--Produk&Obat-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-book"></i>
                          <span>Inventori</span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>penerimaanobat">Penerimaan Obat</a>
                             
                          </li>
                      </ul>
                  </li>
                  <!--Billing-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="icon-laptop"></i>
                          <span>Billing</span>
                      </a>
                      <ul class="sub">
                          <li class="sub-menu">
                              <a  href="<?php echo base_url(); ?>biaya_pasien">Biaya Administrasi Pasien</a>
                              <a  href="<?php echo base_url(); ?>penjualan">Penjualan Produk</a>
                              <!--<a  href="<?php echo base_url(); ?>pengeluaran">Pengeluaran Klinik</a> -->
                      </ul>
                  </li>
              </ul>

              <!-- sidebar menu end-->
          </div>
      </aside>
<!-- END HAK AKSES KASIR -->

<!-- HAK AKSES KETUA KLINIK -->
<?php elseif($this->session->userdata('akses')=='5'):?>
  <!---BAR-->
  <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="20px" height="20px"src="<?php echo base_url(); ?>assets/img/images/user.png">
                            <span class="username"><?php echo $this->session->userdata('ses_nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="log-arrow-up"></div>
                            <!-- <li><a href="#">Profil</a></li> -->
                            <li><a href="<?php echo base_url(); ?>backup/backupklinik">Back Up Data</a></li>
                            <!-- <li><a href="#">Pengaturan</a></li> -->
                            <li><a href="<?php echo base_url(); ?>home/logout">Keluar</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
<!---END BAR-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <li>
                     <h4>User : <br>Ketua Klinik</h4>
                    <hr>  
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>home">
                          <i class="icon-home"></i>
                          <span>Home</span>
                          <span></span>
                      </a>
                  </li>
                  <!--Laporan-->
                  <li class="sub-menu">
                       <a href="javascript:;" >
                          <i class="icon-file-alt"></i>
                          <span>Laporan</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url(); ?>lap_pendaftaran_pasien">Pendaftaran Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_registrasi">Registrasi Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_pelayanan_pasien">Pelayanan Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_janji">Janji</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_pembayaran_pasien">Biaya Administrasi Pembayaran Pasien</a></li>
                          <li><a  href="<?php echo base_url(); ?>lap_penjualan">Penjualan</a></li>
                         <!-- <li><a  href="<?php echo base_url(); ?>lap_pengeluaran_klinik">Pengeluaran</a></li> -->
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Penerimaan</a>
                              <ul class="sub">
                                  <li><a  href="<?php echo base_url(); ?>lap_penerimaan_obat">Penerimaan Obat</a></li>
                                  <li><a  href="<?php echo base_url(); ?>lap_penerimaan_hadiah">Penerimaan Hadiah</a></li>
                              </ul>
                          </li>
                          <!--<li class="sub-menu">
                              <a  href="boxed_page.html">Stok Opname</a>
                              <ul class="sub">
                                  <li><a  href="javascript:;">Stok Oname Obat</a></li>
                                   <li><a  href="javascript:;">Stok Oname Hadiah</a></li>
                              </ul>
                          </li> -->
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

 <!-- END HAK AKSES KETUA KLINIK -->


      <?php else:?>
  <!---BAR-->
  <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="20px" height="20px"src="<?php echo base_url(); ?>assets/img/images/user.png">
                            <span class="username"><?php echo $this->session->userdata('ses_nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="log-arrow-up"></div>
                            <!-- <li><a href="#">Profil</a></li> -->
                            <!-- <li><a href="#">Pengaturan</a></li> -->
                            <li><a href="<?php echo base_url(); ?>home/logout">Keluar</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
<!---END BAR-->
    <div class="container">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404</h1>
          <h2>page not found</h2>
          <p class="page-404">Silahkan Logout dan Login Kembali<a href="<?php echo base_urL(); ?>login">Kembali ke halaman login</a></p>
      </section><br><br>

    </div>
           <?php endif;?>