<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRolesSeeder extends Seeder
{
    public function run()
    {
        // Asignar rol de 'administrador' al primer usuario
        $admin = User::find(1);
        if ($admin) {
            $admin->assignRole('administrador');
        }

        // Asignar rol de 'secretaria' al segundo usuario
        $secretaria = User::find(2);
        if ($secretaria) {
            $secretaria->assignRole('secretaria');
        }

        // Asignar rol de 'medico' al tercer usuario
        $medico = User::find(3);
        if ($medico) {
            $medico->assignRole('medico');
        }

        // Asignar rol de 'paciente' al cuarto usuario
        $paciente = User::find(4);
        if ($paciente) {
            $paciente->assignRole('paciente');
        }
    }
}

