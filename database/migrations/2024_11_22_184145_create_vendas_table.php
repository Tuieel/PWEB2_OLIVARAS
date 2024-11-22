<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->id();
            $table->fornecedorid();
            $table->usuarioid();
            $table->date('datahoravenda');
            $table->int('valortotal');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venda');
    }
};
