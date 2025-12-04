<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servico_produto', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_servico');
            $table->uuid('id_produto');
            $table->timestamps();

            $table->foreign('id_servico')
                  ->references('id_servico')
                  ->on('servicos')
                  ->onDelete('cascade');

            $table->foreign('id_produto')
                  ->references('id_produto')
                  ->on('produtos')
                  ->onDelete('cascade');

            $table->unique(['id_servico', 'id_produto']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servico_produto');
    }
};
