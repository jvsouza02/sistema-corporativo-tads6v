<?php
// database/migrations/xxxx_create_atendimento_servico_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('atendimento_servico', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_atendimento');
            $table->uuid('id_servico');
            $table->decimal('valor_cobrado', 10, 2);
            $table->timestamps();

            $table->foreign('id_atendimento')->references('id_atendimento')->on('atendimentos')->onDelete('cascade');
            $table->foreign('id_servico')->references('id_servico')->on('servicos')->onDelete('cascade');
        });


    }

    public function down(): void
    {
        Schema::dropIfExists('atendimento_servico');
    }
};
