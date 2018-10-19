<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

@component('includes.head')
@endcomponent

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

@yield('content')

@component('includes.footer')
@endcomponent

</body>

</html>
