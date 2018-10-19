<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EnderecoM extends Model
{
  use Notifiable;
  protected $table = 'rji_enderecos';
  protected $fillable = ['logradouro', 'cep','complemento','numero','uf','cidade','bairro'];
  protected $primaryKey = 'id_endereco';
}
