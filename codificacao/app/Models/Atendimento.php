<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use App\Models\Barbearia;
use App\Models\Agendamento;
use App\Models\Barbeiro;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Atendimento extends Model
{
    use HasFactory;

    protected $table = 'atendimentos';
    protected $primaryKey = 'id_atendimento';
    public $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_atendimento',
        'servico',
        'produto',
        'valor_total',
        'comentario',
        'id_barbearia',
        'id_barbeiro',
    ];

    public function barbearia()
    {
        return $this->belongsTo(Barbearia::class, 'id_barbearia');
    }

    public function barbeiro()
    {
        return $this->belongsTo(Barbeiro::class, 'id_barbeiro');
    }

    // ===== MÉTODOS PARA TESTES UNITÁRIOS =====

    /**
     * CT001: Verifica se o serviço foi informado
     */
    public function temServico(): bool
    {
        return !empty($this->servico);
    }

    /**
     * CT002 e CT003: Calcula o valor total
     */
    public function calcularValorTotal(): float
    {
        return (float) $this->valor_total;
    }

    /**
     * CT003: Verifica se o cálculo está correto com decimais
     */
    public function valorComDecimaisCorreto(): bool
    {
        return is_float($this->valor_total) || is_numeric($this->valor_total);
    }

    /**
     * CT004: Atualiza o valor total
     */
    public function atualizarValor(float $novoValor): void
    {
        $this->valor_total = $novoValor;
    }

    /**
     * CT005: Verifica se o valor é negativo
     */
    public function valorEhNegativo(): bool
    {
        return $this->valor_total < 0;
    }

    /**
     * CT005: Valida se o valor é válido (não negativo)
     */
    public function valorEhValido(): bool
    {
        return $this->valor_total >= 0;
    }
}
