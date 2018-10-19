<!-- HEAD -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'SOITIC') }}</title>

<!-- Styles -->
<link  href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link  href="{{ asset('css/multi.css') }}" rel="stylesheet">
<!-- Custom fonts for this template-->
<link  href="{{ asset("/vendor/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">

<link  href="{{ asset("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
<!-- Custom styles for this template-->
<link  href="{{ asset("css/sb-admin.css") }}" rel="stylesheet">
<link  href="{{ asset("css/soged.css") }}" rel="stylesheet">
<link  href="{{ asset("css/teste.css") }}" media="print" rel="stylesheet">
<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
<!-- Custom scripts for this page-->
<!-- Page level plugin JavaScript-->
<script src="{{ asset("js/jquery.dataTables.js") }}"></script>
<script src="{{ asset("js/dataTables.bootstrap4.js") }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset("js/jquery.easing.min.js") }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset("js/sb-admin.min.js") }}"></script>
<!-- Custom scripts for this page-->
<!-- Toggle between fixed and static navbar-->
<script src="{{ asset("js/sb-admin-datatables.min.js") }}"></script>
<!-- HEAD -->
