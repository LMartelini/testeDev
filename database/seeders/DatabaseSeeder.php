<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;
use App\Models\Bandeira;
use App\Models\Unidade;
use App\Models\Colaborador;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Grupo::factory()
            ->count(5) 
            ->has(
                Bandeira::factory()
                    ->count(3)
                    ->has(
                        Unidade::factory()
                            ->count(2)
                            ->has(
                                Colaborador::factory()
                                    ->count(5),
                                    'colaboradores'
                            )
                    )
            )
            ->create();
    }
}