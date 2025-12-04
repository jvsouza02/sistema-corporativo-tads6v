<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->string('id_agendamento')->primary();
            $table->dateTime('data_hora');
            $table->string('servico');
            $table->enum('status', ['agendado', 'concluido', 'cancelado'])->default('agendado');
            $table->text('observacao')->nullable();
            $table->string('id_cliente');
            $table->string('id_barbearia');
            $table->string('id_barbeiro')->nullable();
            $table->timestamps();
            
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_barbearia')->references('id_barbearia')->on('barbearias')->onDelete('cascade');
            $table->foreign('id_barbeiro')->references('id_barbeiro')->on('barbeiros')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
