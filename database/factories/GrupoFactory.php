<?php

namespace Database\Factories;

use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoFactory extends Factory
{
    protected $model = Grupo::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company, 
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}