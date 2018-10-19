<?php

namespace App\Http\Controllers;

use App\AlertaM;
use Illuminate\Http\Request;

class AlertaC extends Controller
{
  public function notify(Request $request)    {
    $cep = $request->cep;
    $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

    $dados['sucesso'] = (string) $reg->resultado;
    $dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
    $dados['bairro']  = (string) $reg->bairro;
    $dados['cidade']  = (string) $reg->cidade;
    $dados['estado']  = (string) $reg->uf;

    echo json_encode($dados);
  }

  public function index()  {
    //
  }

  public function create()  {
    //
  }

  public function store(Request $request)  {
    //
  }

  public function show(AlertaM $alertaM)  {
    //
  }

  public function edit(AlertaM $alertaM)  {
    //
  }

  public function update(Request $request, AlertaM $alertaM)  {
    //
  }

  public function destroy(AlertaM $alertaM)  {
    //
  }
}
