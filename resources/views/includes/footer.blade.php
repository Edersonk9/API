
<!-- /.content-wrapper-->
<footer class="sticky-footer bg-secondary">
  <div class="container">
    <div class="text-center text-white">
      <small>Copyright © {{ config('app.name', 'SOITIC') }} 2017</small>
    </div>
  </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fa fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/multi.js')}}" type="text/javascript"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<script src="{{ asset("vendor/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ asset("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin.min.js')}}"></script>
<script src="{{asset('js/sb-admin-datatables.min.js')}}"></script>

<script>
$('#toggleNavPosition').click(function() {
  $('body').toggleClass('fixed-nav');
  $('nav').toggleClass('fixed-top static-top');
});

</script>
<!-- Toggle between dark and light navbar-->
<script>
$('#toggleNavColor').click(function() {
  $('nav').toggleClass('navbar-dark navbar-light');
  $('nav').toggleClass('bg-dark bg-light');
  $('body').toggleClass('bg-dark bg-light');
});
</script>

</div>
