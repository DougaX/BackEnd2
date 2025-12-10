<?php

namespace Database\Factories;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'departamento' => $this->faker->randomElement([
                'Ciência da Computação',
                'Engenharia de Software',
                'Sistemas de Informação',
                'Matemática',
                'Física',
                'Química'
            ]),
        ];
    }
}