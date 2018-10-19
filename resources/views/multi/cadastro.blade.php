@extends('layouts.app_multi')

@section('content')
  @php
  $uf = 'MG';
  if(isset($entidade)){
    $end  = (object) $entidade->endereco;
    $dad  = (object) $entidade->dado;
    $uf   = $end->uf;
   }
   if($rota['rota'] == 'vendedor')
   $uf   = $end->uf;
  @endphp
      <!-- Example DataTables Card-->
      <div class="card mb-3 bg-white">
      <!-- Example DataTables Card-->
      <div class="p-2 mb-2 card-header bg-dark text-white">
        <h5>{{ isset($entidade)?"Alterando ":"Cadastrar "}}{{$rota['titulo']}}</h5>
      </div>

      <div class="row">

        <div class="col-lg-4">
          @if (isset($entidade))
            <form class="form-horizontal" action="{{route($rota['rota'].'.update',$id)}}" method="post">
              <input type="hidden" name="endereco_id" value="{{$entidade->endereco_id}}">
              {{ method_field('PUT') }}
            @else
            <form class="form-horizontal" action="{{route($rota['rota'].'.store')}}" method="post">
          @endif
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
            <div class="col-md-12">
              <label for="{{$rota['rota']}}">Nome</label>
              <input name="{{$rota['rota']}}" type="text" class="form-control form-control-sm" id="{{$rota['rota']}}" value="{{$entidade['entidade'] or old($rota['rota'])}}" required autofocus>
              @if ($errors->has($rota['rota']))
                <span class="help-block">
                  <strong>{{ $errors->first($rota['rota']) }}</strong>
                </span>
              @endif
            </div>
          </div>

            <div class="form-group{{ $errors->has('razao') ? ' has-error' : '' }}">
            <div class="col-md-12">
              <label for="razao">Razão</label>
              <input name="razao" type="text" class="form-control form-control-sm" id="razao" value="{{$dad->razao or old('razao')}}" required>
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
              <input name="telefone" type="number" class="form-control form-control-sm" id="telefone" value="{{$dad->telefone or old('telefone')}}" required>
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
              <input name="logradouro" type="text" class="form-control form-control-sm" id="logradouro" value="{{$end->logradouro or old('logradouro')}}" required>
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
              <input name="complemento" type="text" class="form-control form-control-sm" id="complemento" value="{{$end->complemento or old('complemento')}}">
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
              <input name="bairro" type="text" class="form-control form-control-sm" id="bairro" value="{{$end->bairro or old('bairro')}}" required>
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
              <select name="uf" class="form-control" id="uf">
                <option value="AC" {{ $uf == "AC"?"selected":""}}>Acre</option>
                <option value="AL" {{ $uf == "AL"?"selected":""}}>Alagoas</option>
                <option value="AP" {{ $uf == "AP"?"selected":""}}>Amapá</option>
                <option value="AM" {{ $uf == "AM"?"selected":""}}>Amazonas</option>
                <option value="BA" {{ $uf == "BA"?"selected":""}}>Bahia</option>
                <option value="CE" {{ $uf == "CE"?"selected":""}}>Ceara</option>
                <option value="DF" {{ $uf == "DF"?"selected":""}}>Distrito Federal</option>
                <option value="ES" {{ $uf == "ES"?"selected":""}}>Espírito Santo</option>
                <option value="GO" {{ $uf == "GO"?"selected":""}}>Goiás</option>
                <option value="MA" {{ $uf == "MA"?"selected":""}}>Maranhão</option>
                <option value="MT" {{ $uf == "MT"?"selected":""}}>Mato Grosso</option>
                <option value="MS" {{ $uf == "MS"?"selected":""}}>Mato Grosso do Sul</option>
                <option value="MG" {{ $uf == "MG"?"selected":""}}>Minas Gerais</option>
                <option value="PA" {{ $uf == "PA"?"selected":""}}>Pará</option>
                <option value="PB" {{ $uf == "PB"?"selected":""}}>Paraíba</option>
                <option value="PR" {{ $uf == "PR"?"selected":""}}>Paraná</option>
                <option value="PE" {{ $uf == "PE"?"selected":""}}>Pernambuco</option>
                <option value="PI" {{ $uf == "PI"?"selected":""}}>Piauí</option>
                <option value="RJ" {{ $uf == "RJ"?"selected":""}}>Rio de Janeiro</option>
                <option value="RN" {{ $uf == "RN"?"selected":""}}>Rio Grande do Norte</option>
                <option value="RS" {{ $uf == "RS"?"selected":""}}>Rio Grande do Sul</option>
                <option value="RO" {{ $uf == "RO"?"selected":""}}>Rondônia</option>
                <option value="RR" {{ $uf == "RR"?"selected":""}}>Roraima</option>
                <option value="SC" {{ $uf == "SC"?"selected":""}}>Santa Catarina</option>
                <option value="SP" {{ $uf == "SP"?"selected":""}}>São Paulo</option>
                <option value="SE" {{ $uf == "SE"?"selected":""}}>Sergipe</option>
                <option value="TO" {{ $uf == "TO"?"selected":""}}>Tocantins</option>
              </select>
            </div>
          </div>

          <div class="col-md-12">
            @if (!isset($entidade))
              <button type="submit" class="btn btn-outline-primary">
                <i class='fa fa-plus fa-lg' aria-hidden='true'></i> Cadastrar
              @else
                <button type="submit" class="btn btn-outline-dark" onclick="return confirm('Confirma a alteração?')">
                  <i class='fa fa-edit fa-lg' aria-hidden='true'></i> Alterar
                @endif
            </button><br><br>
                      </div>

          </div>
          <div class="col-lg-4">

            <div class="form-group">
              <label for="cnpj">CNPJ/MF</label>
              <input name="cnpj" type="number" class="form-control form-control-sm" id="cnpj" value="{{$dad->cnpj or old('cnpj')}}" required>
              @if ($errors->has('cnpj'))
                <span class="help-block">
                  <strong>{{ $errors->first('cnpj') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="ie">Inscrição Estadual</label>
              <input name="ie" type="number" class="form-control form-control-sm" id="ie" value="{{$dad->ie or old('ie')}}" required>
              @if ($errors->has('ie'))
                <span class="help-block">
                  <strong>{{ $errors->first('ie') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="celular">Celular</label>
              <input name="celular" type="number" class="form-control form-control-sm" id="celular" value="{{$dad->celular or old('celular')}}">
              @if ($errors->has('celular'))
                <span class="help-block">
                  <strong>{{ $errors->first('celular') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="numero">Número</label>
              <input name="numero" type="text" class="form-control form-control-sm" id="numero" value="{{$end->numero or old('numero')}}" required>
              @if ($errors->has('numero'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input name="cidade" type="text" class="form-control form-control-sm" id="cidade" value="{{$end->cidade or old('cidade')}}" required>
              @if ($errors->has('cidade'))
                <span class="help-block">
                  <strong>{{ $errors->first('cidade') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="cep">CEP</label>
              <input name="cep" type="text" class="form-control form-control-sm" id="cep" value="{{$end->cep or old('cep')}}" required>
              @if ($errors->has('cep'))
                <span class="help-block">
                  <strong>{{ $errors->first('cep') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="cod_vip">CÓD VIP</label>
              <input name="cod_vip" type="number" class="form-control form-control-sm" id="cod_vip" value="{{$end->cod_vip or old('cod_vip')}}">
              @if ($errors->has('cod_vip'))
                <span class="help-block">
                  <strong>{{ $errors->first('cod_vip') }}</strong>
                </span>
              @endif
            </div>

          </form>
        </div>
      <br>
    </div>
    <!-- /.container-fluid-->
  @endsection
