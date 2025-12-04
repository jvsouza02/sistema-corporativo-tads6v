<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->uuid('id_servico')->primary();
            $table->uuid('id_barbearia');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2);
            $table->boolean('ativo')->default(true);
            $table->timestamps();

            $table->foreign('id_barbearia')
                  ->references('id_barbearia')
                  ->on('barbearias')
                  ->onDelete('cascade');

            $table->index('id_barbearia');
            $table->index('nome');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
