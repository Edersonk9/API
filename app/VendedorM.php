<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VendedorM extends ScopeM
{
  use Notifiable;

  protected $table = 'rji_vendedores';
  protected $fillable = ['vendedor','user_id','empresa_id','status','endereco_id','dado_id'];
  protected $primaryKey = 'id_vendedor';

  public function usuario(){
    return $this->belongsTo('App\UsuarioM', 'user_id');
  }
  public function endereco(){
    return $this->belongsTo('App\EnderecoM', 'endereco_id');
  }
  public function dado(){
    return $this->belongsTo('App\DadoM', 'dado_id');
  }
}
