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

    public function assignRole(Request $request)
    {
        $user = Usuarios::find($request->input('user_id'));
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->back()->with('success', 'Rol asignado correctamente.');
    }
}