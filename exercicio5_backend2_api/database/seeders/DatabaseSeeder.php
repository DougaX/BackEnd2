<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Criar usuário admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Criar usuário professor
        User::create([
            'name' => 'Professor Teste',
            'email' => 'professor@example.com',
            'password' => Hash::make('password'),
            'role' => 'professor',
        ]);

        // Criar usuário comum
        User::create([
            'name' => 'Usuário Comum',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $this->call([
            ProfessorSeeder::class,
            AdministradorSeeder::class,
            SalaSeeder::class,
        ]);
    }
}