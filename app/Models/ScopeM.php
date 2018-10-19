<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ScopeM extends Model
{
  public function scopeAct($query){
    return $query->where('status', '>',0);
  }

  public function scopeActAdm($query){

    if(Auth::user()->empresa_id > 0)
    $query->where('empresa_id', Auth::user()->empresa_id);

    return $query->where('status', '>',0);
  }
}
