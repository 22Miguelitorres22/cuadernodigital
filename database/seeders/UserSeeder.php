<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Miguel Torres',
            'email' => 'migueltorres@gmail.com',
            'username' => 'mtorres',
            'password' => Hash::make('abc123')
        ]);


        $rolDirectivo = Role::findByName('Directivo');
        $user->assignRole($rolDirectivo);


        $otroUser = User::factory()->create([
            'name' => 'Juan Topo',
            'email' => 'jtopo@gmail.com',
            'username' => 'jtopo',
            'password' => Hash::make('abc123')
        ]);

        $rolAlumno = Role::findByName('Alumno');
        $otroUser->assignRole($rolAlumno);
    }
}
