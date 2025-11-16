<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barbeiros', function (Blueprint $table) {
            $table->uuid('id_barbeiro')->primary();
            $table->string('nome');
            $table->time('horario_inicio');
            $table->time('horario_fim');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->uuid('id_barbearia');
            $table->timestamps();

            $table->foreign('id_barbearia')->references('id_barbearia')->on('barbearias')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profissionais');
    }
};
