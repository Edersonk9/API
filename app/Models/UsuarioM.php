<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UsuarioM extends ScopeM
{
  use Notifiable;
  protected $table = 'users';
  protected $fillable = ['name','endereco_id','email','dado_id','status','tipo','password'];
  protected $primaryKey = 'id';

  public function endereco(){
    return $this->belongsTo('App\EnderecoM', 'endereco_id');
  }

  public function dado(){
    return $this->belongsTo('App\DadoM', 'dado_id');
  }
}
