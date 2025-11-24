<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Barbearia;
use App\Models\User;

class Proprietario extends Model
{
    use HasFactory;

    protected $table = 'proprietarios';
    protected $primaryKey = 'id_proprietario';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id_proprietario',
        'nome',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barbearias()
    {
        return $this->hasMany(Barbearia::class);
    }
}
