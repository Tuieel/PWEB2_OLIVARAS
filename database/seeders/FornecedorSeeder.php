<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fornecedor')->insert([
            [
                'nome' => 'Acme Varinhas',
                'material' => 'Núcleos mágicos',
                'materia_prima' => 'Floresta Negra',
            ],
            [
                'nome' => 'Materiais Mágicos Ltda.',
                'material' => 'Madeira encantada',
                'materia_prima' => 'Ilhas Britânicas',
            ],
        ]);
    }
}
