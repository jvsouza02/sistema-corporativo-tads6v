<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $casts = [
        'quantidade' => 'float',
        'quantidade_minima' => 'float',
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

    /**
     * Remove quantidade do estoque.
     *
     * @param float $quantidade Quantidade a remover (mesma unidade que está armazenada)
     * @param string|null $motivo Texto descritivo do motivo (ex: "Atendimento - Serviço X")
     * @param string|null $usuarioId Id do usuário que realizou a operação (opcional)
     * @param string|null $atendimentoId Id do atendimento relacionado (opcional)
     *
     * @throws \Exception Se quantidade inválida ou estoque insuficiente.
     * @return void
     */
    public function removerQuantidade(float $quantidade, ?string $motivo = null, ?string $usuarioId = null, ?string $atendimentoId = null): void
    {
        // valida entradas
        $quantidade = floatval($quantidade);
        if ($quantidade <= 0) {
            throw new \Exception("Quantidade para remover deve ser maior que zero.");
        }

        // verifica disponibilidade
        $atual = floatval($this->quantidade ?? 0);
        if ($atual < $quantidade) {
            throw new \Exception("Estoque insuficiente para o produto (disponível: {$atual}, solicitado: {$quantidade}).");
        }

        // decrementa e salva
        $this->quantidade = $atual - $quantidade;
        $this->save();
    }
}
