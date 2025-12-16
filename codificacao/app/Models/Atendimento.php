<?php
// app/Models/Atendimento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Atendimento extends Model
{
    use HasFactory;

    protected $table = 'atendimentos';
    protected $primaryKey = 'id_atendimento';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_atendimento',
        'id_agendamento',
        'id_barbearia',
        'id_cliente',
        'id_barbeiro',
        'data_hora_inicio',
        'data_hora_fim',
        'valor_total',
        'status',
        'observacao',
    ];

    protected $casts = [
        'data_hora_inicio' => 'datetime',
        'data_hora_fim' => 'datetime',
        'valor_total' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id_atendimento)) {
                $model->id_atendimento = (string) Str::uuid();
            }
        });
    }

    // ==================== RELACIONAMENTOS ====================

    public function agendamento()
    {
        return $this->belongsTo(Agendamento::class, 'id_agendamento', 'id_agendamento');
    }

    public function barbearia()
    {
        return $this->belongsTo(Barbearia::class, 'id_barbearia', 'id_barbearia');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function barbeiro()
    {
        return $this->belongsTo(Barbeiro::class, 'id_barbeiro', 'id_barbeiro');
    }

    // Serviços realizados no atendimento
    public function servicos()
    {
        return $this->belongsToMany(
            Servico::class,
            'atendimento_servico',
            'id_atendimento',
            'id_servico'
        )->withPivot('valor_cobrado')
          ->withTimestamps();
    }

    // ==================== ATRIBUTOS COMPUTADOS ====================

    /**
     * Retorna todos os produtos utilizados neste atendimento
     * (através dos serviços realizados)
     */

    /**
     * Retorna a lista de nomes dos serviços realizados
     */
    public function getServicosNomesAttribute()
    {
        return $this->servicos->pluck('nome')->implode(', ');
    }

    /**
     * Retorna a duração do atendimento em minutos
     */
    public function getDuracaoAttribute()
    {
        if ($this->data_hora_inicio && $this->data_hora_fim) {
            return $this->data_hora_inicio->diffInMinutes($this->data_hora_fim);
        }
        return null;
    }

    // ==================== MÉTODOS AUXILIARES ====================

    public function temServico(): bool
    {
        return $this->servicos()->count() > 0;
    }

    public function calcularValorTotal(): float
    {
        return (float) $this->valor_total;
    }

    public function valorComDecimaisCorreto(): bool
    {
        return is_float($this->valor_total) || is_numeric($this->valor_total);
    }

    public function atualizarValor(float $novoValor): void
    {
        $this->valor_total = $novoValor;
        $this->save();
    }

    public function valorEhNegativo(): bool
    {
        return $this->valor_total < 0;
    }

    public function valorEhValido(): bool
    {
        return $this->valor_total >= 0;
    }

    /**
     * Verifica se o atendimento está finalizado
     */
    public function estaFinalizado(): bool
    {
        return $this->status === 'finalizado';
    }

    /**
     * Verifica se o atendimento está em andamento
     */
    public function estaEmAndamento(): bool
    {
        return $this->status === 'em_andamento';
    }

    public function produtosUtilizados()
    {
        return $this->belongsToMany(
            Produto::class,
            'atendimento_produto',
            'id_atendimento',
            'id_produto'
        )->withPivot([
            'quantidade',
            'valor_unitario',
            'valor_total',
        ])->withTimestamps();
    }
}
