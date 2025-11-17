<?php

namespace Database\Factories;

use App\Models\Barbeiro;
use App\Models\Barbearia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BarbeiroFactory extends Factory
{
    protected $model = Barbeiro::class;

    public function definition(): array
    {
        return [
            'id_barbeiro' => Str::uuid(),
            'nome' => fake()->name(),
            'horario_inicio' => '08:00',
            'horario_fim' => '17:00',
            'id_barbearia' => Barbearia::factory(),
            'user_id' => User::factory()->barbeiro(),
        ];
    }
}
