<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Barbearia;
use App\Models\Barbeiro;

class Atendimento extends Model
{
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
}
