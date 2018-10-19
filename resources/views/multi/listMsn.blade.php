@extends('layouts.app_multi')

@section('content')

  @section('content')

        <!-- Example DataTables Card-->
        <div class="card mb-3 bg-white">
          <div class="card-header bg-dark text-white">
            <div class="row">
              <div class="col-lg-8">
                <h5>Lista de {{$rota['titulo']}}</h5>
              </div>
              <div class="col-lg-4">
                <div class="text-right">
                  <a href="{{route($rota['rota'].".create")}}">
                    <i class="text-white fa fa-plus-circle fa-2x" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th> Título </th>
                    <th> Mensagem </th>
                    <th> Vendedor </th>
                    <th> Cliente </th>
                    <th> Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lista as $key)
                    <tr>
                      <td>{{ $key->titulo }}</td>
                      <td>{{ $key->mensagem  }}</td>
                      <td>{{ $key->vendedor->vendedor }}</td>
                      <td>{{ $key->cliente->cliente }}</td>
                      <td class="text-muted">

                        <form method="POST" action="{{route($rota['rota'].".destroy", $key->id_mensagem)}}">
                          {{ csrf_field() }} {{ method_field('DELETE') }}

                          <a href="{{route($rota['rota'].'.edit',$key->id_mensagem)}}" class="btn btn-outline-success btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          </a>

                          <button class="btn btn-outline-danger btn-sm" type="submit" name="button" onclick="return confirm('Confirma a exclusão?')">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Consultado por {{\Auth::user()->name}} em {{date('d/m/Y H:i')}}</div>
        </div>
      <!-- /.container-fluid-->

    @endsection
