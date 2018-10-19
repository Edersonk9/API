<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionM;
use App\VendedorM;
use App\EnderecoM;
use App\DadoM;

class ApiVendedorC extends Controller
{
  public function all(Request $request)    {
    if(SessionM::where('token',$request['token'])->count() == 1)
      return response()->json(VendedorM::Act()->get()->toArray());

    return response()->json(['status'=>false],200);
  }

  public function list(Request $request)    {
    if(SessionM::where('token',$request['token'])->count() == 1){

      $dados = VendedorM::join('users AS U', 'U.id', '=', 'user_id')
      ->join('rji_dados AS D', 'D.id_dado', '=', 'rji_vendedores.dado_id')
      ->select('id_vendedor','vendedor','D.email','celular','telefone','rji_vendedores.status')
      ->get();

      return response()->json($dados);
    }
    return response()->json(['status'=>false],200);
  }

  public function show(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1)
      return response()->json(VendedorM::Act()->where('id_vendedor', $request['id_vendedor'])->get());

    return response()->json(['status'=>false],200);
  }

  public function store(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){
      $idEmp = SessionM::where('token',$request['token'])->get();
      $idD = DadoM::create($request->all())->id_dado;
      $idE = EnderecoM::create($request->all())->id_endereco;

      $idV = new VendedorM;
      $idV->vendedor = $request['vendedor'];
      $idV->empresa_id = $idEmp[0]->empresa_id;
      $idV->endereco_id = $idE;
      $idV->dado_id = $idD;

      if($idV->save())
        return response()->json(['status'=>true, 'msn'=>'Cadastrado com sucesso'],200);

      return response()->json(['status'=>false, 'msn'=>'Tente novamente'],200);
    }else{
      return response()->json(['status'=>false, 'msn'=>'Necessário logar'],200);
    }
  }

  public function update(Request $request){
    if(SessionM::where('token',$request['token'])->count() == 1){
      $data = $request->all();

      $idV = VendedorM::findOrFail($data['id_vendedor']);
      EnderecoM::findOrFail($idV->endereco_id)->update($data);
      DadoM::findOrFail($idV->dado_id)->update($data);

      if($idV->update($data))
        return response()->json(['status'=>true, 'msn'=>'Alterado com sucesso'],200);

      return response()->json(['status'=>false, 'msn'=>'Tente novamente'],200);
    }else{
      return response()->json(['status'=>false, 'msn'=>'Necessário logar'],200);
    }
  }

}
