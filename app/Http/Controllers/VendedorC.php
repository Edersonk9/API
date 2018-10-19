<?php

namespace App\Http\Controllers;

use App\VendedorM;
use App\EnderecoM;
use App\DadoM;
use Illuminate\Http\Request;

class VendedorC extends Controller
{
  public $rota = array('rota' => 'vendedor', 'titulo' => 'Vendedores');

  public function index()    {
    $lista  = VendedorM::All();

    return view('multi.list', compact('lista'),['rota' => $this->rota]);
  }

  public function create()    {
    return view('multi.cadastro', ['rota' => $this->rota]);
  }

  public function store(Request $request)    {
    $dados  = $request->all();
    $end    = EnderecoM::create($dados)->id_endereco;
    $dad    = DadoM::create($dados)->id_dado;
    $dados['endereco_id'] = $end;
    $dados['dado_id']     = $dad;
    $dados['empresa_id']  = \Auth::user()->empresa_id;
    $id     = VendedorM::create($dados)->id_empresa;

    return redirect()->route('vendedor.index')->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function show(VendedorM $vendedorM)    {
    //
  }

  public function edit($id)    {
    $entidade = VendedorM::findOrFail($id);
    $entidade['entidade'] = $entidade['vendedor'];
    $id = $entidade['id_vendedor'];

    return view('multi.cadastro', compact('entidade','id'), ['rota' => $this->rota]);
  }

  public function update(Request $request, $id)    {
    $mensagem    = VendedorM::find($id);
    $mensagem->update($request->all());
    $endereco    = EnderecoM::find($mensagem->endereco_id);
    $endereco->update($request->all());
    $dado        = DadoM::find($mensagem->dado_id);
    $dado->update($request->all());

    return redirect()->route('vendedor.index')->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function destroy(VendedorM $vendedorM)    {
    //
  }
}
