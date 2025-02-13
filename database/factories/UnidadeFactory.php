<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bandeira;

class UnidadeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome_fantasia' => $this->faker->company,
            'razao_social' => $this->faker->company,
            'cnpj' => $this->faker->unique()->numerify('##############'),
            'bandeira_id' => Bandeira::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}