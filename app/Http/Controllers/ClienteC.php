<?php

namespace App\Http\Controllers;

use App\Models\ClienteM;
use App\EnderecoM;
use App\DadoM;
use Illuminate\Http\Request;

class ClienteC extends Controller
{
  public $rota = array('rota' => 'cliente', 'titulo' => 'Clientes');

  public function index()  {
    $lista  = ClienteM::Act()->get();

    return view('multi.list', compact('lista'),['rota' => $this->rota]);
  }

  public function create()  {
    return view('multi.cadastro', ['rota' => $this->rota]);
  }

  public function store(Request $request)  {
    $dados  = $request->all();
    $end    = EnderecoM::create($dados)->id_endereco;
    $dad    = DadoM::create($dados)->id_dado;
    $dados['endereco_id'] = $end;
    $dados['dado_id']     = $dad;
    $dados['empresa_id']  = \Auth::user()->empresa_id;
    $id     = ClienteM::create($dados)->id_empresa;

    return redirect()->route('cliente.index')->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function show(ClienteM $clienteM)  {
    //
  }

  public function edit($id)  {
    $entidade = ClienteM::findOrFail($id);
    $entidade['entidade'] = $entidade['cliente'];
    $id = $entidade['id_cliente'];

    return view('multi.cadastro', compact('entidade','id'), ['rota' => $this->rota]);
  }

  public function update(Request $request, $id)  {
    $mensagem    = ClienteM::find($id);
    $mensagem->update($request->all());
    $endereco    = EnderecoM::find($mensagem->endereco_id);
    $endereco->update($request->all());
    $dado        = DadoM::find($mensagem->dado_id);
    $dado->update($request->all());

    return redirect()->route('cliente.index')->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function destroy(ClienteM $clienteM)  {
    //
  }
}
