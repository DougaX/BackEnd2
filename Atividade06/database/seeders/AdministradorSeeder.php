<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;

class AdministradorSeeder extends Seeder
{
    public function run(): void
    {
        Administrador::create([
            'nome' => 'Admin Geral',
            'email' => 'admin@universidade.com',
            'senha' => 'admin123'
        ]);

        Administrador::create([
            'nome' => 'Secretaria Acadêmica',
            'email' => 'secretaria@universidade.com',
            'senha' => 'secret123'
        ]);

        Administrador::create([
            'nome' => 'Coordenação',
            'email' => 'coordenacao@universidade.com',
            'senha' => 'coord123'
        ]);

        Administrador::create([
            'nome' => 'Diretoria',
            'email' => 'diretoria@universidade.com',
            'senha' => 'diretor123'
        ]);
    }
}