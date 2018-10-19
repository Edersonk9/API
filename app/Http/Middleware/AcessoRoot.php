<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AcessoRoot
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->empresa_id == 0 && Auth::user()->tipo == 1) {
            return $next($request);
        }

        return redirect('/home');
    }
}
