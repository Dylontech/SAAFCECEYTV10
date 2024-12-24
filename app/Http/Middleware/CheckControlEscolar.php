<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckControlEscolar
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->User_tipo == 'control_escolar') {
            return $next($request);
        }

        return redirect('/home');
    }
}