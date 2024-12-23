<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'control_escolar', 'departamento_financiero', 'alumno'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
