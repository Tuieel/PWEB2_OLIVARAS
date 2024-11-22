<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itensvenda', function (Blueprint $table) {
            $table->id();
            $table->idproduto();
            $table->idvendas();
            $table->int('quantidade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itensvenda');
    }
};
