<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->uuid('id_estoque')->primary();
            $table->uuid('id_produto');
            $table->uuid('id_barbearia');
            $table->integer('quantidade')->default(0);
            $table->integer('quantidade_minima')->default(0)->nullable();
            $table->timestamps();

            $table->unique(['id_produto']);
            $table->foreign('id_produto')->references('id_produto')->onDelete('cascade')->on('produtos');
            $table->foreign('id_barbearia')->references('id_barbearia')->on('barbearias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
