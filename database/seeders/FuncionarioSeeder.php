<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('funcionario')->insert([
            [
                'nome' => 'Alvo Dumbledore',
                'hierarquia' => 'Gerente',
                'salario' => 10000.00,
                'total_vendas' => 200,
            ],
            [
                'nome' => 'Minerva McGonagall',
                'hierarquia' => 'Supervisora',
                'salario' => 8000.00,
                'total_vendas' => 150,
            ],

        ]);
    }
}
