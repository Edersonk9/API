<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MensagemM extends ScopeM
{
  use Notifiable;

  protected $table = 'rji_mensagens';
  protected $fillable = ['titulo','vendedor_id','cliente_id','status','mensagem','contato'];
  protected $primaryKey = 'id_mensagem';

  public function cliente(){
    return $this->belongsTo('App\ClienteM', 'cliente_id');
  }

  public function vendedor(){
    return $this->belongsTo('App\VendedorM', 'vendedor_id');
  }
}
