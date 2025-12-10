<?php

namespace Database\Factories;

use App\Models\Sala;
use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaFactory extends Factory
{
    protected $model = Sala::class;

    public function definition(): array
    {
        return [
            'nome' => 'Sala ' . $this->faker->numberBetween(100, 999),
            'capacidade' => $this->faker->numberBetween(20, 100),
            'localizacao' => $this->faker->randomElement([
                'Bloco A - 1º Andar',
                'Bloco A - 2º Andar',
                'Bloco B - 1º Andar',
                'Bloco B - 2º Andar',
                'Bloco C - 1º Andar',
                'Bloco C - 2º Andar'
            ]),
        ];
    }
}