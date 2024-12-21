<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'User_name' => ['required', 'string', 'max:255', 'unique:usuarios'],
            'User_tipo' => ['required', 'string', 'max:255'],
            'User_pass' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'User_name.required' => 'El nombre de usuario es obligatorio.',
            'User_name.unique' => 'Este nombre de usuario ya está en uso.',
            'User_tipo.required' => 'El tipo de usuario es obligatorio.',
            'User_pass.required' => 'La contraseña es obligatoria.',
            'User_pass.confirmed' => 'Las contraseñas no coinciden.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Usuarios
     */
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