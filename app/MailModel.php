<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{
  protected $nome       = '';
  protected $email      = '';
  protected $telefone   = '';
  protected $assunto    = '';
  protected $mensagem   = '';
  protected $titulo     = '';
  protected $info       = '';
  protected $senha      = '';
  protected $empresa    = '';
  protected $arquivo    = '';
  protected $anexo      = '';  
}
