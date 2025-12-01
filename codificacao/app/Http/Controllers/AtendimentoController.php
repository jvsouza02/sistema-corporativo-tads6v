<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Barbearia;
use App\Models\Agendamento; 
use App\Models\Barbeiro; 
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
        $request->validate([
            'id_barbearia' => 'required|exists:barbearias,id_barbearia',
            'servico' => 'required|string',
            'data_hora' => 'required|date_format:Y-m-d\TH:i|after:now',
            'id_barbeiro' => 'nullable|exists:barbeiros,id_barbeiro'
        ], [
            'data_hora.after' => 'A data e hora devem ser futuras.',
            'data_hora.date_format' => 'Formato de data e hora inválido.'
        ]);

        try {
            DB::beginTransaction();
            
            $dataHora = date('Y-m-d H:i:s', strtotime($request->data_hora));
            
            // Verificar se o horário está dentro do expediente da barbearia
            $barbearia = Barbearia::find($request->id_barbearia);
            $horarioAbertura = Carbon::createFromFormat('H:i:s', $barbearia->horario_abertura);
            $horarioFechamento = Carbon::createFromFormat('H:i:s', $barbearia->horario_fechamento);
            $horaSelecionada = Carbon::createFromFormat('Y-m-d H:i:s', $dataHora)->format('H:i:s');
            
            if (Carbon::createFromFormat('H:i:s', $horaSelecionada)->lt($horarioAbertura) || 
                Carbon::createFromFormat('H:i:s', $horaSelecionada)->gt($horarioFechamento)) {
                return back()->withErrors(['horario' => 'O horário selecionado está fora do expediente da barbearia.']);
            }
            
            // Verificar disponibilidade do horário
            $agendamentoExistente = Agendamento::where('data_hora', $dataHora)
                ->where('id_barbearia', $request->id_barbearia);
                
            if ($request->id_barbeiro) {
                $agendamentoExistente->where('id_barbeiro', $request->id_barbeiro);
            }
            
            if ($agendamentoExistente->exists()) {
                return back()->withErrors(['horario' => 'Este horário já está ocupado. Por favor, escolha outro horário.']);
            }

            Agendamento::create([
                'id_agendamento' => Str::uuid(),
                'data_hora' => $dataHora,
                'servico' => $request->servico,
                'observacao' => $request->observacao ?? null,
                'status' => 'agendado',
                'id_cliente' => auth()->user()->cliente->id_cliente,
                'id_barbearia' => $request->id_barbearia,
                'id_barbeiro' => $request->id_barbeiro ?? null
            ]);

            DB::commit();
            
            return redirect()->route('home')->with('success', 'Agendamento realizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Erro ao realizar agendamento: ' . $e->getMessage()]);
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
