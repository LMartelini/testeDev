<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Grupo;

class BandeiraFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->word, 
            'grupo_economico_id' => Grupo::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}