<?php

namespace App\Http\Controllers;

use App\EmpresaM;
use App\UsuarioM;
use App\EnderecoM;
use App\DadoM;
use Illuminate\Http\Request;

class PerfilC extends Controller
{
  public function index()    {
    $usuario    = UsuarioM::find(\Auth::id());
    return view('multi.perfil', compact('usuario'));
  }

  public function create()    {
    $empresa    = EmpresaM::find(\Auth::user()->empresa_id);
    return view('multi.perfil', compact('empresa'));
  }

  public function store(Request $request)    {
    $data = $request->all();

    $img        = $request->file('image');
    $pasta      = 'empresas/perfil/';
    $filename   = $pasta.$data['id_dado'].'.'.$img->getClientOriginalExtension();

    Storage::disk('s3')->delete($filename);
    $s3         = Storage::disk('s3')->put($pasta, $img, 'public');
    Storage::disk('s3')->move($s3, $filename);
    Storage::disk('s3')->delete($s3);
    // 'public' = Colocar isso caso o arquivo seja acessado de outros lugares

    $idD        = DadoM::find($data['id_dado']);
    $idD->img   = $filename;
    $idD->update();
    // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
    /*
    $log                = new Log;
    $log->id_empresa    = \Auth::user()->empresa_id;
    $log->id_user       = \Auth::id();
    $log->empresa_id    = $idU->id_empresa;
    $log->desc          = 'Alterado, IMG.S3';
    $log->save();
    */
    // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
    return  back()->withInput()->with(['success' => 'Alterado com sucesso.']);
  }

  public function update(Request $request, $id)    {
    $data = $request->all();
    if($data == 'usuario'){
      $idEmp = UsuarioM::findOrFail($id);
      $idEnd = EnderecoM::findOrFail($idEmp->endereco_id);
      $idDad = DadoM::findOrFail($idEmp->dado_id);
    }else {
      $idEmp = EmpresaM::findOrFail($id);
      $idEnd = EnderecoM::findOrFail($idEmp->endereco_id);
      $idDad = DadoM::findOrFail($idEmp->dado_id);
    }

    $idEmp->update($data);
    $idEnd->update($data);
    $idDad->update($data);
    // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
    /*
    $log                = new Log;
    $log->id_empresa    = \Auth::user()->empresa_id;
    $log->id_user       = \Auth::id();
    $log->empresa_id    = $id;
    $log->desc          = 'Alterado, EMP + END';
    $log->save();
    // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
    */
    return  back()->withInput()->with(['success' => 'Alterado com sucesso.']);
  }
}
