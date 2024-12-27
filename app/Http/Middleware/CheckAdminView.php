<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminView
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->User_tipo == 'admin') {
            return $next($request);
        }

        return redirect('/home');
    }
}