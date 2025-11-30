<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Atendimento;
use App\Models\User;
use App\Models\Barbearia;

class Barbeiro extends Model
{
    use HasFactory;

    protected $table = 'barbeiros';
    protected $primaryKey = 'id_barbeiro';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_barbeiro',
        'nome',
        'horario_inicio',
        'horario_fim',
        'id_barbearia',
        'user_id'
    ];

    public function barbearia()
    {
        return $this->belongsTo(Barbearia::class, 'id_barbearia');
    }

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class, 'id_barbeiro');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
