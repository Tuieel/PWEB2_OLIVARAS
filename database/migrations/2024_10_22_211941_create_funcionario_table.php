<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('hierarquia');
            $table->decimal('salario', 10, 2);
            $table->integer('total_vendas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionario');
    }
};
