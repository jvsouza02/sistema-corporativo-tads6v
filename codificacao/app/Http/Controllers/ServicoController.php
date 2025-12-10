<?php
// app/Http/Controllers/ServicoController.php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Models\Barbearia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_barbearia)
    {
        $barbearia = Barbearia::where('id_barbearia', $id_barbearia)->firstOrFail();

        // Busca serviços com produtos associados
        $servicos = $barbearia->servicos()
            ->with('produtos')
            ->orderBy('nome')
            ->get();

        // Busca produtos da barbearia para o formulário
        $produtos = $barbearia->produtos()
            ->orderBy('nome')
            ->get();

        return view('barbearias.servicos', compact('barbearia', 'servicos', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barbearia' => 'required|exists:barbearias,id_barbearia',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'produtos' => 'nullable|array',
            'produtos.*.selecionado' => 'nullable|in:1',
            'produtos.*.quantidade_utilizada' => 'nullable|numeric|min:0',
        ], [
            'nome.required' => 'O nome do serviço é obrigatório.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.min' => 'O preço deve ser maior ou igual a zero.',
        ]);


        $barbearia = Barbearia::findOrFail($validated['id_barbearia']);


        try {
            DB::transaction(function () use ($validated, $request, &$servico) {
                $servico = Servico::create([
                    'id_barbearia' => $validated['id_barbearia'],
                    'nome' => $validated['nome'],
                    'descricao' => $validated['descricao'] ?? null,
                    'preco' => $validated['preco'],
                ]);

                // Processa produtos (se houver)
                $produtosInput = $request->input('produtos', []); // mantém estrutura bruta
                $attachData = [];

                foreach ($produtosInput as $idProduto => $data) {
                    if (!empty($data['selecionado'])) {
                        $attachData[$idProduto] = [
                            'quantidade_utilizada' => $data['quantidade_utilizada'] ?? 0
                        ];
                    }
                }

                if (!empty($attachData)) {
                    $servico->produtos()->attach($attachData);
                }
            });


            return redirect()
                ->route('servicos.index', $validated['id_barbearia'])
                ->with('success', 'Serviço cadastrado com sucesso!');

        } catch (\Exception $e) {
            // ⬇️ MOSTRA O ERRO REAL
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar serviço: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_servico)
    {
        $validated = $request->validate([
            'id_barbearia' => 'required|exists:barbearias,id_barbearia',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'produtos' => 'nullable|array',
            'produtos.*.selecionado' => 'nullable|in:1',
            'produtos.*.quantidade_utilizada' => 'nullable|numeric|min:0',
        ], [
            'nome.required' => 'O nome do serviço é obrigatório.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.min' => 'O preço deve ser maior ou igual a zero.',
        ]);

        $servico = Servico::findOrFail($id_servico);
        $barbearia = Barbearia::findOrFail($validated['id_barbearia']);

        // Verifica se o serviço pertence à barbearia
        if ($servico->id_barbearia !== $validated['id_barbearia']) {
            abort(403, 'Este serviço não pertence a esta barbearia.');
        }

        try {
            DB::transaction(function () use ($servico, $validated, $request) {
                // Atualiza dados do serviço
                $servico->update([
                    'nome' => $validated['nome'],
                    'descricao' => $validated['descricao'] ?? null,
                    'preco' => $validated['preco'],
                ]);

                // Processa produtos recebidos no formato:
                // produtos => [ '<id_produto>' => ['selecionado' => 1, 'quantidade_utilizada' => '50'], ... ]
                $produtosInput = $request->input('produtos', []);
                $syncData = [];

                foreach ($produtosInput as $idProduto => $data) {
                    // Só sincroniza se foi marcado (selecionado)
                    if (!empty($data['selecionado'])) {
                        // Normaliza quantidade
                        $quantidade = isset($data['quantidade_utilizada']) && $data['quantidade_utilizada'] !== ''
                            ? $data['quantidade_utilizada']
                            : 0;

                        // Garante que o índice de produto seja tratado como string (UUID) — evita problemas
                        $syncData[(string) $idProduto] = [
                            'quantidade_utilizada' => $quantidade
                        ];
                    }
                }

                // Se houver produtos para sincronizar, faz sync com os dados do pivot.
                // Se não houver, sync([]) remove todas as associações.
                $servico->produtos()->sync($syncData);
            });

            return redirect()
                ->route('servicos.index', $validated['id_barbearia'])
                ->with('success', 'Serviço atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar serviço: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_servico)
    {
        $servico = Servico::findOrFail($id_servico);

        $id_barbearia = $servico->id_barbearia;

        // // Verifica se o serviço está sendo usado em atendimentos
        // if ($servico->temAtendimentos()) {
        //     return redirect()
        //         ->route('servicos.index', $id_barbearia)
        //         ->with('error', 'Este serviço não pode ser removido pois está vinculado a atendimentos.');
        // }

        $servico->delete();

        return redirect()
            ->route('servicos.index', $id_barbearia)
            ->with('success', 'Serviço removido com sucesso!');
    }
}
