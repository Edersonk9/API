<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VendedorM extends Model
{
  use Notifiable;

  protected $table = 'rji_vendedores';
  protected $fillable = ['vendedor','user_id','empresa_id','status'];
  protected $primaryKey = 'id_vendedor';

  public function usuario(){
    return $this->belongsTo('App\Models\UsuarioM', 'user_id');
  }
}
