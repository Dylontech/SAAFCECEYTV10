<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignDefaultRoleToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asigna el rol 'alumno' (o cualquier otro rol por defecto) a todos los usuarios existentes
        $defaultRoleId = DB::table('roles')->where('name', 'admin')->value('id');
        DB::table('usuarios')->update(['role_id' => $defaultRoleId]);
    }
}
