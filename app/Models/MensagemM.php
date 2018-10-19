<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MensagemM extends ScopeM
{
  use Notifiable;

  protected $table = 'rji_mensagens';
  protected $fillable = ['titulo','vendedor_id','cliente_id','status_mensagens','mensagem_id',
                        'mensagem','dt_contato','contato'];
  protected $primaryKey = 'id_mensagem';

  public function cliente(){
    return $this->belongsTo('App\Models\ClienteM', 'cliente_id');
  }

  public function vendedor(){
    return $this->belongsTo('App\Models\VendedorM', 'vendedor_id');
  }
}
