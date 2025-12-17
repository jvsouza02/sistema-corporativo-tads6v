<?php

namespace Database\Factories;

use App\Models\Servico;
use App\Models\Barbearia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
    protected $model = Servico::class;

    public function definition(): array
    {
        return [
            // O id_servico será gerado automaticamente pelo boot() do modelo
            'id_barbearia' => Barbearia::factory(), // cria uma barbearia associada
            'nome' => $this->faker->words(2, true), // ex: "Corte Masculino"
            'descricao' => $this->faker->sentence(8), // texto curto
            'preco' => $this->faker->randomFloat(2, 20, 200), // preço entre 20 e 200
            'ativo' => $this->faker->boolean(90), // 90% de chance de vir ativo
        ];
    }

    /**
     * Estado para serviço inativo
     */
    public function inativo(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'ativo' => false,
        ]);
    }
}
