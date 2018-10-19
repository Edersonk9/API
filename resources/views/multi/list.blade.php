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
                    <th> {{$rota['titulo']}} </th>
                    <th> Telefone </th>
                    <th> Cidade </th>
                    <th> Rua </th>
                    <th> Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lista as $key)
                    @php
                    $end = $key['endereco'];
                    $dad = $key['dado'];

                    if($rota['rota'] == 'empresa'){
                      $id = $key['id_empresa'];
                      $nm = $key['empresa'];
                    }elseif ($rota['rota'] == 'vendedor'){
                      $id = $key['id_vendedor'];
                      $nm = $key['vendedor'];
                    }elseif ($rota['rota'] == 'cliente'){
                      $id = $key['id_cliente'];
                      $nm = $key['cliente'];
                    }else{
                      $id = $key['id'];
                      $nm = $key['name'];
                    }
                    @endphp
                    <tr>
                      <td>{{ $nm }}</td>
                      <td>{{ $dad['telefone']  }}</td>
                      <td>{{ $end['cidade']  }}</td>
                      <td>{{ $end['logradouro']  }}</td>
                      <td class="text-muted">

                        <form method="POST" action="{{route($rota['rota'].".destroy", $id)}}">
                          {{ csrf_field() }} {{ method_field('DELETE') }}

                          <a href="{{route($rota['rota'].'.edit',$id)}}" class="btn btn-outline-success btn-sm">
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
