<?php

namespace Database\Factories;

use App\Models\Atendimento;
use App\Models\Barbearia;
use App\Models\Barbeiro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AtendimentoFactory extends Factory
{
    protected $model = Atendimento::class;

    public function definition(): array
    {
        $servicos = ['Corte Social', 'Corte Navalhado', 'Corte Degradê', 'Barba', 'Sobrancelha'];
        $produtos = ['Nenhum', 'Shampoo', 'Pomada', 'Gel', 'Tônico'];

        return [
            'id_atendimento' => Str::uuid(),
            'servico' => fake()->randomElement($servicos),
            'produto' => fake()->randomElement($produtos),
            'comentario' => fake()->sentence(),
            'valor_total' => fake()->randomFloat(2, 20, 100),
            'id_barbearia' => Barbearia::factory(),
            'id_barbeiro' => Barbeiro::factory(),
        ];
    }
}
