<?php

namespace App\Http\Controllers;

use App\EmpresaM;
use App\EnderecoM;
use App\DadoM;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpresa;

class EmpresaC extends Controller
{
  public $rota = array('rota' => 'empresa', 'titulo' => 'Empresas');

  public function consulta_cep(Request $request)    {
    $cep = $request->cep;
    $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

    $dados['sucesso'] = (string) $reg->resultado;
    $dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
    $dados['bairro']  = (string) $reg->bairro;
    $dados['cidade']  = (string) $reg->cidade;
    $dados['estado']  = (string) $reg->uf;

    echo json_encode($dados);
  }

  public function index()    {
    $lista  = EmpresaM::Act()->get();

    return view('multi.list', compact('lista'), ['rota' => $this->rota]);
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
    $id     = EmpresaM::create($dados)->id_empresa;
    // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
    /*
    $log                = new Log;
    $log->id_empresa    = \Auth::user()->empresa_id;
    $log->id_user       = \Auth::id();
    $log->empresa_id    = $id;
    $log->desc          = 'Criado, EMP + END';
    $log->save();
    */
    // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
    return redirect()->route('empresa.index')->with(['success' => 'Cadastrado com sucesso.']);
  }

  public function show(EmpresaM $empresaM)    {
    //
  }

  public function edit($id)    {
    $entidade = EmpresaM::findOrFail($id);
    $entidade['entidade'] = $entidade['empresa'];
    $id = $entidade['id_empresa'];

    return view('multi.cadastro', compact('entidade','id'), ['rota' => $this->rota]);
  }

  public function update(Request $request, $id)    {
    $data = $request->all();
    $id   = EmpresaM::findOrFail($id);
    $id->update($data);
    $idE  = EnderecoM::findOrFail($id->endereco_id);
    $idE->update($data);
    $idD  = DadoM::findOrFail($id->dado_id);
    $idD->update($data);

    return redirect()->route('empresa.index')->with(['success' => 'Alterado com sucesso.']);
  }

  public function destroy($id)    {
    $id   = EmpresaM::findOrFail($id);
    $id->update(['status' => 0]);

    return redirect()->route('empresa.index')->with(['success' => 'Escluído com sucesso.']);
  }
}
