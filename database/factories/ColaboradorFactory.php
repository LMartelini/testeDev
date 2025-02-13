<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unidade;

class ColaboradorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'unidade_id' => Unidade::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}