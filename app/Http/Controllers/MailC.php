<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\MailModel;
use App\Mail\SendMail;

class MailC extends Controller
{
  public function SendEmail(){
    $data = new MailModel;

    $data->nome       = 'teste22';
    $data->email      = 'teste@teste.com';
    $data->telefone   = '12345678';
    $data->assunto    = 'teste11';
    $data->mensagem   = 'teste teste';
    $data->titulo     = 'CONFIRMAÇÃO DE CADASTRO - SOGED';
    $data->info       = 'Parabéns. Você foi cadastrado para ter acesso ao site do SOGED.
    <p> Acesse através do link abaixo, utilize seu endereço de e-mail e a senha provisória para entrar.
    </p>';

    Mail::to('desenvolvimento06soitic@gmail.com')->send(new SendMail($data));
  }

  public function SendEmailCad($email, $senha, $empresa){
    $data = new MailModel;

    $data->nome       = 'https://www.google.com.br/';
    $data->email      = 'teste@teste.com';
    $data->titulo     = 'CONFIRMAÇÃO DE CADASTRO - '.config('app.name', 'SOITIC');
    $data->info       = 'Parabéns. Você foi cadastrado para ter acesso ao site do SOGED.
    Acesse através do link abaixo, utilize seu endereço de e-mail e a senha provisória para entrar.
    ';
    $data->Senha      = $senha;
    $data->empresa    = $empresa;
    $data->envio      = 'cadastro';

    if(Mail::to($email)->send(new SendMail($data))){
      return redirect()->route('usuario.index')->with(['success' => 'E-Mail foi enviado para o usuário.']);
      // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
      $log                = new Log;
      $log->id_empresa    = \Auth::user()->empresa_id;
      $log->id_user       = \Auth::id();
      $log->desc          = 'Envio, E-MAIL CAD'.$email;
      $log->save();
      // REGISTRO DE LOG REGISTRO DE LOG REGISTRO DE LOG //
    }else
        return redirect()->route('usuario.index')->with(['danger' => 'E-Mail não foi enviado.']);
  }
}
