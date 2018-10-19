<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionM;
use App\ClienteM;
use App\EnderecoM;
use App\DadoM;

class ApiClienteC extends Controller
{
  public function all(Request $request)    {
    if(SessionM::where('token',$request['token'])->count() == 1)
      return response()->json(ClienteM::Act()->get());

    return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);
  }

  public function list(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){

      $dados = ClienteM::join('rji_dados AS D', 'D.id_dado', '=', 'rji_clientes.dado_id')
      ->select('id_cliente','cliente','rji_clientes.email','celular','telefone','rji_clientes.status')
      ->get();

      return response()->json($dados);
    }
    return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);
  }

  public function show(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1)
      return response()->json(ClienteM::Act()->where('id_cliente', $request['id_cliente'])->get());

    return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);
  }

  public function store(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){
      $idEmp = SessionM::where('token',$request['token'])->get();
      $idD = DadoM::create($request->all())->id_dado;
      $idE = EnderecoM::create($request->all())->id_endereco;

      $idC = new ClienteM;
      $idC->cliente = $request['cliente'];
      $idC->email = $request['email'];
      $idC->empresa_id = $idEmp[0]->empresa_id;
      $idC->endereco_id = $idE;
      $idC->dado_id = $idD;

      if($idC->save())
        return response()->json(['status'=>true, 'msn'=>'Cadastrado com sucesso'],200);

      return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);
    }else{
      return response()->json(['status'=>false, 'msn'=>'Necessário logar'],200);
    }
  }

  public function update(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){
      $data = $request->all();

      $idC = ClienteM::findOrFail($data['id_cliente']);
      EnderecoM::findOrFail($idC->endereco_id)->update($data);
      DadoM::findOrFail($idC->dado_id)->update($data);

      if($idC->update($data))
        return response()->json(['status'=>true, 'msn'=>'Alterado com sucesso'],200);

      return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);
    }else{
      return response()->json(['status'=>false, 'msn'=>'Necessário logar'],200);
    }
  }
}
