<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MensagemM;
use App\UsuarioM;
use App\SessionM;
use Auth;

class ApiMensagemC extends Controller
{
  public function all(Request $request)    {
    if(SessionM::where('token',$request['token'])->count() == 1)
      return response()->json(MensagemM::Act()->get());

    return response()->json(['status'=>false],200);
  }

  public function list(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1)
      return response()->json(MensagemM::Act()->get());

    return response()->json(['status'=>false],200);
  }

  public function show(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){
        if(isset($request['cliente_id']))
          return response()->json(MensagemM::Act()->where('cliente_id', $request['cliente_id'])->get());
        if(isset($request['vendedor_id']))
          return response()->json(MensagemM::Act()->where('vendedor_id', $request['vendedor_id'])->get());
        if(isset($request['id_mensagem']))
          return response()->json(MensagemM::Act()->where('id_mensagem', $request['id_mensagem'])->get());
    }

    return response()->json(['status'=>false],200);
  }

  public function store(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){
      if(MensagemM::create($request->all()))
        return response()->json(['status'=>true, 'msn'=>'Cadastrado com sucesso'],200);

      return response()->json(['status'=>false, 'msn'=>'Tente novamente'],200);
    }else{
      return response()->json(['status'=>false, 'msn'=>'Necessário logar'],200);
    }
  }

  public function update(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){
      $idM = MensagemM::findOrFail($request['id_mensagem']);

      if($idM->update($request->all()))
        return response()->json(['status'=>true, 'msn'=>'Alterado com sucesso'],200);

      return response()->json(['status'=>false, 'msn'=>'Tente novamente'],200);
    }else{
      return response()->json(['status'=>false, 'msn'=>'Necessário logar'],200);
    }
  }

}
