@extends('layouts.app_multi')

@section('content')
  @php
    $idG = 0;
    $idE = 0;
    if(isset($usuario)) $idG = $usuario->grupo_id;
    if(isset($usuario)) $idE = $usuario->empresa_id;
    if(isset($empresa)) $idE = $empresa;
  @endphp

    <!-- Example DataTables Card-->
    <div class="card mb-3 bg-white">
    <!-- Example DataTables Card-->
    <div class="p-2 mb-2 card-header bg-dark text-white">
      <h5> {{ isset($usuario)?"Alterando Usuário":"Cadastrar Usuário"}} </h5>
    </div>

      @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
      @endif

      <div class="row">
        <!-- FORM -->
        <div class="col-lg-10">
          @if (isset($usuario))
            <form class="form-horizontal" action="{{route('usuario.update',$usuario->id)}}" method="post">
              {{ method_field('PUT') }}
            @else
              <form class="form-horizontal" method="POST" action="{{ route('usuario.store') }}">
              @endif
              {{ csrf_field() }}


              <div class="form-group">
                <div class="col-md-4">
                  <label for="exampleFormControlSelect1">Empresa</label>
                  <select name="empresa_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($empresas as $key)
                      <option value="{{$key->id_empresa}}" >{{$key->empresa}}</option>
                      @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nome </label>

                <div class="col-md-4">
                  <input id="name" type="text" class="form-control form-control-sm" name="name" value="{{ $usuario->name or old('name') }}" required autofocus>

                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>



              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">E-Mail</label>

                  <div class="col-md-6">
                      <input id="email" type="email" class="form-control form-control-sm" name="email" value="{{ $usuario->email or old('email') }}" required>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

                @if (!isset($usuario))
                  <div class="" style="display:none">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Senha</label>

                      <div class="col-md-4">
                        <input value="123" id="password" type="password" class="form-control form-control-sm" name="password" required>

                        @if ($errors->has('password'))
                          <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="password-confirm" class="col-md-4 control-label">Confirma Senha</label>

                      <div class="col-md-4">
                        <input value="123" id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required>
                      </div>
                    </div>
                  </div>
                @endif


              <div class="form-group">
                  <div class="col-md-10 col-md-offset-4">
                      <button type="submit" class="btn btn-outline-dark">
                        @if (isset($usuario))
                          <i class='fa fa-edit' aria-hidden='true'></i> Alterar
                        @else
                          <i class='fa fa-plus' aria-hidden='true'></i> Cadastrar
                        @endif
                      </button>
                  </div>
              </div>
          </form>
      </div>
    </div>
  </div>

@endsection
  <!-- /.container-fluid-->
