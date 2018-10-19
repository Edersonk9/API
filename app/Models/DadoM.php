<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DadoM extends Model
{
  use Notifiable;
  protected $table = 'rji_dados';
  protected $fillable = ['razao', 'cnpj','telefone','ie','celular','img'];
  protected $primaryKey = 'id_dado';
}
