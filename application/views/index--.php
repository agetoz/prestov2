<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Presensi Online MAN 1 Kota Malang</title>

  <!-- Favicons -->
  <link href="<?php echo base_url()?>awalan/img/favicon.png" rel="icon">
  <link href="<?php echo base_url()?>awalan/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>awalan/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url()?>awalan/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()?>awalan/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>awalan/css/style-responsive.css" rel="stylesheet">
  <script src="<?php echo base_url()?>absen/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url()?>absen/js/jquery-ui-1.10.3.js"></script>
</head>

<body>
  <div id="infodlg" style="display:none"></div>
    <!--header start-->
    <header class="header black-bg">
      <!--logo start-->
      <a href="<?php echo base_url() ?>index.php" class="logo"><b>PRESEN<span>SI</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <!--<li><a class="logout" href="<?php echo base_url() ?>index.php/login">Login</a></li>-->
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
      <!--div id="sidebar" class="nav-collapse "-->
        <!-- sidebar menu start-->
        <!--ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="<?php echo base_url()?>/awalan/img/logo-man1-new.png" class="img-circle" width="80"></p>
          <h5 class="centered">Online</h5>
          <li class="mt">
            <a class="active" href="<?php echo base_url() ?>index.php/home">
              <i class="fa fa-dashboard"></i>
              <span>Presensi Masuk</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="<?php echo base_url() ?>index.php/home/pulang">
              <i class="fa fa-desktop"></i>
              <span>Presensi Pulang</span>
              </a>
          </li>
        </ul>
      </div>-->
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row" style="margin-left: 1px;">
          <div class="col-lg-9 main-chart">
              <h3><?php echo $judul; ?></h3>
            <div class="" id="isiContent">          
              <?php $this->load->view($view); ?>
            </div>
        </div>
      </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Pusiskom Ranger</strong>. All Rights Reserved
        </p>
      </div>
    </footer>
    <!--footer end-->
</body>

</html>
