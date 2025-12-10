<?php

namespace Database\Seeders;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Sala;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {
        // Criar algumas reservas de exemplo
        $users = User::all();
        $salas = Sala::all();

        if ($users->count() > 0 && $salas->count() > 0) {
            Reserva::factory(15)->create([
                'user_id' => $users->random()->id,
                'sala_id' => $salas->random()->id,
            ]);
        }
    }
}