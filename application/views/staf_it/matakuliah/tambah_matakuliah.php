<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Tambah Matakuliah
    <small>Matakuliah</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>staf_it/home"><i class="fa fa-home"></i> Beranda</a></li>
      <li><a href="<?php echo base_url(); ?>staf_it/matakuliah"><i class="fa fa-users"></i> Matakuliah</a></li>
      
      <li class="active"><i class="fa fa-user-plus"></i> Tambah Matakuliah</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <form method="post" action="<?php echo base_url(); ?>staf_it/matakuliah/add">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Matakuliah</h3>
            </div>
            
            <div class="box-body">
              
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
             
              <br>
              
              <div class="form-group">
                <div class="col-lg-4">
                  <p>Matakuliah :</p>
                </div>
                <div class="col-lg-8">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <div class="fa fa-user"></div>
                    </div>
                   
                    <input type="text" name="nama_matakuliah" class="form-control" required>
                  </div>
                </div><br>
              </div><br>
              <div class="form-group">
                <div class="col-lg-4">
                  <p>SKS :</p>
                </div>
                <div class="col-lg-8">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <div class="fa fa-list-alt"></div>
                    </div>
                   
                    <input type="text" name="sks" class="form-control"  required>
                  </div>
                </div><br>
              </div><br>
             
            
            
            
            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="<?php echo base_url() ?>staf_it/matakuliah" class="btn btn-sm btn-info"><div class="fa fa-arrow-left"></div> Daftar Matakuliah</a>&nbsp;&nbsp;
            <button type="submit" class="btn btn-sm btn-success"><div class="fa fa-save"> Simpan</div></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
</div>