<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    /** @use HasFactory<\Database\Factories\AgendamentoFactory> */
    use HasFactory;

    protected $table = 'agendamentos';
    protected $primaryKey = 'id_agendamento';
    public $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'id_agendamento',
        'data_hora',
        'servico',
        'status',
        'observacao',
        'id_cliente',
        'id_barbearia',
        'id_barbeiro'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
    
    public function barbearia()
    {
        return $this->belongsTo(Barbearia::class, 'id_barbearia');
    }
    
    public function barbeiro()
    {
        return $this->belongsTo(Barbeiro::class, 'id_barbeiro');
    }
}
