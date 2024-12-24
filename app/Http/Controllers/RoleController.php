<?php
// filepath: /d:/Archivos/laravel 10/saafceceyt/app/Http/Controllers/RoleController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Usuarios;

class RoleController extends Controller
{
    public function showAssignRolesForm()
    {
        $users = Usuarios::all();
        $roles = Role::all();
        return view('auth.AsignarRoles', compact('users', 'roles'));
    }
    
        public function edit($id)
        {
            $user = Usuarios::findOrFail($id);
            $roles = Role::all();
            return view('usuarios.edit', compact('user', 'roles'));
        }
       

    public function update(Request $request, $id)
    {
        $user = Usuarios::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('asignar.roles.form')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = Usuarios::findOrFail($id);
        $user->delete();

        return redirect()->route('asignar.roles.form')->with('success', 'Usuario eliminado correctamente.');
    }

    public function assignRole(Request $request)
    {
        $user = Usuarios::find($request->input('user_id'));
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->back()->with('success', 'Rol asignado correctamente.');
    }
}