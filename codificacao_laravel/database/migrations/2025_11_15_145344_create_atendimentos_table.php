<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
    Schema::create('atendimentos', function (Blueprint $table) {
        $table->uuid('id_atendimento')->primary();
        $table->string('servico');
        $table->string('produto')->nullable();
        $table->text('comentario')->nullable();
        $table->double('valor_total');
        $table->uuid('id_barbearia');
        $table->uuid('id_barbeiro');

        // Relacionamentos
        $table->foreign('id_barbearia')->references('id_barbearia')->on('barbearias')->onDelete('cascade');
        $table->foreign('id_barbeiro')->references('id_barbeiro')->on('barbeiros')->onDelete('cascade');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('atendimentos');
}
};
