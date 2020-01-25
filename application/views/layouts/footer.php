<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="<?php echo base_url();?>assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<!-- File export datatables -->
<script src="<?php echo base_url();?>assets/js/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/buttons.print.min.js"></script>

<!-- SlimScroll -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://adminlte.io/themes/AdminLTE/dist/js/demo.js"></script>



<script src="<?php echo base_url();?>assets/js/jquery.print.js"></script>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<script src="<?php echo base_url();?>assets/js/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/js/highcharts/exporting.js"></script>

<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script src="<?php echo base_url();?>assets/js/graphic.js"></script>

<script>
  $(document).ready(function () {    
    $('.sidebar-menu').tree();
  });
</script>

<script>
  $(function () {
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>

<script>
  $(function() {
    setTimeout(function() {
      $(".messages").fadeOut(2000);
    });    
  });
</script>



</body>
</html>