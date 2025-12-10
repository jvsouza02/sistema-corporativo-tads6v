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
    protected $fillable = ['id_produto', 'nome', 'descricao', 'preco', 'unidade_medida'];

    public function estoques()
    {
        return $this->hasMany(Estoque::class, 'id_produto');
    }

    public function barbearias()
    {
        return $this->belongsToMany(
            Barbearia::class,
            'estoques',           // tabela pivot
            'id_produto',         // foreign key do produto na pivot
            'id_barbearia'        // foreign key da barbearia na pivot
        )
            ->withPivot('quantidade', 'quantidade_minima')
            ->withTimestamps();
    }

    public function servicos()
    {
        return $this->belongsToMany(
            Servico::class,
            'servico_produto', // mesmo nome da migration
            'id_produto',      // foreign key deste model na pivot
            'id_servico'       // foreign key do serviço na pivot
        )->withPivot('quantidade_utilizada')
            ->withTimestamps();
    }
}
