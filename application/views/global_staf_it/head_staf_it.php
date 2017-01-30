<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Staf IT Universitas Pertamina</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/bootstrap/css/font-awesome.css">
    <!-- Ionicons 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/dist/css/skins/_all-skins.min.css">
    <!-- iCheck 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/plugins/iCheck/flat/blue.css">-->
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/plugins/morris/morris.css"> -->
    <!-- jvectormap
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
    <!-- Date Picker
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/plugins/datepicker/datepicker3.css"> -->
    <!-- Daterange picker
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/plugins/daterangepicker/daterangepicker.css"> -->
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini" onunload="">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('staf_it/home');?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>IT</b>UP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>IT</b>Universitas Pertamina</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user fa-lg"></i>
                  <span class="hidden-xs">
                    <?php echo $this->session->userdata('SESS_IT_NAMA_USER');?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                   <li class="user-header">
                <img src="<?php echo base_url() ?>uploads/profil/<?php echo $this->session->userdata('SESS_IT_PICTURE_USER');?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('SESS_IT_NAMA_USER');?>
                 
                </p>
              </li>
              <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   <br>
                      <div class="col-sm-4">
                        <div>  
                          <a href="<?php echo base_url() ?>staf_it/profile/update/<?php echo $this->session->userdata('SESS_IT_ID_USER');?>" class="btn btn-warning btn-sm"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div>
                          <a href="<?php echo base_url() ?>staf_it/profile/update_akun/<?php echo $this->session->userdata('SESS_IT_ID_USER');?>" class="btn btn-default btn-sm"><i class="fa fa-gear fa-fw"></i> Akun</a>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div >
                          <a href="<?php echo base_url() ?>staf_it/home/logout/<?php echo $this->session->userdata('SESS_IT_ID_USER');?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#logout"><i class="fa fa-power-off fa-fw"></i> Keluar</a>
                        </div>
                      </div>
                    
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            <li class="treeview">
              <a href="<?php echo base_url('staf_it/home');?>">
                <i class="fa fa-home"></i> <span>Beranda</span>
                <span class="pull-right-container">
                </span>
              </a>
            </li>
            
            <li class="treeview">
          
          
            <a href="<?php echo base_url('staf_it/mahasiswa');?>"><i class="fa fa-users"></i> <span> Mahasiswa</span>
                <span class="pull-right-container">
                 
                </span></a>

            
          
        </li>

            
            
            <li>
              <a href="<?php echo base_url('staf_it/matakuliah');?>">
                <i class="fa fa-folder-open"></i> <span>Matakuliah</span>
                <span class="pull-right-container">
                </span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('staf_it/jurusan');?>">
                <i class="fa fa-road"></i> <span>Jurusan</span>
                <span class="pull-right-container">
                </span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <div class="modal fade" id="logout" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-controls-modal="myModal">
        <div class="modal-dialog">
          <div class="modal-content"></div>
        </div>
      </div>
      