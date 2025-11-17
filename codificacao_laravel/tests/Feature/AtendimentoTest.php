<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Barbeiro;
use App\Models\Barbearia;
use App\Models\Atendimento;
use App\Models\Proprietario;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AtendimentoTest extends TestCase
{
    use RefreshDatabase;

    protected $barbeiro;
    protected $barbearia;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Criar proprietário
        $proprietario = Proprietario::factory()->create();

        // Criar barbearia
        $this->barbearia = Barbearia::factory()->create([
            'id_proprietario' => $proprietario->id_proprietario
        ]);

        // Criar usuário barbeiro
        $this->user = User::factory()->barbeiro()->create();

        // Criar barbeiro
        $this->barbeiro = Barbeiro::factory()->create([
            'user_id' => $this->user->id,
            'id_barbearia' => $this->barbearia->id_barbearia
        ]);
    }

    /**
     * CT001: Registrar atendimento sem itens
     * Verificar o que acontece quando o barbeiro tenta registrar
     * um atendimento sem escolher nenhum serviço ou produto.
     */
    public function test_ct001_nao_pode_registrar_atendimento_sem_servico()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('atendimentos.store'), [
            'id_barbearia' => $this->barbearia->id_barbearia,
            'id_barbeiro' => $this->barbeiro->id_barbeiro,
            'produto' => 'Shampoo',
            'valor_total' => '30,00',
            'comentario' => 'Teste'
            // Serviço não foi enviado
        ]);

        $response->assertSessionHasErrors(['servico']);
        $this->assertDatabaseCount('atendimentos', 0);
    }

    /**
     * CT002: Registrar atendimento com itens de valor zero
     * Verificar se o sistema calcula corretamente o total
     * quando há itens com preço igual a zero.
     */
    public function test_ct002_registra_atendimento_com_valor_zero()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('atendimentos.store'), [
            'id_barbearia' => $this->barbearia->id_barbearia,
            'id_barbeiro' => $this->barbeiro->id_barbeiro,
            'servico' => 'Corte Degradê',
            'produto' => 'Nenhum',
            'valor_total' => '0,00',
            'comentario' => 'Atendimento gratuito'
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('atendimentos', [
            'servico' => 'Corte Degradê',
            'valor_total' => 0.00
        ]);
    }

    /**
     * CT003: Calcular valor total com casas decimais
     * Confirmar se o sistema soma corretamente os valores
     * quando há números com centavos.
     */
    public function test_ct003_calcula_corretamente_valores_decimais()
    {
        $this->actingAs($this->user);

        // Valor com centavos: R$ 45,75
        $response = $this->post(route('atendimentos.store'), [
            'id_barbearia' => $this->barbearia->id_barbearia,
            'id_barbeiro' => $this->barbeiro->id_barbeiro,
            'servico' => 'Corte Social',
            'produto' => 'Pomada',
            'valor_total' => 'R$ 45,75',
            'comentario' => 'Teste decimal'
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $atendimento = Atendimento::first();
        $this->assertEquals(45.75, $atendimento->valor_total);
        $this->assertIsFloat($atendimento->valor_total);
    }

    /**
     * CT003 (complementar): Múltiplos valores decimais
     */
    public function test_ct003_calcula_multiplos_valores_decimais_corretamente()
    {
        $this->actingAs($this->user);

        // Simular: Corte (35,50) + Barba (25,75) + Pomada (12,25) = 73,50
        $response = $this->post(route('atendimentos.store'), [
            'id_barbearia' => $this->barbearia->id_barbearia,
            'id_barbeiro' => $this->barbeiro->id_barbeiro,
            'servico' => 'Corte + Barba',
            'produto' => 'Pomada',
            'valor_total' => 'R$ 73,50',
            'comentario' => 'Combo completo'
        ]);

        $response->assertRedirect();
        $atendimento = Atendimento::first();

        // Verifica precisão decimal
        $this->assertEquals(73.50, $atendimento->valor_total);
        $this->assertEquals('73.50', number_format($atendimento->valor_total, 2, '.', ''));
    }

    /**
     * CT004: Editar atendimento e atualizar valor total
     * Verificar se o sistema recalcula o valor total
     * automaticamente quando o atendimento é editado.
     */
    public function test_ct004_atualiza_valor_ao_editar_atendimento()
    {
        $this->actingAs($this->user);

        // Criar atendimento inicial
        $atendimento = Atendimento::factory()->create([
            'id_barbearia' => $this->barbearia->id_barbearia,
            'id_barbeiro' => $this->barbeiro->id_barbeiro,
            'servico' => 'Corte Social',
            'produto' => 'Nenhum',
            'valor_total' => 30.00
        ]);

        // Editar o atendimento - novo valor
        $response = $this->put(route('atendimentos.update', $atendimento->id_atendimento), [
            'servico' => 'Corte Degradê',
            'produto' => 'Pomada',
            'valor_total' => 'R$ 52,00',
            'comentario' => 'Atualizado'
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Verificar se o valor foi recalculado
        $atendimento->refresh();
        $this->assertEquals(52.00, $atendimento->valor_total);
        $this->assertEquals('Corte Degradê', $atendimento->servico);
        $this->assertEquals('Pomada', $atendimento->produto);
    }

    /**
     * CT005: Impedir valor negativo no atendimento
     * Garantir que o sistema não aceite itens com valor negativo.
     */
    public function test_ct005_nao_aceita_valor_negativo()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('atendimentos.store'), [
            'id_barbearia' => $this->barbearia->id_barbearia,
            'id_barbeiro' => $this->barbeiro->id_barbeiro,
            'servico' => 'Corte Social',
            'produto' => 'Nenhum',
            'valor_total' => '-50,00',
            'comentario' => 'Teste valor negativo'
        ]);

        $response->assertSessionHasErrors(['valor_total']);
        $this->assertDatabaseCount('atendimentos', 0);
    }

    /**
     * CT005 (complementar): Impedir valor negativo ao editar
     */
    public function test_ct005_nao_aceita_valor_negativo_ao_editar()
    {
        $this->actingAs($this->user);

        $atendimento = Atendimento::factory()->create([
            'id_barbearia' => $this->barbearia->id_barbearia,
            'id_barbeiro' => $this->barbeiro->id_barbeiro,
            'valor_total' => 50.00
        ]);

        $response = $this->put(route('atendimentos.update', $atendimento->id_atendimento), [
            'servico' => 'Corte Social',
            'produto' => 'Nenhum',
            'valor_total' => '-30,00',
            'comentario' => 'Tentando valor negativo'
        ]);

        $response->assertSessionHasErrors(['valor_total']);

        // Verificar que o valor não foi alterado
        $atendimento->refresh();
        $this->assertEquals(50.00, $atendimento->valor_total);
    }

    /**
     * CT006: Login de barbeiro com e-mail correto
     * Verificar se o barbeiro consegue acessar o sistema com e-mail válido.
     */
    public function test_ct006_barbeiro_faz_login_com_email_correto()
    {
        $user = User::factory()->barbeiro()->create([
            'email' => 'barbeiro@teste.com',
            'password' => bcrypt('senha123')
        ]);

        $response = $this->post(route('login.post'), [
            'email' => 'barbeiro@teste.com',
            'password' => 'senha123'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * CT007: Login de barbeiro com e-mail incorreto
     * Verificar o comportamento do sistema quando o barbeiro
     * tenta entrar com e-mail não cadastrado.
     */
    public function test_ct007_barbeiro_nao_faz_login_com_email_incorreto()
    {
        $response = $this->post(route('login.post'), [
            'email' => 'emailinexistente@teste.com',
            'password' => 'senha123'
        ]);

        // Deve redirecionar para login
        $response->assertRedirect(route('login'));

        // Deve ter mensagem de erro na sessão
        $response->assertSessionHas('error');

        // Usuário não deve estar autenticado
        $this->assertGuest();
    }

    /**
     * CT007 (complementar): Login com senha incorreta
     */
    public function test_ct007_barbeiro_nao_faz_login_com_senha_incorreta()
    {
        User::factory()->barbeiro()->create([
            'email' => 'barbeiro@teste.com',
            'password' => bcrypt('senha_correta')
        ]);

        $response = $this->post(route('login.post'), [
            'email' => 'barbeiro@teste.com',
            'password' => 'senha_errada'
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('error');
        $this->assertGuest();
    }

    // /**
    //  * Teste adicional: Apenas barbeiro autenticado pode criar atendimento
    //  */
    // public function test_usuario_nao_autenticado_nao_pode_criar_atendimento()
    // {
    //     $response = $this->post(route('atendimentos.store'), [
    //         'servico' => 'Corte Social',
    //         'valor_total' => '30,00'
    //     ]);

    //     $response->assertRedirect(route('login'));
    //     $this->assertGuest();
    // }

    // /**
    //  * Teste adicional: Proprietário não pode criar atendimento
    //  */
    // public function test_proprietario_nao_pode_criar_atendimento()
    // {
    //     $proprietarioUser = User::factory()->proprietario()->create();
    //     $this->actingAs($proprietarioUser);

    //     $response = $this->post(route('atendimentos.store'), [
    //         'id_barbearia' => $this->barbearia->id_barbearia,
    //         'id_barbeiro' => $this->barbeiro->id_barbeiro,
    //         'servico' => 'Corte Social',
    //         'valor_total' => '30,00'
    //     ]);

    //     // Deve retornar 403 Forbidden
    //     $response->assertForbidden();
    // }
}
