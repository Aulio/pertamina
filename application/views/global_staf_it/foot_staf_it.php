 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Designed By</b> Aulio Romadho Agung

    </div>
    <strong>2017 &copy; Universitas Pertamina.</strong> All rights
    reserved. 
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/it/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/it/plugins/jQuery/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/it/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/it/plugins/morris/morris.js"></script>-->
<!-- Sparkline 
<script src="<?php echo base_url(); ?>assets/it/plugins/sparkline/jquery.sparkline.min.js"></script>-->
<!-- jvectormap 
<script src="<?php echo base_url(); ?>assets/it/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/it/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart 
<script src="<?php echo base_url(); ?>assets/it/plugins/knob/jquery.knob.js"></script>-->
<!-- daterangepicker
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/it/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker
<script src="<?php echo base_url(); ?>assets/it/plugins/datepicker/bootstrap-datepicker.js"></script> -->
<!-- Bootstrap WYSIHTML5 
<script src="<?php echo base_url(); ?>assets/it/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
<!-- Slimscroll
<script src="<?php echo base_url(); ?>assets/it/plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick
<script src="<?php echo base_url(); ?>assets/it/plugins/fastclick/fastclick.js"></script> -->
<!-- itLTE App -->
<script src="<?php echo base_url(); ?>assets/it/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/it/dist/js/demo.js"></script>

 <script type="text/javascript">
      $(document).ready( function(){
        var link_base = "<?php echo base_url();?>";

        $('[data-lilili="tooltip"]').tooltip();

        $('#cari').on('hidden.bs.modal', function(){
          $('#cari').removeData('bs.modal');
        });

        $('#edit').on('hidden.bs.modal', function(){
          $('#edit').removeData('bs.modal');
        });

        $('#hapus').on('show.bs.modal', function(event){
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var jenis = button.data('jenis');
          if (jenis == 'belinonspl') {
            var link = link_base+"it/beli_bahan/nonsupplier/delete/"+id;
          }else if(jenis == 'matakuliah'){
            var link = link_base+"staf_it/matakuliah/delete/"+id;
          }else if(jenis == 'mahasiswa'){
            var link = link_base+"staf_it/mahasiswa/delete/"+id;
          }else if(jenis == 'jurusan'){
            var link = link_base+"staf_it/jurusan/delete/"+id;
          }else if(jenis == 'logout'){
            var link = link_base+"staf_it/home/logout_konfirm/"+id;
          }else if(jenis == 'file'){
            var link = link_base+"staf_it/file/delete/"+id;
          }else if(jenis == 'staf_admin'){
            var link = link_base+"staf_it/staf_admin/delete/"+id;
          }

          $('#delete').attr('href', link);
        });

        $('#detail').on('hidden.bs.modal', function(){
          $('#detail').removeData('bs.modal');
        });
        $('#hapus').on('hidden.bs.modal', function(){
          $('#hapus').removeData('bs.modal');
        });
        
      });
    </script>

</body>
</html>