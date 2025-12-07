<?php
// app/Models/Servico.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';
    protected $primaryKey = 'id_servico';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_servico',
        'id_barbearia',
        'nome',
        'descricao',
        'preco',
        'ativo',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'ativo' => 'boolean',
    ];

    // Gera UUID automaticamente ao criar
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id_servico)) {
                $model->id_servico = (string) Str::uuid();
            }
        });
    }

    // Relacionamento: Um serviço pertence a uma barbearia
    public function barbearia()
    {
        return $this->belongsTo(Barbearia::class, 'id_barbearia', 'id_barbearia');
    }

    // Relacionamento Many-to-Many: Um serviço pode ter vários produtos
    public function produtos()
    {
        return $this->belongsToMany(
            Produto::class,
            'servico_produto',
            'id_servico',
            'id_produto'
        )->withTimestamps();
    }

    // Relacionamento: Um serviço pode estar em vários atendimentos
    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class, 'id_servico', 'id_servico');
    }

    // Método auxiliar: Verifica se o serviço está sendo usado em atendimentos
    public function temAtendimentos(): bool
    {
        return $this->atendimentos()->exists();
    }

    // Método auxiliar: Retorna preço formatado
    public function getPrecoFormatadoAttribute(): string
    {
        return 'R$ ' . number_format((float) $this->preco, 2, ',', '.');
    }
}
