<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';
    protected $primaryKey = 'id_agendamento';
    public $keyType = 'string';
    public $incrementing = false;

    // Libera todos os campos que realmente existem na tabela,
    // inclusive "servico"
    protected $fillable = [
        'id_agendamento',
        'id_barbearia',
        'id_cliente',
        'id_barbeiro',
        'data_hora',
        'status',
        'servico',
        'produto',
        'valor_total',
        'comentario',
    ];

    protected $casts = [
        'data_hora' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Gera UUID se ainda não tiver
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // RELACIONAMENTOS BÁSICOS (ajusta se tiver outros nomes de model)

    public function barbearia()
    {
        return $this->belongsTo(Barbearia::class, 'id_barbearia', 'id_barbearia');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente', 'id_cliente');
    }

    public function barbeiro()
    {
        return $this->belongsTo(Barbeiro::class, 'id_barbeiro', 'id_barbeiro');
    }
}
