<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universitas Pertamina | Login Staf IT</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/bootstrap/css/font-awesome.css">
    <!-- Ionicons -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/dist/css/AdminLTE.min.css">
    <!-- iCheck
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/it/plugins/iCheck/square/blue.css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <?php echo $script_captcha;?> -->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-box-body">
        <p class="login-box-msg" >Silahkan Masukkan Akun Anda</p>
        <?php if($this->session->flashdata('message')): ?>
        <div class="alert alert-danger">
          <?php echo $this->session->flashdata('message'); ?>
        </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('warning')): ?>
        <div class="alert alert-warning">
          <?php echo $this->session->flashdata('warning'); ?>
        </div>
        <?php endif; ?>
        <form role="form" action="<?php echo base_url('staf_it/login'); ?>" method="post">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
                <div class="fa fa-user "></div>
              </div>
              <?php if ($this->session->flashdata('username')):
              $username = $this->session->flashdata('username');
              else :
              $username="";
              endif?>
              <input class="form-control" placeholder="Username"  name="username" value="<?php echo $username; ?>" type="text" autofocus required>
            </div>
          </div>
          <div class="form-group">
            
            <div class="input-group">
              <div class="input-group-addon">
                <div class="fa fa-lock "></div>
              </div>
              <input class="form-control" name="password" placeholder="Password" type="password" required>
            </div>
          </div>
          <div class="row">
            
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button><br>
          <p>Belum Memiliki akun? silahkan <a href="<?php echo base_url(); ?>staf_it/register/">Daftar Disini</a> </p>
        </form>
        </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>assets/it/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>assets/it/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck
        <script src="<?php echo base_url(); ?>assets/it/plugins/iCheck/icheck.min.js" type="text/javascript"></script> 
        <script>
        $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
        });
        });
        </script>-->
      </body>
    </html>