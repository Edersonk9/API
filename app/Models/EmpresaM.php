<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmpresaM extends ScopeM
{
  use Notifiable;
  protected $table = 'rji_empresas';
  protected $fillable = ['empresa', 'endereco_id','cod_vip','dado_id','status'];
  protected $primaryKey = 'id_empresa';

  public function endereco(){
    return $this->belongsTo('App\EnderecoM', 'endereco_id');
  }
  public function dado(){
    return $this->belongsTo('App\DadoM', 'dado_id');
  }
}
