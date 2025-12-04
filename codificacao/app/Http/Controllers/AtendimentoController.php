<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Barbearia;
use App\Models\Agendamento;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AtendimentoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'servico' => 'required|string',
            'id_barbeiro' => 'required',
            'id_barbearia' => 'required',
            'valor_total' => 'required',
        ], [
            'servico.required' => 'É obrigatório escolher pelo menos um serviço.',
            'valor_total.required' => 'O valor total é obrigatório.',
        ]);

        $dados = $request->all();

        try {
            // Limpar e converter valor
            $valorLimpo = str_replace(['R$', ' ', '.'], '', $dados['valor_total']);
            $valorLimpo = str_replace(',', '.', $valorLimpo);
            $valorTotal = (float) $valorLimpo;

            if ($valorTotal < 0) {
                return redirect()->back()
                    ->withErrors(['valor_total' => 'O valor não pode ser negativo.'])
                    ->withInput();
            }

            Atendimento::create([
                'id_atendimento' => Str::uuid(),
                'servico' => $dados['servico'],
                'produto' => $dados['produto'] ?? 'Nenhum',
                'comentario' => $dados['comentario'] ?? null,
                'valor_total' => $valorTotal,
                'id_barbeiro' => $dados['id_barbeiro'],
                'id_barbearia' => $dados['id_barbearia'],
            ]);

            return redirect()->back()->with('success', 'Atendimento registrado com sucesso');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao registrar atendimento: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id_atendimento)
    {
        // Validação
        $request->validate([
            'servico' => 'required|string',
            'valor_total' => 'required',
        ], [
            'servico.required' => 'É obrigatório escolher pelo menos um serviço.',
            'valor_total.required' => 'O valor total é obrigatório.',
        ]);

        $dados = $request->all();

        try {
            $atendimento = Atendimento::find($id_atendimento);

            if (!$atendimento) {
                return redirect()->back()->with('error', 'Atendimento não encontrado');
            }

            $valorLimpo = str_replace(['R$', ' ', '.'], '', $dados['valor_total']);
            $valorLimpo = str_replace(',', '.', $valorLimpo);
            $valorTotal = (float) $valorLimpo;

            if ($valorTotal < 0) {
                return redirect()->back()
                    ->withErrors(['valor_total' => 'O valor não pode ser negativo.'])
                    ->withInput();
            }

            $atendimento->update([
                'servico' => $dados['servico'],
                'produto' => $dados['produto'] ?? 'Nenhum',
                'comentario' => $dados['comentario'] ?? null,
                'valor_total' => $valorTotal,
            ]);

            return redirect()->back()->with('success', 'Atendimento atualizado com sucesso');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar atendimento: ' . $e->getMessage());
        }
    }

    public function createCliente()
    {
        // Buscar barbearias com informações completas
        $barbearias = Barbearia::with(['barbeiros.user', 'proprietario'])
            ->whereHas('barbeiros')
            ->get();

        return view('cliente.agendamento', compact('barbearias'));
    }

    public function storeCliente(Request $request)
    {
        $validated = $request->validate([
            'id_barbearia' => 'required|exists:barbearias,id_barbearia',
            'servico' => 'required|string|in:Corte Social,Corte Navalhado,Corte Degradê,Barba,Sobrancelha,Completo',
            'data_hora' => 'required|date_format:Y-m-d\TH:i|after:now',
            'id_barbeiro' => 'nullable|exists:barbeiros,id_barbeiro',
            'observacao' => 'nullable|string|max:500'
        ], [
            'id_barbearia.required' => 'Por favor, selecione uma barbearia.',
            'id_barbearia.exists' => 'A barbearia selecionada não existe.',
            'servico.required' => 'Por favor, selecione um serviço.',
            'servico.in' => 'O serviço selecionado é inválido.',
            'data_hora.required' => 'Por favor, informe a data e horário desejados.',
            'data_hora.after' => 'A data e hora devem ser futuras.',
            'data_hora.date_format' => 'Formato de data e hora inválido.',
            'id_barbeiro.exists' => 'O barbeiro selecionado não existe.',
            'observacao.max' => 'A observação não pode ter mais de 500 caracteres.'
        ]);

        try {
            DB::beginTransaction();

            $dataHora = date('Y-m-d H:i:s', strtotime($request->data_hora));

            $barbearia = Barbearia::findOrFail($request->id_barbearia);

            $horarioAbertura = Carbon::createFromFormat('H:i:s', $barbearia->horario_abertura);
            $horarioFechamento = Carbon::createFromFormat('H:i:s', $barbearia->horario_fechamento);
            $horaSelecionada = Carbon::createFromFormat('Y-m-d H:i:s', $dataHora);

            if ($horaSelecionada->lt($horarioAbertura->setDate(
                $horaSelecionada->year,
                $horaSelecionada->month,
                $horaSelecionada->day
            )) || $horaSelecionada->gt($horarioFechamento->setDate(
                $horaSelecionada->year,
                $horaSelecionada->month,
                $horaSelecionada->day
            ))) {
                DB::rollBack();
                return back()
                    ->withInput()
                    ->withErrors([
                        'data_hora' => 'O horário selecionado está fora do expediente da barbearia. ' .
                                    'Horário de funcionamento: ' .
                                    $barbearia->horario_abertura . ' às ' .
                                    $barbearia->horario_fechamento
                    ]);
            }

            $agendamentoExistente = Agendamento::where('data_hora', $dataHora)
                ->where('id_barbearia', $request->id_barbearia)
                ->where('status', '!=', 'cancelado');

            if ($request->id_barbeiro) {
                $agendamentoExistente->where('id_barbeiro', $request->id_barbeiro);
            }

            if ($agendamentoExistente->exists()) {
                DB::rollBack();
                return back()
                    ->withInput()
                    ->withErrors([
                        'data_hora' => 'Este horário já está ocupado. Por favor, escolha outro horário.'
                    ]);
            }

            $agendamento = Agendamento::create([
                'id_agendamento' => Str::uuid(),
                'data_hora' => $dataHora,
                'servico' => $validated['servico'],
                'observacao' => $validated['observacao'] ?? null,
                'status' => 'agendado',
                'id_cliente' => auth()->user()->cliente->id_cliente,
                'id_barbearia' => $validated['id_barbearia'],
                'id_barbeiro' => $validated['id_barbeiro'] ?? null
            ]);

            DB::commit();

            $dataFormatada = Carbon::parse($dataHora)->format('d/m/Y [às] H:i');
            $mensagemSucesso = 'Agendamento realizado com sucesso! ' .
                            'Serviço: ' . $validated['servico'] . ' | ' .
                            'Data: ' . $dataFormatada;

            return redirect()
                ->route('cliente.agendamentos.listar')
                ->with('success', $mensagemSucesso);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Erro ao criar agendamento: ' . $e->getMessage());

            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'Erro ao realizar agendamento. Por favor, tente novamente. ' .
                            'Se o problema persistir, entre em contato com o suporte.'
                ]);
        }
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

        return redirect()->route('cliente.agendamentos.listar')->with('success', 'Agendamento cancelado com sucesso!');
    }

    public function destroy($id_atendimento)
    {
        try {
            $atendimento = Atendimento::find($id_atendimento);

            if (!$atendimento) {
                return redirect()->back()->with('error', 'Atendimento não encontrado');
            }

            $atendimento->delete();
            return redirect()->back()->with('success', 'Atendimento excluído com sucesso');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir atendimento: ' . $e->getMessage());
        }
    }
}
