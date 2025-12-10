<?php

namespace Database\Factories;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdministradorFactory extends Factory
{
    protected $model = Administrador::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'senha' => Hash::make('password'),
        ];
    }
}