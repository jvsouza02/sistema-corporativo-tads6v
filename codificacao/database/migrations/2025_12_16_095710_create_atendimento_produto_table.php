<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('atendimento_produto', function (Blueprint $table) {
            $table->id();

            // FK para atendimento (assumindo PK uuid id_atendimento)
            $table->uuid('id_atendimento');
            $table->uuid('id_produto');

            // quantidade usada neste atendimento (aceita decimais)
            $table->decimal('quantidade', 10, 2)->default(0);

            // preço unitário no momento
            $table->decimal('valor_unitario', 10, 2)->default(0);

            // total = quantidade * valor_unitario
            $table->decimal('valor_total', 12, 2)->default(0);

            $table->timestamps();

            $table->foreign('id_atendimento')
                ->references('id_atendimento')
                ->on('atendimentos')
                ->onDelete('cascade');

            $table->foreign('id_produto')
                ->references('id_produto')
                ->on('produtos')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atendimento_produto');
    }
};
