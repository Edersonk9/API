<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

  @component('includes.head')
  @endcomponent

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  @component('includes.menu')
  @endcomponent

  @component('includes.modal')
  @endcomponent


  <div class="content-wrapper bg-light">
    <div class="container-fluid">
      @component('includes.alerts')
      @endcomponent

    @yield('content')
  </div>

    @component('includes.footer')
    @endcomponent

  </body>

  </html>
