<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Eliminar usuarios con correos específicos antes de sembrar nuevos
        User::where('email', 'like', '%@example.com')->delete(); // Elimina todos los usuarios con emails que terminan en @example.com


        User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('admin'), // Asegúrate de encriptar la contraseña
            'role' => 'admin'
        ]);

        // Create a moderator user if not exists
        User::firstOrCreate([
            'email' => 'moderator@example.com'
        ], [
            'name' => 'Moderator',
            'password' => bcrypt('moderator'),
            'role' => 'moderator'
        ]);

        // Create 10 regular users
        User::factory()->user()->count(10)->create();
    }
}
