<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAlumnoView
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->User_tipo == 'alumno') {
            return $next($request);
        }

        return redirect('/home');
    }
}