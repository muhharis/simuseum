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
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo-header.png">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <!--link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/assets/bootstrap-datepicker/css/datepicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/assets/bootstrap-colorpicker/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />-->
   <!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url(); ?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.css" />
    <link href="<?php echo base_url(); ?>assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <!-- + -->
    <link href="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.css" rel="stylesheet">
    
    <script type="text/javascript">
     window.onload = function() { jam(); }
     function jam() {
      var e = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());
      e.innerHTML = h +':'+ m +':'+ s;
      setTimeout('jam()', 1000);
     }
     function set(e) {
      e = e < 10 ? '0'+ e : e;
      return e;
     }
    </script>
    <!-- + -->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <!--<header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div> -->
            <!--logo start-->
           <!-- <a class="logo" >Mitra Klinik<span> MUTIA VIE</span></a> -->
            <!--logo end-->
            <!--<div class="nav notify-row" id="top_menu"> -->
                <!--  notification start -->
                
                <!--  notification end -->
            <!--</div>
            <div class="top-nav ">-->
                <!--search & user info start-->
               <!-- <ul class="nav pull-right top-menu">-->
                
                    <!-- user login dropdown start-->
                    <!--<li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="20px" height="20px"src="<?php echo base_url(); ?>assets/img/images/user.png">
                            <span class="username"><?php echo $this->session->userdata('ses_nama');?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="log-arrow-up"></div> -->
                            <!-- <li><a href="#">Profil</a></li> -->
                            <!--<li><a href="<?php echo base_url(); ?>backup/backupklinik">Back Up Data</a></li>-->
                            <!-- <li><a href="#">Pengaturan</a></li> -->
                            <!--<li><a href="<?php echo base_url(); ?>home/logout">Keluar</a></li>
                        </ul>
                    </li>-->
                    <!-- user login dropdown end -->
                <!--</ul>-->
                <!--search & user info end-->
            <!--</div> -->
        <!-- </header> -->
      <!--header end-->
      <!--sidebar start-->
      <?php $this->load->view('menu'); ?>
      
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="<?php echo base_url(); ?>home"><?php echo $m1; ?></a></li>
                          <li class="active"><?php echo $m2; ?></li>
                          <li class="active"><?php echo $m3; ?></li>
                          <li class="active"><?php echo $m4; ?></li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!--state overview start-->
              <?php $this->load->view($fill); ?>
              <!--state overview end-->


          </section>
      </section>
      <!--main content end-->
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
    <!--<script src="<?php //echo base_url(); ?>assets/js/jquery.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/datepicker/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <!--this page plugins-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/fuelux/js/spinner.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>
    <!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>-->
    <!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-daterangepicker/moment.min.js"></script>
    <!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/assets/bootstrap-daterangepicker/daterangepicker.js"></script>-->
    <!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>-->
    <!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.js" ></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo base_url(); ?>assets/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js" ></script>
    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/common-scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/editable-penerimaanobat.js"></script>
    <!--script for this page-->
    <script src="<?php echo base_url(); ?>assets/s/sparkline-chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/count.js"></script>





    
    <!------------------- +++++ ------------------->
      <script>

      //knob
      $(".knob").knob();

  </script>

    <script type="text/javascript">
    $(function()
    {
      $('#tgl_awal').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'}),
      $('#tgl_akhir').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
    });
    </script>
    <script>
      //owl carousel
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			        autoPlay:true
          });              
              navigation : true,

      });
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });
    </script>
    <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
    </script>

    <script src="<?php echo base_url(); ?>assets/js/form-validation-script.js"></script>

<!-- TAMPIL KODE UNTUK HALAMAN JANJI -->
<script type="text/javascript">
    $(document).ready(function(){
       $('#no_registrasi').on('input',function(){
                
                var no_registrasi=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('janji/get_data_janji')?>",
                    dataType : "JSON",
                    data : {no_registrasi: no_registrasi},
                    cache:false,
                    success: function(data){
                        $.each(data,function(no_registrasi, no_rek_medik){
                            $('[name="no_rek_medik"]').val(data.no_rek_medik);
                            
                        });
                        
                    }
                });
                return false;
           });

    });
</script>
<!-- END KODE UNTUK HALAMAN JANJI -->

<!-- TAMPIL KODE UNTUK HALAMAN REGISTRASI -->
  <script type="text/javascript">
    $(document).ready(function(){
       $('#no_rek_medik').on('input',function(){
                
                var no_rek_medik=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('registrasi/get_data_registrasi')?>",
                    dataType : "JSON",
                    data : {no_rek_medik: no_rek_medik},
                    cache:false,
                    success: function(data){
                        $.each(data,function(no_rek_medik, nm_pasien, alamat){
                            $('[name="nm_pasien"]').val(data.nm_pasien);
                            $('[name="alamat"]').val(data.alamat);
                            
                        });
                        
                    }
                });
                return false;
           });

    });
  </script>
<!-- END KODE UNTUK HALAMAN REGISTRASI -->

<!-- TAMPIL KODE UNTUK HALAMAN PENERIMAAN OBAT-->
 <!-- <script type="text/javascript">
    $(document).ready(function(){
       $('#nm_barang').on('input',function(){
                
                var nm_barang=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php //echo base_url('penerimaanobat/get_data_barang')?>",
                    dataType : "JSON",
                    data : {nm_barang: nm_barang},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode_barang, nm_barang){
                            $('[name="kode_barang"]').val(data.kode_barang);
                        });
                        
                    }
                });
                return false;
           });

    });
  </script> -->
<!-- END KODE UNTUK HALAMAN REGISTRASI -->

<!-- WAKTU -->
     <script>
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('time').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){startTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>
<!-- END WAKTU -->

<!-- INPUT HANYA ANGKA-->
  <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>
<!-- END INPUT HANYA ANGKA-->


<!-- INPUT TAMBAH TABEL-->
<script>

$(document).ready(function(){

  for(B=1; B<=1; B++){
    BarisBaru();
  }

  $('#BarisBaru').click(function(){
    BarisBaru();
  });

  $("#TabelTransaksi tbody").find('input[type=text],textarea,select').filter(':visible:first').focus();
});

function BarisBaru()
{
  var Nomor = $('#TabelTransaksi tbody tr').length + 1;
  var Baris = "<tr>";
  
    Baris += "<td>";
      Baris += "<input type='text' class='form-control' name='id_barang' id='id_barang' required>";
     Baris += "<div id='hasil_pencarian'></div>";
    Baris += "</td>";
    Baris += "<td>";
      Baris += "<input type='text' class='form-control' name='jumlah' id='jumlah' required>";
     Baris += "<div id='jumlah'></div>";
    Baris += "</td>";
  $('#TabelTransaksi tbody').append(Baris);
  HitungTotalBayar();
}
</script>



 <!--<script type="text/javascript" src="<?php //echo base_url(); ?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> -->
<!------------------- +E+N+D+ ------------------->
  </body>
</html>
