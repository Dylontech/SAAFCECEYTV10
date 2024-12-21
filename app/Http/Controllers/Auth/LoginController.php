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
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validamos las credenciales del usuario
        $request->validate([
            'User_name' => 'required|string',
            'User_pass' => 'required|string',
        ]);

        // Obtenemos las credenciales del formulario
        $credentials = $request->only('User_name', 'User_pass');

        // Intentamos encontrar al usuario
        $user = Usuarios::where('User_name', $credentials['User_name'])->first();

        // Verificamos si el usuario existe y si la contraseña coincide
        if ($user && Hash::check($credentials['User_pass'], $user->User_pass)) {
            // Si la verificación es correcta, iniciamos sesión
            Auth::login($user);
            return redirect()->intended('/home'); // Redirige a la página deseada
        }

        // Si las credenciales no son correctas, mostramos un error
        return back()->withErrors(['User_name' => 'Las credenciales no son correctas']);
    }

    public function logout(Request $request)
    {
        // Cerramos sesión del usuario
        Auth::logout();
        return redirect('/login'); // Redirigimos a la página de login después del logout
    }
}