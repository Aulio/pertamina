<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Staf IT Al-Khairiyah
    <small>Profil</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>staf_it/home"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active">Staf IT Profil</li>
    </ol>
  </section>
  
  <section class="content">
    <!-- form start -->
    <?php echo validation_errors(); ?>
    <form method="post" action="<?php echo base_url(); ?>staf_it/profile/update/<?php echo $list->id_user; ?>">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Update Profil</h3>
            </div>
            <!-- /.box-header -->
            
            
            <div class="box-body">
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
                <div class="fa fa-info"></div>&nbsp;<?php echo $this->session->flashdata('message'); ?>
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
              <br>
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                  <form role="form">
                    <div class="form-group">
                      <div class="col-lg-4">
                        <p>NIP :</p>
                      </div>
                      <div class="col-lg-8">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <div class="fa fa-tag "></div>
                          </div>
                          <input type="number" name="nip" class="form-control" value="<?php echo $list->nip; ?>" required>
                        </div>
                      </div><br>
                    </div><br>
                    <div class="form-group">
                      <div class="col-lg-4">
                        <p>Nama :</p>
                      </div>
                      <div class="col-lg-8">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <div class="fa fa-user "></div>
                          </div>
                          <input type="text" name="nama" class="form-control" value="<?php echo $list->nama; ?>" required>
                        </div>
                      </div><br>
                    </div><br>
                    
                    <div class="form-group">
                      <div class="col-lg-4">
                        <p>Alamat :</p>
                      </div>
                      <div class="col-lg-8">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <div class="fa fa-road "></div>
                          </div>
                          <input type="text" name="alamat" class="form-control" value="<?php echo $list->alamat; ?>" required>
                        </div>
                      </div><br>
                    </div><br>
                    <div class="form-group">
                      <div class="col-lg-4">
                        <p>Nomor Telepon :</p>
                      </div>
                      <div class="col-lg-8">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <div class="fa fa-phone "></div>
                          </div>
                          <input type="number" name="telepon" class="form-control" value="<?php echo $list->telepon; ?>"required>
                        </div>
                      </div><br>
                    </div><br>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                  <a href="<?php echo base_url() ?>staf_it/profile/update_foto/<?php echo $list->id_user ?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit"><div class="fa fa-file-image-o"></div> Upload Foto Profil</a>&nbsp;
                  <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan </button>
                  
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </form>
    
    
    <div class="modal fade" id="edit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-controls-modal="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          
        </div>
      </div>
    </div>
  </section>
</div>