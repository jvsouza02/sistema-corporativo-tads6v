<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Barbearia;
use App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_agendamento' => Str::uuid(),
            'id_barbearia' => Barbearia::factory(),
            'id_cliente' => Cliente::factory(),
            'data_hora' => now()->addDay(),
            'servico' => 'Corte de cabelo',
            'status' => 'agendado',
        ];
    }

}
