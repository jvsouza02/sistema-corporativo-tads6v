<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barbearia;
use App\Models\Estoque;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";
    protected $primaryKey = "id_produto";
    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = ['id_produto', 'nome', 'descricao', 'preco'];

    public function estoques()
    {
        return $this->hasMany(Estoque::class, 'id_produto');
    }

    public function barbearias()
    {
        return $this->belongsToMany(Barbearia::class, 'estoques')
                    ->withPivot('quantidade', 'quantidade_minima')
                    ->withTimestamps();
    }
}
