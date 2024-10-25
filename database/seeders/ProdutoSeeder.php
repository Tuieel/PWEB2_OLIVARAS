<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produto')->insert([
            [
                'nome_varinha' => 'Varinha de Carvalho',
                'flexibilidade' => 'Rígida',
                'nucleo' => 'Pena de Fênix',
                'tipo_madeira' => 'Carvalho',
            ],
            [
                'nome_varinha' => 'Varinha de Álamo',
                'flexibilidade' => 'Flexível',
                'nucleo' => 'Cabelo de Veela',
                'tipo_madeira' => 'Álamo',
            ],
        ]);
    }
}
