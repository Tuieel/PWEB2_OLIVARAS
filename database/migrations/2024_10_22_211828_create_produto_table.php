<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome_varinha');
            $table->string('flexibilidade');
            $table->string('nucleo');
            $table->string('tipo_madeira');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};