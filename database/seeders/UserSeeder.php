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
            'name' => 'Lucas Carnero',
            'email' => 'desarrollo@lucascarnero.com.ar',
            'username' => 'lcarnero',
            'password' => Hash::make('abc123')
        ]);


        $rolDirectivo = Role::findByName('Directivo');

        $user->assignRole($rolDirectivo);
    }
}
