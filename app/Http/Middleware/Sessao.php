<?php

namespace App\Http\Middleware;

use Closure;
use App\SessionM;

class Sessao
{
    public function handle($request, Closure $next)
    {
        if(SessionM::where('token',$request['token'])->count() == 1){
            return $next($request);
        }return response()->json(['status'=>false,'msn'=>'ERROR_Parametros_NULL.'],200);
    }
}
