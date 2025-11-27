<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;

class ProfessorSeeder extends Seeder
{
    public function run(): void
    {
        Professor::create([
            'nome' => 'Dr. João Silva',
            'email' => 'joao.silva@universidade.com',
            'departamento' => 'Computação'
        ]);

        Professor::create([
            'nome' => 'Dra. Maria Santos',
            'email' => 'maria.santos@universidade.com',
            'departamento' => 'Matemática'
        ]);

        Professor::create([
            'nome' => 'Dr. Carlos Oliveira',
            'email' => 'carlos.oliveira@universidade.com',
            'departamento' => 'Física'
        ]);

        Professor::create([
            'nome' => 'Dra. Ana Costa',
            'email' => 'ana.costa@universidade.com',
            'departamento' => 'Química'
        ]);

        Professor::create([
            'nome' => 'Dr. Pedro Almeida',
            'email' => 'pedro.almeida@universidade.com',
            'departamento' => 'Engenharia'
        ]);
    }
}