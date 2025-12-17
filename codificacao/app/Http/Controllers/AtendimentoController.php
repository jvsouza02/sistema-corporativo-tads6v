<?php
// app/Http/Controllers/AtendimentoController.php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Agendamento;
use App\Models\Barbeiro;
use App\Models\Barbearia;
use App\Models\Produto;
use App\Models\Servico;
use App\Models\Estoque;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Schema;

class AtendimentoController extends Controller
{
    /**
     * Exibe página de detalhes da barbearia com atendimentos
     */
    public function index($id_barbearia)
    {

    }

    /**
     * Registra novo atendimento
     */
    public function store(Request $request)
    {
        // regras iniciais (id_cliente será exigido condicionalmente)
        $rules = [
            'id_barbearia' => 'required|exists:barbearias,id_barbearia',
            'servicos' => 'required|array|min:1',
            'servicos.*' => 'exists:servicos,id_servico',
            'id_agendamento' => 'nullable|exists:agendamentos,id_agendamento',
            'produtos_extras' => 'nullable|array',
            'produtos_extras.*.id_produto' => 'required_with:produtos_extras|exists:produtos,id_produto',
            'produtos_extras.*.quantidade' => 'required_with:produtos_extras|numeric|min:0.01',
            'observacao' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Se não veio id_agendamento, exigimos id_cliente
        if (!$request->filled('id_agendamento')) {
            $validator->after(function ($validator) use ($request) {
                if (!$request->filled('id_cliente')) {
                    $validator->errors()->add('id_cliente', 'Selecione um cliente ou inicie a partir de um agendamento.');
                } else {
                    // valida existencia do cliente
                    if (!\DB::table('clientes')->where('id_cliente', $request->input('id_cliente'))->exists()) {
                        $validator->errors()->add('id_cliente', 'Cliente inválido.');
                    }
                }
            });
        }

        $validator->validate();

        // pega barbeiro do usuário autenticado
        $user = Auth::user();
        $barbeiro = Barbeiro::where('user_id', $user->id)->firstOrFail();

        try {
            DB::transaction(function () use ($request, $barbeiro) {

                // determina id_cliente: se veio id_agendamento, pega do agendamento; senão do request
                $idCliente = null;
                $idAgendamento = $request->input('id_agendamento');

                if ($idAgendamento) {
                    $ag = Agendamento::findOrFail($idAgendamento);
                    // assegura que o agendamento pertence à barbearia recebida
                    if ($ag->id_barbearia !== $request->input('id_barbearia')) {
                        throw new \Exception('Agendamento não pertence a essa barbearia.');
                    }
                    $idCliente = $ag->id_cliente;
                } else {
                    $idCliente = $request->input('id_cliente');
                }

                // cria atendimento (gera UUID)
                $idAtendimento = (string) Str::uuid();

                $atendimentoData = [
                    'id_atendimento' => $idAtendimento,
                    'id_barbearia' => $request->input('id_barbearia'),
                    'id_cliente' => $idCliente,
                    'id_barbeiro' => $barbeiro->id_barbeiro,
                    'data_hora_inicio' => now(),
                    'data_hora_fim' => now(),
                    'status' => 'finalizado',
                    'observacao' => $request->input('observacao') ?? null,
                ];

                // se a tabela atendimentos tem coluna id_agendamento, armazena
                if ($idAgendamento && Schema::hasColumn('atendimentos', 'id_agendamento')) {
                    $atendimentoData['id_agendamento'] = $idAgendamento;
                }

                $atendimento = Atendimento::create($atendimentoData);

                $valorTotal = 0.0;

                // processa serviços selecionados
                $servicos = Servico::with('produtos')->whereIn('id_servico', $request->input('servicos'))->get();

                foreach ($servicos as $servico) {
                    if ((float) $servico->preco < 0) {
                        throw new \Exception("Serviço {$servico->nome} tem preço inválido.");
                    }


                    $valorCobradoServico = (float) $servico->preco;
                    $valorTotal += $valorCobradoServico;

                    // insere no pivot atendimento_servico
                    DB::table('atendimento_servico')->insert([
                        'id_atendimento' => $idAtendimento,
                        'id_servico' => $servico->id_servico,
                        'valor_cobrado' => $valorCobradoServico,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // produtos automáticos do serviço
                    foreach ($servico->produtos as $produto) {
                        $quantidade = (float) ($produto->pivot->quantidade_utilizada ?? 0);
                        if ($quantidade <= 0)
                            continue;

                        $valorUnitario = (float) $produto->preco;

                        // valor fixo do produto quando usado no serviço
                        $valorProdutoServico = $valorUnitario;

                        // soma APENAS o preço do produto (não o ml)
                        $valorTotal += $valorProdutoServico;

                        DB::table('atendimento_produto')->insert([
                            'id_atendimento' => $idAtendimento,
                            'id_produto' => $produto->id_produto,
                            'quantidade' => $quantidade, // ml (estoque)
                            'valor_unitario' => $valorUnitario,
                            'valor_total' => $valorProdutoServico, // FIXO
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                        // desconta do estoque
                        $estoque = Estoque::where('id_barbearia', $request->input('id_barbearia'))
                            ->where('id_produto', $produto->id_produto)
                            ->first();

                        if (!$estoque) {
                            throw new \Exception("Estoque do produto {$produto->nome} não encontrado para esta barbearia.");
                        }

                        $estoque->removerQuantidade($quantidade, "Atendimento - Serviço: {$servico->nome}", Auth::id(), $idAtendimento);
                    }
                }

                // produtos extras (opcionais)
                $produtosExtras = $request->input('produtos_extras', []);
                foreach ($produtosExtras as $item) {
                    $produto = Produto::findOrFail($item['id_produto']);
                    $quantidade = (float) $item['quantidade'];
                    if ($quantidade <= 0)
                        continue;

                    $valorUnitario = (float) $produto->preco;
                    $subtotal = round($quantidade * $valorUnitario, 2);
                    $valorTotal += $subtotal;

                    DB::table('atendimento_produto')->insert([
                        'id_atendimento' => $idAtendimento,
                        'id_produto' => $produto->id_produto,
                        'quantidade' => $quantidade,
                        'valor_unitario' => $valorUnitario,
                        'valor_total' => $subtotal,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $estoque = Estoque::where('id_barbearia', $request->input('id_barbearia'))
                        ->where('id_produto', $produto->id_produto)
                        ->first();

                    if (!$estoque) {
                        throw new \Exception("Estoque do produto {$produto->nome} não encontrado para esta barbearia.");
                    }

                    $estoque->removerQuantidade($quantidade, "Atendimento - Produto Extra", Auth::id(), $idAtendimento);
                }

                // atualiza valor_total se a coluna existir
                if (Schema::hasColumn('atendimentos', 'valor_total')) {
                    $atendimento->update(['valor_total' => round($valorTotal, 2)]);
                }

                // se veio id_agendamento, marca como finalizado
                if ($idAgendamento) {
                    Agendamento::where('id_agendamento', $idAgendamento)
                        ->update(['status' => 'concluido', 'updated_at' => now()]);
                }
            }); // fim transaction

            return redirect()->route('barbearia.detalhes', $request->input('id_barbearia'))
                ->with('success', 'Atendimento registrado com sucesso!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erro ao registrar atendimento: ' . $e->getMessage());
        }
    }


    // MANTENHA SEUS MÉTODOS DE AGENDAMENTO
    public function createCliente()
    {
        $barbearias = Barbearia::all();
        return view('cliente.agendamentos.novo', compact('barbearias'));
    }

    public function storeCliente(Request $request)
    {
        // SEU CÓDIGO ATUAL DE AGENDAMENTO
    }

    public function listarAgendamentos()
    {
        $agendamentos = auth()->user()->cliente->agendamentos()
            ->with(['barbearia', 'barbeiro'])
            ->orderBy('data_hora', 'desc')
            ->get();

        return view('cliente.meus-agendamentos', compact('agendamentos'));
    }

    public function cancelarAgendamento($id)
    {
        $agendamento = Agendamento::where('id_cliente', auth()->user()->cliente->id_cliente)
            ->where('id_agendamento', $id)
            ->firstOrFail();

        $agendamento->update(['status' => 'cancelado']);

        return redirect()->route('cliente.agendamentos.listar')
            ->with('success', 'Agendamento cancelado com sucesso!');
    }

    // MÉTODOS ANTIGOS - DEPRECADOS (podem remover depois)
    public function update(Request $request, $id_atendimento)
    {
        // Deprecado - não será mais usado
    }

    public function destroy($id_atendimento)
    {
        $atendimento = Atendimento::where('id_atendimento', $id_atendimento)->firstOrFail();
        $atendimento->delete(); // remove permanentemente

        return redirect()->back()->with('success', 'Atendimento excluído com sucesso.');
    }

}
