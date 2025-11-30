<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barbearia;
use App\Models\Produto;

class Estoque extends Model
{
    use HasFactory;

    protected $table = "estoques";
    protected $primaryKey = "id_estoque";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = [
        'id_estoque',
        'id_produto',
        'id_barbearia',
        'quantidade',
        'quantidade_minima',
    ];

    public function barbearia()
    {
        return $this->belongsTo(Barbearia::class, 'id_barbearia');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    public function estoqueAbaixoDoMinimo(): bool
    {
        return $this->quantidade < $this->quantidade_minima;
    }
}
