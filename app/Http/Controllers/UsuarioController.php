<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function showAltaUsuariosForm()
    {
        if (Auth::user()->User_tipo != 'admin') {
            return redirect('/home');
        }

        return view('auth.altausuarios');
    }

    public function altaUsuarios(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        return redirect('/home')->with('status', 'Usuario registrado exitosamente');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'User_name' => ['required', 'string', 'max:255', 'unique:usuarios'],
            'User_tipo' => ['required', 'string', 'max:255'],
            'User_pass' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Usuarios::create([
            'name' => $data['name'],
            'User_name' => $data['User_name'],
            'User_tipo' => $data['User_tipo'],
            'User_pass' => Hash::make($data['User_pass']),
        ]);
    }
}