<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->uuid('id_atendimento')->primary();

            $table->uuid('id_barbearia');
            $table->uuid('id_agendamento')->nullable();
            $table->uuid('id_cliente')->nullable();
            $table->uuid('id_barbeiro');

            $table->dateTime('data_hora_inicio')->useCurrent();
            $table->dateTime('data_hora_fim')->nullable();

            $table->decimal('valor_total', 10, 2)->default(0);

            $table->string('status')->default('finalizado');

            $table->text('observacao')->nullable();

            $table->timestamps();

            $table->foreign('id_barbearia')
                ->references('id_barbearia')
                ->on('barbearias')
                ->onDelete('cascade');

            $table->foreign('id_agendamento')
                ->references('id_agendamento')
                ->on('agendamentos')
                ->onDelete('set null');

            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
                ->onDelete('cascade');

            $table->foreign('id_barbeiro')
                ->references('id_barbeiro')
                ->on('barbeiros')
                ->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
