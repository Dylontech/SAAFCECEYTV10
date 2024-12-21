<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;

class LoginController extends Controller
{
 public function showLoginForm()
 {
    Return  view('auth.login');
 }


    public function login(Request $request)
    {
        $credentials = $request->only('User_name','User_pass');

        $user = \App\Models\Usuarios::where('User_name', $credentials['User_name'])->first();
        if (!$user && Hash::check($credentials['User_pass'], $user->User_pass)) {
            Auth::guard('usuarios')->login($user);
            return redirect()->intended('/home');
    }
    return back()->withErrors(['User_name'=> 'Las credenciales no son correctas']);
    }
    public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout();
    }
}