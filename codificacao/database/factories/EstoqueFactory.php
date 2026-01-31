<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Estoque;
use App\Models\Produto;
use App\Models\Barbearia;

class EstoqueFactory extends Factory
{
    protected $model = Estoque::class;

    public function definition(): array
    {
        return [
            'id_estoque' => (string) Str::uuid(),
            'id_barbearia' => Barbearia::factory(),
            'id_produto' => Produto::factory(),
            'quantidade' => $this->faker->numberBetween(0, 50),
            'quantidade_minima' => 0,
        ];
    }
}
