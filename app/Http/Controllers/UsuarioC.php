<?php

namespace App\Http\Controllers;

use App\UsuarioM;
use App\EnderecoM;
use App\EmpresaM;
use App\DadoM;
use Illuminate\Http\Request;

class UsuarioC extends Controller
{
  public $rota = array('rota' => 'usuario', 'titulo' => 'Usuários');

    public function index()    {
      $lista  = UsuarioM::ActAdm()->get();
      $titulo = 'Usuários';
      $rota   = 'usuario';

      return view('multi.list', compact('lista'),['rota' => $this->rota]);
    }

    public function create()    {
      $empresas  = EmpresaM::Act()->get();
      return view('multi.usuario', compact('empresas'));
    }

    public function store(Request $request)    {
      $pass   = str_random(8);

      $data   = $request->all();
      $data['password'] = bcrypt($pass);
      $id     = UsuarioM::create($data)->id_empresa;

      return redirect('mailsend/cadastrado/'.$data['email'].'/'.$pass.'/'.$data['empresa_id']);
    }

    public function show(UsuarioM $usuarioM)    {
        //
    }

    public function edit($id)    {
      $empresas = EmpresaM::Act()->get();
      $usuario  = UsuarioM::findOrFail($id);

      return view('multi.usuario', compact('usuario','empresas'));
    }

    public function update(Request $request, $id)    { //dd($request->all());
      $data = $request->all();
      $id   = UsuarioM::findOrFail($id);
      $id->update($data);

      if ($id->endereco_id){
        $idE  = EnderecoM::findOrFail($id->endereco_id);
        $idE->update($data);
      }
      if($id->dado_id){
        $idD  = DadoM::findOrFail($id->dado_id);
        $idD->update($data);
      }

      return redirect()->route('usuario.index')->with(['success' => 'Alterado com sucesso.']);
    }

    public function destroy($id)    {
      $id   = UsuarioM::findOrFail($id);
      $id->update(['status' => 0]);

      return redirect()->route('usuario.index')->with(['success' => 'Escluído com sucesso.']);
    }
}
