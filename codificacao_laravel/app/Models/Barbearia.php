<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Proprietario;
use App\Models\Barbeiro;
use App\Models\Atendimento;

class Barbearia extends Model
{
    protected $table = 'barbearias';
    protected $primaryKey = 'id_barbearia';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_barbearia',
        'nome',
        'email',
        'endereco',
        'telefone',
        'horario_abertura',
        'horario_fechamento',
        'descricao',
        'foto_url',
        'id_proprietario',
    ];

    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class, 'id_proprietario');
    }

    public function barbeiros()
    {
        return $this->hasMany(Barbeiro::class, 'id_barbearia');
    }

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class, 'id_barbearia');
    }
}
