<?php

namespace Database\Factories;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Sala;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition(): array
    {
        $dataInicio = $this->faker->dateTimeBetween('now', '+30 days');
        $dataFim = (clone $dataInicio)->modify('+' . $this->faker->numberBetween(1, 4) . ' hours');

        return [
            'user_id' => User::factory(),
            'sala_id' => Sala::factory(),
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'finalidade' => $this->faker->randomElement([
                'Aula',
                'Reunião',
                'Apresentação',
                'Workshop',
                'Seminário',
                'Treinamento'
            ]),
            'status' => $this->faker->randomElement(['pendente', 'aprovada', 'rejeitada']),
            'observacoes' => $this->faker->optional()->sentence(),
        ];
    }
}