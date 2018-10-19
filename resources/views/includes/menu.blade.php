<!-- MENU PAGE -->
<!-- MENU PAGE ESQUERDO -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top" id="mainNav">
  <a class="navbar-brand" href="{{route('home')}}">{{ config('app.name', 'SOITIC') }}</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
<!-- PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO -->
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route("perfil.index")}}">
          <img src="{{env('APP_S3').Auth::user()->foto}}" alt="..." class="img-responsive" width="30" >
          <span class="nav-link-text">{{ Auth::user()->name }} {{ Auth::user()->empresa_id }} {{ Auth::user()->tipo }}</span>
        </a>
      </li>
      <!-- PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO PERFIL USUÁRIO -->
      <div class="{{Auth::user()->tipo == 1?"":"d-none"}}">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ route('empresa.index') }}">
            <i class="fa fa-fw fa-industry"></i>
            <span class="nav-link-text">Empresas</span>
          </a>
        </li>
      </div>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ route('usuario.index') }}">
          <i class="fa fa-fw fa-users"></i>
          <span class="nav-link-text">Usuários</span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ route('cliente.index') }}">
          <i class="fa fa-fw fa-user-o"></i>
          <span class="nav-link-text">Clientes</span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ route('vendedor.index') }}">
          <i class="fa fa-fw fa-user"></i>
          <span class="nav-link-text">Vendedores</span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ route('mensagem.index') }}">
          <i class="fa fa-fw fa-envelope"></i>
          <span class="nav-link-text">Mensagens</span>
        </a>
      </li>

      <li class="nav-item d-none" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-users"></i>
          <span class="nav-link-text">Usuários</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
          <li>
            <a href="#">Grupos</a>
          </li>
          <li>
            <a href="{{ route('usuario.index') }}">Usuários</a>
          </li>
          <li class="d-none">
            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
            <ul class="sidenav-third-level collapse" id="collapseMulti2">
              <li>
                <a href="#">Third Level Item</a>
              </li>
              <li>
                <a href="#">Third Level Item</a>
              </li>
              <li>
                <a href="#">Third Level Item</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>

    </ul>
    <!-- MENU PAGE ESQUERDO -->
    <!-- MENU PAGE SUPERIOR -->
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">

      @component('includes.notify')
      @endcomponent

<!-- BUSCA ARQUIVOS E PASTAS BUSCA ARQUIVOS E PASTAS BUSCA ARQUIVOS E PASTAS BUSCA ARQUIVOS E PASTAS -->
      <li class="nav-item">
        <form class="form-inline my-2 my-lg-0 mr-lg-2" action="" method="post">
          {{ csrf_field() }}
          <div class="input-group">
            <input class="busca" name="nome" type="text" placeholder="Buscar Arquivos e Pastas">
          </div>
        </form>
      </li>
<!-- BUSCA ARQUIVOS E PASTAS BUSCA ARQUIVOS E PASTAS BUSCA ARQUIVOS E PASTAS BUSCA ARQUIVOS E PASTAS -->
<!-- PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA -->
      <li class="nav-item">
        <div class="row">
          <div class="col-xs-8 col-md-4">
            <a href="{{route('perfil.create')}}">
              <img src="" alt="PERFIL" class="img-responsive" width="30" >
            </a>
          </div>
        </div>
      </li>
<!-- PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA PERFIL EMPRESA -->
<!-- LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
          <i class="fa fa-fw fa-sign-out"></i> Sair </a>
      </li>
<!-- LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT LOGOUT -->
    </ul>
    <!-- MENU PAGE SUPERIOR -->
  </div>
</nav>
<!-- MENU PAGE -->
