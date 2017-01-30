<!DOCTYPE html>
<html lang="en" class="body-full-height">
  <head>
    <!-- META SECTION -->
    <title>Universitas Pertamina | Registration Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- END META SECTION -->
    
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>assets/admin/css/theme-default.css"/>
    <!-- EOF CSS INCLUDE -->
  </head>
  <body>
    
    <div class="registration-container">
      <div class="registration-box animated fadeInDown">
        <div class="registration-logo"></div>
        <div class="registration-body">
          <div class="registration-title"><strong>Form Pendaftaran</strong> Staf IT Universitas Pertamina</div>
          <div class="registration-subtitle">Silahkan isi form dibawah ini sesuai dengan data anda </div>
          <form method="post" action="<?php echo base_url(); ?>staf_it/register" class="form-horizontal">
            <?php if($this->session->flashdata('nip')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('nip'); ?>
            </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('telepon_konfirm')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('telepon_konfirm'); ?>
            </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('telepon')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('telepon'); ?>
            </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-check"></div>&nbsp;<?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('warning')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('warning'); ?>
            </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('username')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('username'); ?>
            </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('username_konfirm')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('username_konfirm'); ?>
            </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('password')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('password'); ?>
            </div>
            <?php endif; ?>
            
            <div class="form-group">
              <?php if ($this->session->flashdata('NI')):
              $NI = $this->session->flashdata('NI');
              else :
              $NI="";
              endif?>
              <input type="number" name="nip" value="<?php echo $NI; ?>" placeholder="NIP" class="form-control" autofocus required>
            </div>
            <div class="form-group">
              
              <?php if ($this->session->flashdata('NAM')):
              $NAM = $this->session->flashdata('NAM');
              else :
              $NAM="";
              endif?>
              <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $NAM; ?>" required>
              
            </div>
            <div class="form-group">
              
              <?php if ($this->session->flashdata('JABATA')):
              $JABATA = $this->session->flashdata('JABATA');
              else :
              $JABATA="";
              endif?>
              <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $JABATA; ?>" required>
            </div>
            <div class="form-group">
              <?php if ($this->session->flashdata('TELEPO')):
              $TELEPO = $this->session->flashdata('TELEPO');
              else :
              $TELEPO="";
              endif?>
              <input type="number" name="telepon" class="form-control" placeholder="Nomor Telepon" value="<?php echo $TELEPO; ?>" required>
            </div>
            <div class="form-group">
              <?php if ($this->session->flashdata('ALAMA')):
              $ALAMA = $this->session->flashdata('ALAMA');
              else :
              $ALAMA="";
              endif?>
              <input type="text" name="alamat" class="form-control" placeholder="Alamat Rumah" value="<?php echo $ALAMA; ?>" required>
            </div>
            <div class="form-group">
              <?php if ($this->session->flashdata('USERNAM')):
              $USERNAM = $this->session->flashdata('USERNAM');
              else :
              $USERNAM="";
              endif?>
              <input type="email" name="username" class="form-control" placeholder="Username" value="<?php echo $USERNAM; ?>" required>
              <small><p><span style="color: #FA2600">*</span><span style="color: #fff"> Username diisi dengan </span><span style="color: #FA2600">email</span><span style="color: #fff">. Username tidak dapat diganti, pastikan </span><span style="color: #FA2600">email</span><span style="color: #fff"> anda benar !</span></small>
            </p>
            
            
          </div>
          <div class="form-group">
            <?php if ($this->session->flashdata('PASSWOR')):
            $PASSWOR = $this->session->flashdata('PASSWOR');
            else :
            $PASSWOR="";
            endif?>
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $PASSWOR; ?>" required>
            
          </div>
          
          <div class="row">
            
          </div>
          <br>
          <button type="submit" class="btn btn-danger btn-block btn-flat">Daftar</button>
        </form>
      </div>
      <div class="registration-footer">
        <div class="pull-left">
          2017 &copy; Universitas Pertamina.
        </div>
        <div class="pull-right">
          Sudah Memiliki akun? <a href="<?php echo base_url(); ?>staf_it/login"><span style="color: #F7B91A">login disini</span></a>.
        </div>
        
      </div>
    </div>
    
  </div>
  
</body>
</html>