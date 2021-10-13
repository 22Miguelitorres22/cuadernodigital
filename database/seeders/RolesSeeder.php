<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Genero los roles
        $rolDirectivo = Role::create(['name' => 'Directivo']);
        $rolDocente = Role::create(['name' => 'Docente']);
        $rolMadrePadreTutor = Role::create(['name' => 'Madre-Padre-Tutor']);
        $rolAlumno = Role::create(['name' => 'Alumno']);
    }
}
