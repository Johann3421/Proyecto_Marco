<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario administrador
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@unmsm.edu.pe',
            'password' => Hash::make('password'), // Cambiar en producción
        ]);

        // Crear usuario de prueba
        User::factory()->create([
            'name' => 'Usuario Demo',
            'email' => 'demo@unmsm.edu.pe',
            'password' => Hash::make('password'),
        ]);

        // Crear usuarios adicionales de prueba
        // User::factory(10)->create();
    }
}

