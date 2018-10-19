<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SessionM extends Model
{
  use Notifiable;

  protected $table = 'rji_session';
  protected $fillable = ['token','user_id'];
  protected $primaryKey = 'id_session';

}
