@extends('layouts.app_multi')

@section('content')
  @php
  if(isset($usuario)){
    $titulo = 'usuario';
    $id = $usuario->id;
    $nome = $usuario->name;
    $data = $usuario;
  }
  else{
    $titulo = 'empresa';
    $id = $empresa->id_empresa;
    $nome = $empresa->empresa;
    $data = $empresa;
  }
  @endphp
      <!-- Example DataTables Card-->
      <div class="card mb-3 bg-white">
      <!-- Example DataTables Card-->
      <div class="p-2 mb-2 card-header bg-dark text-white"><h5>{{ $titulo == 'usuario'?'Perfil do Usuário':'Perfil da Empresa' }}</h5></div>
      <div class="row">

        <div class="col-lg-4">
          <form class="" action="{{route('perfil.update',$id)}}" method="post">
            <input type="hidden" name="titulo" value="{{$titulo}}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
            <div class="col-md-12">
              <label for="nome">Nome</label>
              <input name="nome" type="text" class="form-control form-control-sm" id="nome" value="{{$nome}}">
              @if ($errors->has('nome'))
                <span class="help-block">
                  <strong>{{ $errors->first('nome') }}</strong>
                </span>
              @endif
            </div>
          </div>

            <div class="form-group">
            <div class="col-md-12">
              <label for="razao">Razão</label>
              <input type="text" class="form-control form-control-sm" id="razao" name="razao" value="{{$data->dado->razao}}">
              @if ($errors->has('razao'))
                <span class="help-block">
                  <strong>{{ $errors->first('razao') }}</strong>
                </span>
              @endif
            </div>
          </div>

            <div class="form-group">
            <div class="col-md-12">
              <label for="telefone">Telefone</label>
              <input name="telefone" type="number" class="form-control form-control-sm" id="telefone" value="{{$data->dado->telefone}}">
              @if ($errors->has('telefone'))
                <span class="help-block">
                  <strong>{{ $errors->first('telefone') }}</strong>
                </span>
              @endif
            </div>
          </div>

            <div class="form-group">
            <div class="col-md-12">
              <label for="logradouro">Logradouro</label>
              <input name="logradouro" type="text" class="form-control form-control-sm" id="logradouro" value="{{$data->endereco->logradouro}}">
              @if ($errors->has('logradouro'))
                <span class="help-block">
                  <strong>{{ $errors->first('logradouro') }}</strong>
                </span>
              @endif
            </div>
          </div>

            <div class="form-group">
            <div class="col-md-12">
              <label for="complemento">Complemento</label>
              <input name="complemento" type="text" class="form-control form-control-sm" id="complemento" value="{{$data->endereco->complemento}}">
              @if ($errors->has('complemento'))
                <span class="help-block">
                  <strong>{{ $errors->first('complemento') }}</strong>
                </span>
              @endif
            </div>
          </div>

            <div class="form-group">
            <div class="col-md-12">
              <label for="bairro">Bairro</label>
              <input name="bairro" type="text" class="form-control form-control-sm" id="bairro" value="{{$data->endereco->bairro}}">
              @if ($errors->has('bairro'))
                <span class="help-block">
                  <strong>{{ $errors->first('bairro') }}</strong>
                </span>
              @endif
            </div>
          </div>

            <div class="form-group">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Estado</label>
              <select name="uf" class="form-control" id="exampleFormControlSelect1">
                <option value="AC" {{$data->endereco->uf == "AC"?"selected":""}}>Acre<option>
                <option value="AL" {{$data->endereco->uf == "AL"?"selected":""}}>Alagoas<option>
                <option value="AP" {{$data->endereco->uf == "AP"?"selected":""}}>Amapá<option>
                <option value="AM" {{$data->endereco->uf == "AM"?"selected":""}}>Amazonas<option>
                <option value="BA" {{$data->endereco->uf == "BA"?"selected":""}}>Bahia<option>
                <option value="CE" {{$data->endereco->uf == "CE"?"selected":""}}>Ceara<option>
                <option value="DF" {{$data->endereco->uf == "DF"?"selected":""}}>Distrito Federal<option>
                <option value="ES" {{$data->endereco->uf == "ES"?"selected":""}}>Espírito Santo<option>
                <option value="GO" {{$data->endereco->uf == "GO"?"selected":""}}>Goiás<option>
                <option value="MA" {{$data->endereco->uf == "MA"?"selected":""}}>Maranhão<option>
                <option value="MT" {{$data->endereco->uf == "MT"?"selected":""}}>Mato Grosso<option>
                <option value="MS" {{$data->endereco->uf == "MS"?"selected":""}}>Mato Grosso do Sul<option>
                <option value="MG" {{$data->endereco->uf == "MG"?"selected":""}}>Minas Gerais<option>
                <option value="PA" {{$data->endereco->uf == "PA"?"selected":""}}>Pará<option>
                <option value="PB" {{$data->endereco->uf == "PB"?"selected":""}}>Paraíba<option>
                <option value="PR" {{$data->endereco->uf == "PR"?"selected":""}}>Paraná<option>
                <option value="PE" {{$data->endereco->uf == "PE"?"selected":""}}>Pernambuco<option>
                <option value="PI" {{$data->endereco->uf == "PI"?"selected":""}}>Piauí<option>
                <option value="RJ" {{$data->endereco->uf == "RJ"?"selected":""}}>Rio de Janeiro<option>
                <option value="RN" {{$data->endereco->uf == "RN"?"selected":""}}>Rio Grande do Norte<option>
                <option value="RS" {{$data->endereco->uf == "RS"?"selected":""}}>Rio Grande do Sul<option>
                <option value="RO" {{$data->endereco->uf == "RO"?"selected":""}}>Rondônia<option>
                <option value="RR" {{$data->endereco->uf == "RR"?"selected":""}}>Roraima<option>
                <option value="SC" {{$data->endereco->uf == "SC"?"selected":""}}>Santa Catarina<option>
                <option value="SP" {{$data->endereco->uf == "SP"?"selected":""}}>São Paulo<option>
                <option value="SE" {{$data->endereco->uf == "SE"?"selected":""}}>Sergipe<option>
                <option value="TO" {{$data->endereco->uf == "TO"?"selected":""}}>Tocantins<option>
              </select>
            </div>
          </div>

            <div class="col-md-12">
            <div class="" style="display: {{ Auth::user()->grupo_id >2?"none":"" }}">
              <button type="submit" class="btn btn-outline-dark" onclick="return confirm('Confirma a alteração?')">
                <i class='fa fa-edit fa-lg' aria-hidden='true'></i> Alterar
              </button>
            </div>
          </div>

        </div>


          <div class="col-lg-4">
            <div class="form-group">
              <label for="cnpj">CNPJ/MF</label>
              <input name="cnpj" type="number" class="form-control form-control-sm" id="cnpj" value="{{$data->dado->cnpj}}">
              @if ($errors->has('cnpj'))
                <span class="help-block">
                  <strong>{{ $errors->first('cnpj') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="ie">Inscrição Estadual</label>
              <input name="ie" type="number" class="form-control form-control-sm" id="ie" value="{{$data->dado->ie}}">
              @if ($errors->has('ie'))
                <span class="help-block">
                  <strong>{{ $errors->first('ie') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="celular">Celular</label>
              <input name="celular" type="number" class="form-control form-control-sm" id="celular" value="{{$data->dado->celular}}">
              @if ($errors->has('celular'))
                <span class="help-block">
                  <strong>{{ $errors->first('celular') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="numero">Número</label>
              <input name="numero" type="text" class="form-control form-control-sm" id="numero" value="{{$data->endereco->numero}}">
              @if ($errors->has('numero'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input name="cidade" type="text" class="form-control form-control-sm" id="cidade" value="{{$data->endereco->cidade}}">
              @if ($errors->has('cidade'))
                <span class="help-block">
                  <strong>{{ $errors->first('cidade') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="cep">CEP</label>
              <input name="cep" type="number" class="form-control form-control-sm" id="cep" value="{{$data->endereco->cep}}">
              @if ($errors->has('cep'))
                <span class="help-block">
                  <strong>{{ $errors->first('cep') }}</strong>
                </span>
              @endif
            </div>

          </form>
        </div>

        <!-- IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG -->
        <div class="col-lg-4">
          <img src="{{env('APP_S3').$data->dado->img}}" alt="..." class="img-responsive" width="250" >
          <form class="form-inline" action="{{route('perfil.store')}}" method="post" enctype="multipart/form-data" style="display: {{ Auth::user()->grupo_id >2?"none":"" }}">
            <input type="hidden" name="id_dado" value="{{$data->dado->id_dado}}">
            {{ csrf_field() }}
            <div class="form-group mx-sm-2">
              <input class="form-control" id="image" type="file" name="image" value="" accept=".png, .jpg">

              <input name="image" type="file" id="file2" class="custom-file-input" accept=".png, .jpg">
            </div>
            <button type="submit" class="btn btn-outline-dark" onclick="return confirm('Confirma a alteração?')">Enviar imagem</button>
          </form>
        </div>
      </div>
      <!-- IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG IMG -->
      <br>
    </div>
    <!-- /.container-fluid-->
  @endsection
