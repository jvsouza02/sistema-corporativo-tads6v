<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Barbearia;
use App\Models\Barbeiro;
use App\Models\Servico;
use App\Models\Agendamento;
use App\Models\Atendimento;

class AgendamentoAtendimentoTest extends TestCase
{
    use RefreshDatabase;

    // =========================
    // Helpers
    // =========================

    protected function criarUsuario(string $role): User
    {
        return User::create([
            'name' => ucfirst($role) . ' Test',
            'email' => $role . uniqid() . '@example.test',
            'password' => bcrypt('password'),
            'role' => $role,
        ]);
    }

    protected function criarProprietario(): string
    {
        $user = $this->criarUsuario('proprietario');

        $id = (string) Str::uuid();
        DB::table('proprietarios')->insert([
            'id_proprietario' => $id,
            'nome' => 'Prop Test',
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $id;
    }

    protected function criarBarbearia(): Barbearia
    {
        $idProp = $this->criarProprietario();

        return Barbearia::create([
            'id_barbearia' => (string) Str::uuid(),
            'nome' => 'Barbearia Test',
            'email' => 'barb@test.com',
            'endereco' => 'Rua Teste',
            'telefone' => '11999999999',
            'horario_abertura' => '09:00:00',
            'horario_fechamento' => '18:00:00',
            'descricao' => 'Teste',
            'id_proprietario' => $idProp,
        ]);
    }

    protected function criarCliente(User $user): Cliente
    {
        return Cliente::create([
            'id_cliente' => (string) Str::uuid(),
            'nome' => 'Cliente Test',
            'user_id' => $user->id,
        ]);
    }

    // =========================
    // CT012
    // =========================
    public function test_ct012_registrar_agendamento_com_dados_validos()
    {
        $user = $this->criarUsuario('cliente');
        $cliente = $this->criarCliente($user);
        $barbearia = $this->criarBarbearia();

        $this->actingAs($user);

        $response = $this->post(route('cliente.agendamentos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'data_hora' => Carbon::now()->addDay()->format('Y-m-d H:i:s'),
            'servico' => 'Corte simples',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('agendamentos', [
            'id_barbearia' => $barbearia->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'status' => 'agendado',
        ]);
    }

    // =========================
    // CT013
    // =========================
    public function test_ct013_bloquear_agendamento_em_horario_ocupado()
    {
        $user = $this->criarUsuario('cliente');
        $cliente = $this->criarCliente($user);
        $barbearia = $this->criarBarbearia();

        $hora = Carbon::now()->addDays(2)->setTime(14, 0);

        Agendamento::create([
            'id_agendamento' => (string) Str::uuid(),
            'id_barbearia' => $barbearia->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'data_hora' => $hora,
            'status' => 'agendado',
            'servico' => 'Corte simples',
        ]);

        $this->actingAs($user);

        $response = $this->post(route('cliente.agendamentos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'data_hora' => $hora->format('Y-m-d H:i:s'),
            'servico' => 'Corte simples',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error');

        $this->assertDatabaseCount('agendamentos', 1);
    }

    // =========================
    // CT014
    // =========================
    public function test_ct014_cancelar_agendamento_existente()
    {
        $user = $this->criarUsuario('cliente');
        $cliente = $this->criarCliente($user);
        $barbearia = $this->criarBarbearia();

        $agendamento = Agendamento::create([
            'id_agendamento' => (string) Str::uuid(),
            'id_barbearia' => $barbearia->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'data_hora' => Carbon::now()->addDay(),
            'status' => 'agendado',
            'servico' => 'Corte simples',
        ]);

        $this->actingAs($user);

        $response = $this->delete(
            route('cliente.agendamentos.cancelar', $agendamento->id_agendamento)
        );

        $response->assertStatus(302);

        $this->assertDatabaseHas('agendamentos', [
            'id_agendamento' => $agendamento->id_agendamento,
            'status' => 'cancelado',
        ]);
    }

    // =========================
    // CT015
    // =========================
    public function test_ct015_registrar_atendimento_com_valor_valido()
    {
        $user = $this->criarUsuario('barbeiro');
        $barbearia = $this->criarBarbearia();

        $barbeiro = Barbeiro::create([
            'id_barbeiro' => (string) Str::uuid(),
            'nome' => 'Barbeiro Test',
            'horario_inicio' => '09:00:00',
            'horario_fim' => '18:00:00',
            'user_id' => $user->id,
            'id_barbearia' => $barbearia->id_barbearia,
        ]);

        $clienteUser = $this->criarUsuario('cliente');
        $cliente = $this->criarCliente($clienteUser);

        $servico = Servico::create([
            'id_servico' => (string) Str::uuid(),
            'id_barbearia' => $barbearia->id_barbearia,
            'nome' => 'Corte',
            'descricao' => 'Corte simples',
            'preco' => 25.00,
            'ativo' => true,
        ]);

        $this->actingAs($user);

        $response = $this->post(route('atendimentos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'servicos' => [$servico->id_servico],
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('atendimentos', [
            'id_barbearia' => $barbearia->id_barbearia,
            'status' => 'finalizado',
        ]);
    }

    // =========================
    // CT016
    // =========================
    public function test_ct016_bloquear_registro_atendimento_com_valor_negativo()
    {
        $user = $this->criarUsuario('barbeiro');
        $barbearia = $this->criarBarbearia();

        Barbeiro::create([
            'id_barbeiro' => (string) Str::uuid(),
            'nome' => 'Barbeiro Neg',
            'horario_inicio' => '09:00:00',
            'horario_fim' => '18:00:00',
            'user_id' => $user->id,
            'id_barbearia' => $barbearia->id_barbearia,
        ]);

        $clienteUser = $this->criarUsuario('cliente');
        $cliente = $this->criarCliente($clienteUser);

        // Cria o serviço com preço NEGATIVO e guarda na variável
        $servicoNegativo = Servico::create([
            'id_servico' => (string) Str::uuid(),
            'id_barbearia' => $barbearia->id_barbearia,
            'nome' => 'Serviço Neg',
            'descricao' => 'Erro',
            'preco' => -10,
            'ativo' => true,
        ]);

        $this->actingAs($user);

        // Envia o serviço com preço NEGATIVO
        $response = $this->post(route('atendimentos.store'), [
            'id_barbearia' => $barbearia->id_barbearia,
            'id_cliente' => $cliente->id_cliente,
            'servicos' => [$servicoNegativo->id_servico], // <-- Serviço correto!
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('error');

        $this->assertDatabaseCount('atendimentos', 0);
    }

    // =========================
    // CT017
    // =========================
    public function test_ct017_excluir_atendimento_existente()
    {
        $user = $this->criarUsuario('barbeiro');
        $barbearia = $this->criarBarbearia();

        $barbeiro = Barbeiro::create([
            'id_barbeiro' => (string) Str::uuid(),
            'nome' => 'Barbeiro Del',
            'horario_inicio' => '09:00:00',
            'horario_fim' => '18:00:00',
            'user_id' => $user->id,
            'id_barbearia' => $barbearia->id_barbearia,
        ]);

        $atendimento = Atendimento::create([
            'id_atendimento' => (string) Str::uuid(),
            'id_barbearia' => $barbearia->id_barbearia,
            'id_barbeiro' => $barbeiro->id_barbeiro,
            'data_hora_inicio' => now(),
            'status' => 'finalizado',
            'valor_total' => 20,
        ]);

        $this->actingAs($user);

        $response = $this->delete(
            route('atendimentos.destroy', $atendimento->id_atendimento)
        );

        $response->assertStatus(302);

        $this->assertDatabaseMissing('atendimentos', [
            'id_atendimento' => $atendimento->id_atendimento,
        ]);
    }
}
