<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barbearias', function (Blueprint $table) {
            $table->uuid('id_barbearia')->primary();
            $table->string('nome')->max(100);
            $table->string('email')->unique();
            $table->string('endereco')->max(150);
            $table->string('telefone')->max(15);
            $table->time('horario_abertura');
            $table->time('horario_fechamento');
            $table->text('descricao');
            $table->string('foto_url')->nullable();
            $table->uuid('id_proprietario');
            $table->timestamps();

            $table->foreign('id_proprietario')
                  ->references('id_proprietario')
                  ->on('proprietarios')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barbearias');
    }
};
