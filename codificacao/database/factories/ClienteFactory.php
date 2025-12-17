<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_cliente' => Str::uuid(),
            'nome' => $this->faker->name(),
            'user_id' => User::factory(),
        ];
    }

}
