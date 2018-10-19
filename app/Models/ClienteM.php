<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClienteM extends ScopeM
{
  use Notifiable;

  protected $table = 'rji_clientes';
  protected $fillable = ['cliente','user_id','empresa_id','status','email','dado_id','endereco_id'];
  protected $primaryKey = 'id_cliente';

  public function endereco(){
    return $this->belongsTo('App\EnderecoM', 'endereco_id');
  }
  public function dado(){
    return $this->belongsTo('App\DadoM', 'dado_id');
  }
}
