<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class UsuarioController extends Controller
{
    public function showAltaUsuariosForm()
    {
        return view('usuarios.altausuarios');
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
            'role_id' => $data['role_id'] ?? 1,
        ]);
    }

    // Métodos para editar, actualizar y eliminar usuarios
    public function edit($id)
    {
        $user = Usuarios::findOrFail($id);
        $roles = Role::all();
        return view('usuarios.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = Usuarios::findOrFail($id);

        $data = $request->all();
        if (!empty($data['User_pass'])) {
            $data['User_pass'] = Hash::make($data['User_pass']);
        } else {
            unset($data['User_pass']);
        }

        $user->update($data);

        return redirect()->route('asignar.roles.form')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = Usuarios::findOrFail($id);
        $user->delete();

        return redirect()->route('asignar.roles.form')->with('success', 'Usuario eliminado correctamente.');
    }
}