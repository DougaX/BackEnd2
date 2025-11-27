<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sala;

class SalaSeeder extends Seeder
{
    public function run(): void
    {
        Sala::create([
            'nome' => 'Laboratório de Informática 1',
            'capacidade' => 40,
            'localizacao' => 'Bloco A - 1º Andar'
        ]);

        Sala::create([
            'nome' => 'Laboratório de Informática 2',
            'capacidade' => 35,
            'localizacao' => 'Bloco A - 2º Andar'
        ]);

        Sala::create([
            'nome' => 'Sala de Aula 101',
            'capacidade' => 50,
            'localizacao' => 'Bloco B - 1º Andar'
        ]);

        Sala::create([
            'nome' => 'Sala de Aula 201',
            'capacidade' => 45,
            'localizacao' => 'Bloco B - 2º Andar'
        ]);

        Sala::create([
            'nome' => 'Auditório Principal',
            'capacidade' => 200,
            'localizacao' => 'Bloco C - Térreo'
        ]);

        Sala::create([
            'nome' => 'Laboratório de Química',
            'capacidade' => 30,
            'localizacao' => 'Bloco D - 1º Andar'
        ]);

        Sala::create([
            'nome' => 'Sala de Reuniões',
            'capacidade' => 20,
            'localizacao' => 'Bloco A - 3º Andar'
        ]);
    }
}