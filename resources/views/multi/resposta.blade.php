@extends('layouts.app_multi')

@section('content')
<!-- Example DataTables Card-->
<div class="card mb-3 bg-white">
  <!-- Example DataTables Card-->
  <div class="p-2 mb-2 card-header bg-dark text-white">
    <h5>Editar resposta padrão</h5>
  </div>

  <div class="row">

    <div class="col-lg-10">
      <form class="form-horizontal" action="{{route('updateMsn')}}" method="post">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
            <div class="row">

              <div class="col-md-6">
                <div class="form-group{{ $errors->has('msn_email') ? ' has-error' : '' }}">
                  <label for="msn_email" class="col-md-12 control-label">E-Mail</label>
                  <div class="col-md-12">
                    <textarea name="msn_email" rows="5" cols="30" class="form-control">
                      {{ $lista->msn_email or old('msn_email') }}
                    </textarea>

                    @if ($errors->has('msn_email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('msn_email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group{{ $errors->has('msn_whats') ? ' has-error' : '' }}">
                  <label for="msn_whats" class="col-md-12 control-label">WhatsApp</label>
                  <div class="col-md-12">
                    <textarea name="msn_whats" rows="5" cols="30" class="form-control">
                      {{ $lista->msn_whats or old('msn_whats') }}
                    </textarea>

                    @if ($errors->has('msn_whats'))
                      <span class="help-block">
                        <strong>{{ $errors->first('msn_whats') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>

            </div>

          <div class="col-md-12">
              <button type="submit" class="btn btn-outline-dark" onclick="return confirm('Confirma a alteração?')">
                <i class='fa fa-edit fa-lg' aria-hidden='true'></i> Gravar
              </button><br><br>
            </div>

          </div>
          <div class="col-lg-4">


          </form>
        </div>
        <br>
      </div>
      <!-- /.container-fluid-->
      @endsection
