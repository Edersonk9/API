<?php

namespace App\Http\Controllers;

use App\MensagemM;
use App\VendedorM;
use App\ClienteM;
use Illuminate\Http\Request;

class MensagemC extends Controller
{
  public $rota = array('rota' => 'mensagem', 'titulo' => 'Mensagens');

  public function index()    {
    $lista  = MensagemM::Act()->get();

    return view('multi.listMsn', compact('lista'),['rota' => $this->rota]);
  }

  public function create()    {
    $vendedores  = VendedorM::Act()->get();
    $clientes    = ClienteM::Act()->get();

    return view('multi.mensagem', compact('vendedores','clientes'), ['rota' => $this->rota]);
  }

  public function store(Request $request)    {
    $dados  = $request->all();
    $id     = MensagemM::create($dados)->id_empresa;

    return redirect()->route('mensagem.index')->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function show(MensagemM $id)    {
  }

  public function edit($id)    {
    $mensagem    = MensagemM::find($id);
    $vendedores  = VendedorM::Act()->get();
    $clientes    = ClienteM::Act()->get();

    return view('multi.mensagem', compact('vendedores','clientes','mensagem'), ['rota' => $this->rota]);
  }

  public function update(Request $request, $id)    {
    $mensagem    = MensagemM::find($id);
    $mensagem->update($request->all());

    return redirect()->route('mensagem.index')->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function destroy(MensagemM $mensagemM)    {
    //
  }
}
