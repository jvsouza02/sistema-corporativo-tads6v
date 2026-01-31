<?php

namespace Database\Factories;

use App\Models\Atendimento;
use App\Models\Barbearia;
use App\Models\Barbeiro;
use App\Models\Cliente;
use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AtendimentoFactory extends Factory
{
    protected $model = Atendimento::class;

    public function definition(): array
    {
        return [
            'id_atendimento' => Str::uuid(),
            'id_barbearia' => Barbearia::factory(),
            'id_barbeiro' => Barbeiro::factory(),
            'id_cliente' => Cliente::factory(),
            'id_agendamento' => null,
            'data_hora_inicio' => now(),
            'data_hora_fim' => now()->addHour(),
            'valor_total' => fake()->randomFloat(2, 20, 100),
            'status' => 'finalizado',
            'observacao' => fake()->sentence(),
        ];
    }

    public function comAgendamento(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'id_agendamento' => Agendamento::factory(),
        ]);
    }

    public function emAndamento(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'em_andamento',
            'data_hora_fim' => null,
        ]);
    }
}
