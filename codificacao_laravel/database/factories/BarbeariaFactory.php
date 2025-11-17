<?php

namespace Database\Factories;

use App\Models\Barbearia;
use App\Models\Proprietario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BarbeariaFactory extends Factory
{
    protected $model = Barbearia::class;

    public function definition(): array
    {
        return [
            'id_barbearia' => Str::uuid(),
            'nome' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'endereco' => fake()->address(),
            'telefone' => fake()->phoneNumber(),
            'horario_abertura' => '08:00',
            'horario_fechamento' => '18:00',
            'descricao' => fake()->text(200),
            'foto_url' => 'uploads/default.jpg',
            'id_proprietario' => Proprietario::factory(),
        ];
    }
}
