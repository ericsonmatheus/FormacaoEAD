<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.5
  </div>
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('site/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('site/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('site/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('site/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('site/dist/js/adminlte.min.js') }}"></script>
<!-- Script-->
<script src="{{ asset('js/script.js') }}"></script>
<!-- Script for mask-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<!-- Page script -->
<script type="text/javascript">
$("#campoCPF").mask("000.000.000-00");
$("#campoRegistro").mask("000000000000");
</script>

<script>
$(function () {
  $("#example1").DataTable({
    "responsive": true,
    "autoWidth": true,
  });
});

</script>
</body>
</html>
