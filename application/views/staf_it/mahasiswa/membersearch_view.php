<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Mahasiswa
    <small>Mahasiswa Universitas Pertamina</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>staf_it/home"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="active"><i class="fa fa-users"></i> Mahasiswa</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header ">
            <div class="col-xs-8">
              <h3 class="box-title">Daftar Mahasiswa</h3>&nbsp;&nbsp;
              <a href="<?php echo base_url(); ?>staf_it/mahasiswa/add"class="btn btn-sm btn-success"><div class="fa fa-user-plus"></div> Tambah mahasiswa</a>&nbsp;
              <a href="<?php echo base_url(); ?>staf_it/mahasiswa" class="btn btn-sm btn-info"><div class="fa fa-table"> Lihat semua mahasiswa</div></a>&nbsp;
              <!-- Split button -->
              
            </div>
            <div class="col-xs-3">
              <div class="box-tools">
                <div class="input-group">
                  <?php echo validation_errors(); ?>
                  <form method="post" action="<?php echo base_url(); ?>staf_it/mahasiswa">
                    
                    <div class="input-group-btn">
                      <input type= "text" name= "key" class="form-control" placeholder="Masukkan matakuliah">
                      <button type="submit" class="btn btn-info" data-lilili="tooltip" data-original-title="Cari Data"><div class="fa fa-search"></div></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xs-1"></div>
          </div><br>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Semester</th>
                  <th>Jurusan</th>
                  <th>Matakuliah</th>
                  <th>SKS</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <div class="col-md-12">
                  <?php if (count($list)==0): ?>
                  
                  <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa fa-info-circle"></div> Tidak Ada Data<br>
                  </div>
                  <?php else: ?>
                  <?php if($this->session->flashdata('message')):?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="fa  fa-check"></div> <?php echo $this->session->flashdata('message'); ?><br>
                  </div>
                  <?php endif;?>
                </div>
                <?php $no = 0; foreach ($list as $row): $no++; ?>
                
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->semester; ?></td>
                  <td><?php echo $row->nama_jurusan; ?></td>
                  <td><?php echo $row->nama_matakuliah; ?></td>
                  <td><?php echo $row->sks; ?></td>
                <td>
                  <!-- Akan melakukan update atau delete sesuai dengan id yang diberikan ke controller -->
                  
                  <center>
                  <a href="#" data-toggle="modal" data-target="#hapus" data-id="<?php echo $row->id_mahasiswa ?>" data-jenis="mahasiswa" class="btn btn-sm btn-danger btn-circle" data-lilili="tooltip" data-original-title="Hapus Data"><div class="fa fa-trash"></div></a>
                  </center>
                </td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        
        <div class="modal fade" id="hapus" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-controls-modal="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header modal-type-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><div class="fa fa-times"></div> Tidak</button>
                <a href="#" id="delete" class="btn btn-sm btn-danger"><div class="fa fa-check"></div> Ya</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo isset($halaman)?$halaman:""; ?>
          </ul>
        </div>
        
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->
</div>