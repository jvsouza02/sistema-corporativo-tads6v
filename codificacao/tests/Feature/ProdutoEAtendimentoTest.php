<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Produto;
use App\Models\Estoque;
use Illuminate\Support\Facades\DB;
use App\Models\Proprietario;
use App\Models\Barbearia;
use App\Models\Barbeiro;
use App\Models\Cliente;
use App\Models\Servico;

class ProdutoEAtendimentoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * CT022 — Impedir cadastro de produto com preço negativo
     */
    public function test_ct022_nao_permite_cadastrar_produto_com_preco_negativo()
    {
        $proprietario = Proprietario::factory()->create();

        $user = $proprietario->user;

        $barbearia = Barbearia::factory()->create([
            'id_proprietario' => $proprietario->id_proprietario,
        ]);

        $response = $this->actingAs($user)->post(route('produtos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'nome' => 'Produto inválido',
            'preco' => -10,
            'quantidade' => 5,
        ]);

        $response->assertSessionHasErrors(['preco']);

        $this->assertDatabaseMissing('produtos', [
            'nome' => 'Produto inválido',
        ]);
    }

    /**
     * CT023 — Não permitir usar produto além do estoque disponível
     */
    public function test_ct023_nao_permite_usar_produto_alem_do_estoque()
    {
        $user = User::factory()->barbeiro()->create();

        $produto = Produto::factory()->create(['preco' => 10]);

        $estoque = Estoque::factory()->create([
            'id_produto' => $produto->id_produto,
            'quantidade' => 2,
        ]);

        $response = $this->actingAs($user)->post(route('atendimentos.store'), [
            'id_barbearia' => $estoque->id_barbearia,
            'id_barbeiro' => $user->barbeiro->id_barbeiro ?? null,
            'produtos' => [
                [
                    'id_produto' => $produto->id_produto,
                    'quantidade' => 3, // maior que o estoque
                ]
            ],
            'status' => 'finalizado',
        ]);

        $response->assertSessionHasErrors();

        $this->assertDatabaseHas('estoques', [
            'id_produto' => $produto->id_produto,
            'quantidade' => 2,
        ]);
    }

    /**
     * CT024 — Calcular corretamente o valor do produto no atendimento
     */
    public function test_ct024_calcula_valor_do_produto_corretamente_no_atendimento()
    {
        // Arrange
        $barbeiro = Barbeiro::factory()->create();
        $user = $barbeiro->user;
        $barbearia = $barbeiro->barbearia;

        $cliente = Cliente::factory()->create();

        $produto = Produto::factory()->create([
            'preco' => 12.50,
        ]);

        Estoque::factory()->create([
            'id_barbearia' => $barbearia->id_barbearia,
            'id_produto' => $produto->id_produto,
            'quantidade' => 10,
        ]);

        $servico = Servico::factory()->create([
            'id_barbearia' => $barbearia->id_barbearia,
            'preco' => 0,
        ]);

        // Act
        $this->actingAs($user)->post(route('atendimentos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'id_cliente' => $cliente->id_cliente, // 🔴 ESSENCIAL
            'servicos' => [$servico->id_servico],
            'produtos_extras' => [
                [
                    'id_produto' => $produto->id_produto,
                    'quantidade' => 3,
                ],
            ],
            'status' => 'finalizado',
        ])->assertStatus(302);

        // Assert
        $this->assertDatabaseHas('atendimento_produto', [
            'id_produto' => $produto->id_produto,
            'quantidade' => 3,
            'valor_unitario' => 12.50,
            'valor_total' => 37.50,
        ]);
    }

    /**
     * CT025 — Alterar preço do produto não deve mudar atendimentos antigos
     */
    public function test_ct025_alterar_preco_produto_nao_afeta_atendimentos_antigos()
    {
        // Arrange: cria barbeiro (factory já cria barbearia e user)
        $barbeiro = Barbeiro::factory()->create();
        $userBarbeiro = $barbeiro->user;
        $barbearia = $barbeiro->barbearia;

        // Proprietario que fará a atualização do produto (rota exige proprietario-access)
        $proprietario = Proprietario::factory()->create();
        $userProprietario = $proprietario->user;

        // Cliente necessário para criar o atendimento sem agendamento
        $cliente = Cliente::factory()->create();

        // Produto e estoque na mesma barbearia
        $produto = Produto::factory()->create(['preco' => 20.00]);

        Estoque::factory()->create([
            'id_barbearia' => $barbearia->id_barbearia,
            'id_produto' => $produto->id_produto,
            'quantidade' => 10,
        ]);

        // Serviço mínimo para satisfazer a validação de 'servicos'
        $servico = Servico::factory()->create([
            'id_barbearia' => $barbearia->id_barbearia,
            'preco' => 0.00,
        ]);

        // Act: cria atendimento como barbeiro, usando produtos_extras (controller processa esse campo)
        $this->actingAs($userBarbeiro)->post(route('atendimentos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'servicos' => [$servico->id_servico],
            'produtos_extras' => [
                [
                    'id_produto' => $produto->id_produto,
                    'quantidade' => 2,
                ],
            ],
            'status' => 'finalizado',
        ])->assertStatus(302);

        // Confirma pivot gravado com o preco original
        $pivotAntes = DB::table('atendimento_produto')
            ->where('id_produto', $produto->id_produto)
            ->first();

        $this->assertNotNull($pivotAntes, 'Pivot atendimento_produto não foi criado antes da alteração de preço.');
        $this->assertEquals(20.00, (float) $pivotAntes->valor_unitario);

        // Agora atualiza o preço do produto como proprietario
        $this->actingAs($userProprietario)->put(route('produtos.update', $produto->id_produto), [
            'nome' => $produto->nome,
            'descricao' => $produto->descricao,
            'preco' => 35.00,
            'quantidade' => 10, // mantém estoque
        ])->assertStatus(302);

        // Re-lê pivot — deve permanecer com valor_unitario antigo (20.00)
        $pivotDepois = DB::table('atendimento_produto')
            ->where('id_produto', $produto->id_produto)
            ->first();

        $this->assertNotNull($pivotDepois, 'Pivot atendimento_produto desapareceu após atualização do produto.');
        $this->assertEquals(20.00, (float) $pivotDepois->valor_unitario);
    }
}
