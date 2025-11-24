<?php

namespace Database\Factories;

use App\Models\Proprietario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProprietarioFactory extends Factory
{
    protected $model = Proprietario::class;

    public function definition(): array
    {
        return [
            'id_proprietario' => Str::uuid(),
            'nome' => fake()->name(),
            'user_id' => User::factory()->proprietario(),
        ];
    }
}
