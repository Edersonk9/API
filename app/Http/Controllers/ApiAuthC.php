<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioM;
use App\SessionM;
use Auth;

class ApiAuthC extends Controller
{

  public function login(Request $request){
    $r = SessionM::where('token',$request['token'])->delete();

    $credentials = [
      'email' => $request['email'],
      'password' => $request['password']
    ];

    // Make sure current password is correct
    if(Auth::attempt($credentials, true)) { // Checks the User's credentials
      $srt = str_random(20);

      $s = new SessionM;
      $s->token = $srt;
      $s->user_id = \Auth::id();
      $s->empresa_id = \Auth::user()->empresa_id;
      $s->save();

      return response()->json(['status'=>true,'token'=>$srt],200);
    }
    return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);

  }

  public function logout(Request $request){
    if(SessionM::where('token',$request['token'])->delete())
      return response()->json(['status'=>true,'msn'=>'Logout realizado com sucesso.'],200);

    return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);
  }

  public function help(){
    $t = array([
        'login'=>['POST'=>'(email/password)','RETURN'=>'(status,token)'],
        'logout'=>['POST'=>'(token)','RETURN'=>'(status,msn)'],

      'CLIENTE'=>[
        'all'=>['POST'=>'(token)','RETURN'=>'(clientes{*}|status,msn)'],
        'list'=>['POST'=>'(token)','RETURN'=>'(clientes{id_cliente,cliente,email,celular,telefone,status}|status,msn)'],
        'show'=>['POST'=>'(token,id_cliente)','RETURN'=>'(cliente{*}|status,msn)'],
        'store'=>['POST'=>'(token,{cliente,email,celular,telefone,status})','RETURN'=>'(status,msn)'],
        'update'=>['POST'=>'(token,{id_cliente,cliente,email,celular,telefone,status})','RETURN'=>'(status,msn)'],
        ],
      'VENDEDOR'=>[
        'all'=>['POST'=>'(token)','RETURN'=>'(vendedores{*}|status,msn)'],
        'list'=>['POST'=>'(token)','RETURN'=>'(vendedores{id_vendedor,vendedor,email,celular,telefone,status}|status,msn)'],
        'show'=>['POST'=>'(token,id_vendedor)','RETURN'=>'(vendedor{*}|status,msn)'],
        'store'=>['POST'=>'(token,{vendedor,email,celular,telefone,status})','RETURN'=>'(status,msn)'],
        'update'=>['POST'=>'(token,{id_vendedor,vendedor,email,celular,telefone,status})','RETURN'=>'(status,msn)'],
        ],
      'MENSAGEM'=>[
        'all'=>['POST'=>'(token)','RETURN'=>'(mensagens{*}|status,msn)'],
        'list'=>['POST'=>'(token)','RETURN'=>'(mensagens{id_mensagem,titulo,status,mensagem,contato,vendedor_id,cliente_id}|status,msn)'],
        'show'=>['POST'=>'(token,{cliente_id|vendedor_id|id_mensagem})','RETURN'=>'(mensagens_cliente_id{*}|status,msn)'],
        'store'=>['POST'=>'(token,{titulo,status,mensagem,dt_contato,vendedor_id,cliente_id})','RETURN'=>'(status,msn)'],
        'update'=>['POST'=>'(token,{id_mensagem,titulo,status,mensagem,contato,vendedor_id,cliente_id})','RETURN'=>'(status,msn)'],
        ],
      'HELP'=>[
        'GET'=>'','RETURN'=>'(lista)'
        ]

      ]);

    return response()->json($t);
  }
}
