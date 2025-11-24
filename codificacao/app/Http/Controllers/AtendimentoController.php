<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
