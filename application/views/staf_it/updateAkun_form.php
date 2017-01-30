<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
		Staf IT Al-Khairiyah
		<small>Akun</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>staf_it/home"><i class="fa fa-home"></i> Beranda</a></li>
			<li class="active">Staf IT Akun</li>
		</ol>
	</section>
	
	<section class="content">
		<!-- form start -->
		<?php echo validation_errors(); ?>
		<form method="post" action="<?php echo base_url(); ?>staf_it/profile/update_akun/<?php echo $list->id_user; ?>">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title">Update Akun <?php echo $list->nama; ?></h3>
						</div>
						<!-- /.box-header -->
						
						
						<div class="box-body">
							<?php if($this->session->flashdata('message')): ?>
							<div class="alert alert-success">
								<?php echo $this->session->flashdata('message'); ?>
							</div>
							<?php endif; ?>
							<?php if($this->session->flashdata('warning')): ?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('warning'); ?>
							</div>
							<?php endif; ?>
							<br>
							<div class="row">
								<div class="col-lg-1"></div>
								<div class="col-lg-10">
									<form role="form">
										<div class="form-group">
											<div class="col-lg-4">
												<label >Username :</label>
											</div>
											<div class="col-lg-8">
												<div class="input-group">
													<div class="input-group-addon">
														<div class="fa fa-user "></div>
													</div>
													<input type="text" name="username" class="form-control" value="<?php echo $list->username; ?>" disabled>
												</div>
											</div><br>
										</div><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label >Password Lama :</label>
											</div>
											<div class="col-lg-8">
												<div class="input-group">
													<div class="input-group-addon">
														<div class="fa fa-lock "></div>
													</div>
													<input type="password" name="password" class="form-control" placeholder="Masukkan Password Lama" required>
												</div>
											</div><br>
										</div><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label >Password Baru :</label>
											</div>
											<div class="col-lg-8">
												<div class="input-group">
													<div class="input-group-addon">
														<div class="fa fa-lock "></div>
													</div>
													<input type="password" name="password_new" class="form-control" placeholder="Masukkan Password Baru" required>
												</div>
											</div><br>
										</div><br>
										<div class="form-group">
											<div class="col-lg-4">
												<label >konfirmasi Password :</label>
											</div>
											<div class="col-lg-8">
												<div class="input-group">
													<div class="input-group-addon">
														<div class="fa fa-lock "></div>
													</div>
													<input type="password" name="password_konfirm" class="form-control" placeholder="Ulangi Password Baru" required>
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
								<div class="col-lg-8"></div>
								<div class="col-lg-4">
									<button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan </button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</form>
	</section>
</div>