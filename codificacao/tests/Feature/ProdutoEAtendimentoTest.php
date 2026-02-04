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
use App\Models\Atendimento;

class ProdutoEAtendimentoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * CT018 — Impedir cadastro de serviço com valor negativo
     */
    public function test_ct018_nao_permite_cadastrar_servico_com_valor_negativo()
    {
        $proprietario = Proprietario::factory()->create();
        $user = $proprietario->user;

        $barbearia = Barbearia::factory()->create([
            'id_proprietario' => $proprietario->id_proprietario,
        ]);
        $response = $this->actingAs($user)->post(route('servicos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'nome' => 'Serviço inválido',
            'descricao' => 'Descrição do serviço inválido',
            'preco' => -50.00, //valor negativo
            'duracao' => 30,
        ]);

        $response->assertSessionHasErrors(['preco']);
        $response->assertInvalid(['preco']);

        $this->assertDatabaseMissing('servicos', [
            'nome' => 'Serviço inválido',
            'preco' => -50.00,
        ]);
    }

    /**
    * CT019 — Alterar valor do serviço não deve mudar atendimentos antigos
    */
    public function test_ct019_alterar_valor_servico_nao_afeta_atendimentos_antigos()
    {
        //cria com valor de 30
        $servico = Servico::factory()->create([
            'preco' => 30.00,
        ]);

        $barbeiro = Barbeiro::factory()->create(['id_barbearia' => $servico->id_barbearia]);
        $cliente = Cliente::factory()->create();

        $this->actingAs($barbeiro->user)->post(route('atendimentos.store'), [
            'id_barbearia' => $servico->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'servicos' => [$servico->id_servico],
            'status' => 'finalizado',
        ]);

        $atendimento = Atendimento::latest()->first();

        $atendimentoServico = DB::table('atendimento_servico')
            ->where('id_atendimento', $atendimento->id_atendimento)
            ->where('id_servico', $servico->id_servico)
            ->first();

        $valorOriginal = $atendimentoServico->valor_cobrado;

        $proprietario = Proprietario::factory()->create();

        //atualiza pra 50
        $this->actingAs($proprietario->user)->put(route('servicos.update', $servico->id_servico), [
            'nome' => $servico->nome,
            'descricao' => $servico->descricao ?? 'Descrição atualizada',
            'preco' => 50.00,
            'ativo' => $servico->ativo,
        ]);

        $atendimentoServicoDepois = DB::table('atendimento_servico')
            ->where('id_atendimento', $atendimento->id_atendimento)
            ->where('id_servico', $servico->id_servico)
            ->first();

        $this->assertEquals($valorOriginal, $atendimentoServicoDepois->valor_cobrado);
    }


    /**
    * CT020 — Associar mais de um produto a um serviço
    */
    public function test_ct020_associar_mais_de_um_produto_a_um_servico()
    {
        $servico = Servico::factory()->create();

        $produto1 = Produto::factory()->create();
        $produto2 = Produto::factory()->create();

        Estoque::factory()->create([
            'id_barbearia' => $servico->id_barbearia,
            'id_produto' => $produto1->id_produto,
            'quantidade' => 10,
        ]);

        Estoque::factory()->create([
            'id_barbearia' => $servico->id_barbearia,
            'id_produto' => $produto2->id_produto,
            'quantidade' => 10,
        ]);

        DB::table('servico_produto')->insert([
            [
                'id_servico' => $servico->id_servico,
                'id_produto' => $produto1->id_produto,
                'quantidade_utilizada' => 2,
            ],
            [
                'id_servico' => $servico->id_servico,
                'id_produto' => $produto2->id_produto,
                'quantidade_utilizada' => 1,
            ]
        ]);

        $barbeiro = Barbeiro::factory()->create(['id_barbearia' => $servico->id_barbearia]);
        $cliente = Cliente::factory()->create();

        $this->actingAs($barbeiro->user)->post(route('atendimentos.store'), [
            'id_barbearia' => $servico->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'servicos' => [$servico->id_servico],
            'status' => 'finalizado',
        ]);

        $atendimento = Atendimento::latest()->first();

        $produtosAtendimento = DB::table('atendimento_produto')
            ->where('id_atendimento', $atendimento->id_atendimento)
            ->get();

        $this->assertCount(2, $produtosAtendimento);
    }

    /**
    * CT021 — Impedir atendimento quando produto do serviço está sem estoque
    */
    public function test_ct021_impedir_atendimento_quando_produto_do_servico_esta_sem_estoque()
    {
        $servico = Servico::factory()->create();

        $produto = Produto::factory()->create();

        DB::table('servico_produto')->insert([
            'id_servico' => $servico->id_servico,
            'id_produto' => $produto->id_produto,
            'quantidade_utilizada' => 1,
        ]);

        Estoque::factory()->create([
            'id_barbearia' => $servico->id_barbearia,
            'id_produto' => $produto->id_produto,
            'quantidade' => 0, //sem estoque
        ]);

        $barbeiro = Barbeiro::factory()->create(['id_barbearia' => $servico->id_barbearia]);
        $cliente = Cliente::factory()->create();

        $response = $this->actingAs($barbeiro->user)->post(route('atendimentos.store'), [
            'id_barbearia' => $servico->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'servicos' => [$servico->id_servico],
            'status' => 'finalizado',
        ]);

        $atendimento = Atendimento::first();
        $this->assertNull($atendimento, 'O sistema permitiu criar um atendimento sem estoque disponível.');
    }

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

        $barbeiro = Barbeiro::factory()->create();
        $userBarbeiro = $barbeiro->user;
        $barbearia = $barbeiro->barbearia;


        $proprietario = Proprietario::factory()->create();
        $userProprietario = $proprietario->user;


        $cliente = Cliente::factory()->create();


        $produto = Produto::factory()->create(['preco' => 20.00]);

        Estoque::factory()->create([
            'id_barbearia' => $barbearia->id_barbearia,
            'id_produto' => $produto->id_produto,
            'quantidade' => 10,
        ]);


        $servico = Servico::factory()->create([
            'id_barbearia' => $barbearia->id_barbearia,
            'preco' => 0.00,
        ]);


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


        $pivotAntes = DB::table('atendimento_produto')
            ->where('id_produto', $produto->id_produto)
            ->first();

        $this->assertNotNull($pivotAntes, 'Pivot atendimento_produto não foi criado antes da alteração de preço.');
        $this->assertEquals(20.00, (float) $pivotAntes->valor_unitario);


        $this->actingAs($userProprietario)->put(route('produtos.update', $produto->id_produto), [
            'nome' => $produto->nome,
            'descricao' => $produto->descricao,
            'preco' => 35.00,
            'quantidade' => 10, // mantém estoque
        ])->assertStatus(302);


        $pivotDepois = DB::table('atendimento_produto')
            ->where('id_produto', $produto->id_produto)
            ->first();

        $this->assertNotNull($pivotDepois, 'Pivot atendimento_produto desapareceu após atualização do produto.');
        $this->assertEquals(20.00, (float) $pivotDepois->valor_unitario);
    }
}
