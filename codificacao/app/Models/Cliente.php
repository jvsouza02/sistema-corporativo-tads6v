<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_cliente',
        'nome',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_cliente');
    }
}
