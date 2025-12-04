<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\Barbearia;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    /**
     * Tela de novo agendamento (usa a view que você já tem).
     */
    public function createCliente()
    {
        $barbearias = Barbearia::all();

        return view('cliente.agendamentos.novo', compact('barbearias'));
    }

    /**
     * Salva o agendamento do cliente.
     */
    public function storeCliente(Request $request)
    {
        $request->validate(
            [
                'id_barbearia' => 'required|exists:barbearias,id_barbearia',
                'data_hora'    => 'required|date_format:"Y-m-d H:i:s"',
            ],
            [
                'id_barbearia.required' => 'Selecione uma barbearia.',
                'id_barbearia.exists'   => 'Barbearia inválida.',
                'data_hora.required'    => 'Selecione um horário.',
                'data_hora.date_format' => 'Data e horário inválidos.',
            ]
        );

        $userId = Auth::id();

        // ==== BUSCAR O CLIENTE NA TABELA CLIENTES ====
        // Aqui assumo que sua tabela "clientes" tem uma coluna "user_id"
        // que referencia "users.id".
        // Se no seu banco o nome for "id_user" ou "id_usuario",
        // é só trocar ali no where.
        $cliente = Cliente::where('user_id', $userId)->first();

        if (!$cliente) {
            return back()
                ->withInput()
                ->with('error', 'Cliente não encontrado para o usuário logado.');
        }

        $idCliente = $cliente->id_cliente; // UUID do cliente, compatível com a FK de agendamentos

        // ===== BLOQUEIA HORÁRIO DUPLICADO =====
        $existe = Agendamento::where('id_barbearia', $request->id_barbearia)
            ->where('data_hora', $request->data_hora)
            ->where('status', '!=', 'cancelado')
            ->exists();

        if ($existe) {
            return back()
                ->withInput()
                ->with('error', 'Este horário já está ocupado para esta barbearia. Escolha outro horário.');
        }

        // ===== CRIA O AGENDAMENTO =====
        Agendamento::create([
            'id_barbearia' => $request->id_barbearia,
            'id_cliente'   => $idCliente,              // <-- AGORA VAI O UUID CERTO DO CLIENTE
            'id_barbeiro'  => null,                    // pode ficar null se a FK permitir
            'data_hora'    => $request->data_hora,
            'status'       => 'agendado',              // valor aceito pelo CHECK da coluna
            'servico'      => 'Agendamento de horário',
            // Se tiver essas colunas e forem NOT NULL na tabela:
            // 'produto'     => null,
            // 'valor_total' => 0,
            // 'comentario'  => null,
        ]);

        return redirect()
            ->route('cliente.agendamentos.listar')
            ->with('success', 'Agendamento realizado com sucesso!');
    }

    /**
     * Lista agendamentos do cliente.
     */
    public function listarAgendamentos()
    {
        $userId = Auth::id();

        // mesmo esquema: pega o cliente pelo usuário
        $cliente = Cliente::where('user_id', $userId)->first();

        if (!$cliente) {
            return redirect()
                ->route('home')
                ->with('error', 'Cliente não encontrado para o usuário logado.');
        }

        $idCliente = $cliente->id_cliente;

        $agendamentos = Agendamento::with('barbearia')
            ->where('id_cliente', $idCliente)
            ->orderBy('data_hora', 'asc')
            ->get();

        return view('cliente.agendamentos.index', compact('agendamentos'));
    }

    /**
     * Cancela agendamento (status = cancelado).
     */
    public function cancelarAgendamento($id)
    {
        $userId = Auth::id();

        $cliente = Cliente::where('user_id', $userId)->first();

        if (!$cliente) {
            return redirect()
                ->route('home')
                ->with('error', 'Cliente não encontrado para o usuário logado.');
        }

        $idCliente = $cliente->id_cliente;

        $agendamento = Agendamento::where('id_agendamento', $id)
            ->where('id_cliente', $idCliente)
            ->first();

        if (!$agendamento) {
            return redirect()
                ->route('cliente.agendamentos.listar')
                ->with('error', 'Agendamento não encontrado.');
        }

        if ($agendamento->status === 'cancelado') {
            return redirect()
                ->route('cliente.agendamentos.listar')
                ->with('error', 'Este agendamento já foi cancelado.');
        }

        $agendamento->status = 'cancelado';
        $agendamento->save();

        return redirect()
            ->route('cliente.agendamentos.listar')
            ->with('success', 'Agendamento cancelado com sucesso.');
    }
}
