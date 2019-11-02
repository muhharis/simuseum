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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Penjualan Produk</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo-header.png">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--<link href="css/navbar-fixed-top.css" rel="stylesheet">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.css" />
      <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

              <!--logo start-->
              <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a>
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="<?php echo site_url('Shopping_cart/')?>">Data Produk</a></li>
                      <li ><a href="<?php echo site_url('penjualan/keranjang_belanja/')?>">Keranjang Belanja (<?php echo count($cart); ?>)</a></li>
                      
                  </ul>

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
          </div>

      </header>
      <!--header end-->
      <!--sidebar start-->

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo base_url(); ?>home"><i class="icon-home"></i> Home</a></li>
                          <li><a>Billing</a></li>
                          <li class="active">Penjualan</li>
                          <li><a>...</a></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
               <!-- page start-->
              <section class="panel">
                  <header class="panel-heading"><a href="<?php echo base_url(); ?>home" class="icon-mail-reply"></a>
                      Data Penjualan Produk
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table ">
                   
                          <div class="space15"></div>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Produk</th>
                                  <th>Harga</th>
                                  <th>Stok</th>
                                  <th>Aksi</th>
                           
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $no=1;

                              foreach($product as $p){ 
                              ?>
                              <tr class="">
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $p->nm_barang; ?></td>
                                  <td>Rp. <?php echo number_format($p->harga_jual,0,",","."); ?></td>
                                 <td><?php echo $p->jumlah; ?></td>
                                  <td><form method="post" action="<?php echo site_url('Penjualan/beli'); ?>">
                                       <input type="hidden" name="harga_jual_id" value="<?php echo $p->harga_jual_id; ?>" />
                                       <input type="hidden" name="nm_barang" value="<?php echo $p->nm_barang; ?>" />
                                       <input type="hidden" name="harga_jual" value="<?php echo $p->harga_jual; ?>" />
                                       <input type="hidden" name="jumlah" value="<?php echo $p->jumlah; ?>" />
                                      <!-- <input type="hidden" name="stok" value="<?php echo $p->stok; ?>" /> -->
                                       <input type="hidden" name="qty" value="1" />
                                      <div class="card-footer">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> Beli</button>
                                        
                                      </div>
                                    </form>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>

                          </table>
                      </div>
                  </div>
              </section>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 &copy; Sistem Informasi Manajemen Administrasi Klinik Mutiavie
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/hover-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/common-scripts.js"></script>

      <!--script for this page only-->
      <script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
       <script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>

  </body>
</html>
