
<div class="modal-header modal-type-primary">
	<button class="close" area-hidden="true" data-dismiss="modal" type="button">x</button>
	<h4 class="modal-title">Konfirmasi</h4>
</div>
<div class="modal-body">
	<p>Apakah anda yakin ingin keluar ?</p>
</div>
<div class="modal-footer">
	<button class="btn btn-sm btn-default" data-dismiss="modal" type="modal"><i class="fa fa-times"></i> Tidak</button>
	<a href="<?php echo base_url(); ?>staf_it/home/logout_konfirm/<?php echo $list->id_user ?>" id="delete" class="btn btn-sm btn-danger"><div class="fa fa-check"></div> Ya</a>
</div>
