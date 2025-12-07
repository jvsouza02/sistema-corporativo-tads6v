<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->uuid('id_agendamento')->primary();
            $table->uuid('id_barbearia');
            $table->uuid('id_cliente');
            $table->uuid('id_barbeiro')->nullable();
            $table->dateTime('data_hora');
            $table->string('status')->default('pendente'); // pendente, confirmado, cancelado...
            $table->timestamps();

            $table->foreign('id_barbearia')
                ->references('id_barbearia')->on('barbearias')
                ->onDelete('cascade');

            // Se seu cliente NÃO for a tabela users, ajuste aqui
            $table->foreign('id_cliente')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('id_barbeiro')
                ->references('id_barbeiro')->on('barbeiros')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
