@extends('layouts.app_multi')

@section('content')

    <!-- Example DataTables Card-->
    <div class="card mb-3 bg-white">
    <!-- Example DataTables Card-->
    <div class="p-2 mb-2 card-header bg-dark text-white">
      <h5> {{ isset($mensagem)?"Alterando ":"Cadastrar "}} {{$rota['titulo']}}</h5>
    </div>

      <div class="row">
        <!-- FORM -->
        <div class="col-lg-10">
          @if (isset($mensagem))
            <form class="form-horizontal" action="{{route($rota['rota'].'.update', $mensagem->id_mensagem)}}" method="POST">
              {{ method_field('PUT') }}
            @else
              <form class="form-horizontal" method="POST" action="{{ route($rota['rota'].'.store') }}">
              @endif
              {{ csrf_field() }}


              <div class="form-group">
                <div class="col-md-4">
                  <label for="exampleFormControlSelect1">Vendedores</label>
                  <select name="vendedor_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($vendedores as $key)
                      <option value="{{$key->id_vendedor}}" {{$key->id_vendedor == $mensagem->vendedor_id?"selected":""}}>{{$key->vendedor}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4">
                  <label for="exampleFormControlSelect1">Clientes</label>
                  <select name="cliente_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($clientes as $key)
                      <option value="{{$key->id_cliente}}" {{$key->id_cliente == $mensagem->cliente_id?"selected":""}}>{{$key->cliente}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                <label for="titulo" class="col-md-4 control-label">Título </label>

                <div class="col-md-4">
                  <input id="titulo" type="text" class="form-control form-control-sm" name="titulo" value="{{ $mensagem->titulo or old('titulo') }}" required autofocus>

                  @if ($errors->has('titulo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('titulo') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('mensagem') ? ' has-error' : '' }}">
                  <label for="mensagem" class="col-md-4 control-label">E-Mail</label>

                  <div class="col-md-4">
                    <textarea name="mensagem" rows="5" cols="30" class="form-control form-control-sm">
                      {{ $mensagem->mensagem or old('mensagem') }}
                    </textarea>

                      @if ($errors->has('mensagem'))
                          <span class="help-block">
                              <strong>{{ $errors->first('mensagem') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>

              <div class="form-group">
                  <div class="col-md-10 col-md-offset-4">
                      <button type="submit" class="btn btn-outline-dark">
                        @if (isset($mensagem))
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
