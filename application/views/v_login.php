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

    <title>Login</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo-header.png">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="<?php echo base_url().'index.php/login/auth'?>" method="post" onsubmit="return cekform();">
        <h2 class="form-signin-heading">Halaman Login<br>Mitra Klinik Mutiavie</h2>
        
        <div class="login-wrap">
             <?php 
                                                            $info = $this->session->flashdata('info');
                                                            if(!empty($info)) 
                                                            {
                                                                echo $info;
                                                            }
                                                            ?>
           <header class="panel-heading">
                             Masukkan Username dan Password
                          </header>
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus required/>

        
       <!-- <input type=button id="show" value="Show Password" onclick="ShowPassword()"> -->
    <!--<input type=button style="display:none" id="hide" value="Hide Password" onclick="HidePassword()"> -->

    
        <!--<a href="#" id="tampilkan-password">Show Pwd</a> -->
           <!--<script>
       $(document).ready(function(){

        $("#tampilkan-password").click(function(){


        //mendapatkan atribut type
        let tipeSaatIni = $("#password").attr('type');

        //untuk menyimpan type yang baru
        let tipeBaru = '';

        if(tipeSaatIni == 'text'){
            tipeBaru = 'password';
        }
        else if(tipeSaatIni == 'password'){
            tipeBaru = 'text';
        }
        //setting input dengan TIPE baru
        $("#password").attr("type", tipeBaru);
       });
        });
   </script> --><a href="#" id="show" value="Show Password" onclick="ShowPassword()">Tampilkan Password</a>
        <a href="#" style="display:none" id="hide" value="Hide Password" onclick="HidePassword()" onclick="ShowPassword()">Tutup Password</a>
        <input class="form-control" placeholder="Password" type="password" name="password" id="password" width="10%" required/> 
                                               
                                              
        <button class="btn btn-lg btn-login btn-block" type="submit">Login</button>

        </div>
      </form>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script>
                function ShowPassword()
        {
            if(document.getElementById("password").value!="")
            {
                document.getElementById("password").type="text";
                document.getElementById("show").style.display="none";
                document.getElementById("hide").style.display="block";
            }
        }

        function HidePassword()
        {
            if(document.getElementById("password").type == "text")
            {
                document.getElementById("password").type="password"
                document.getElementById("show").style.display="block";
                document.getElementById("hide").style.display="none";
            }
        }
            </script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/gritter/js/jquery.gritter.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="<?php echo base_url(); ?>assets/js/gritter.js" type="text/javascript"></script>
  </body>
</html>
