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
            'produtos.*' => 'exists:produtos,id_produto',
        ], [
            'nome.required' => 'O nome do serviço é obrigatório.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.min' => 'O preço deve ser maior ou igual a zero.',
        ]);

        $barbearia = Barbearia::findOrFail($validated['id_barbearia']);


        DB::transaction(function () use ($validated) {
            $servico = Servico::create([
                'id_barbearia' => $validated['id_barbearia'],
                'nome' => $validated['nome'],
                'descricao' => $validated['descricao'],
                'preco' => $validated['preco'],
            ]);

            // Associa produtos ao serviço (se houver)
            if (!empty($validated['produtos'])) {
                $servico->produtos()->attach($validated['produtos']);
            }
        });

        return redirect()
            ->route('servicos.index', $validated['id_barbearia'])
            ->with('success', 'Serviço cadastrado com sucesso!');
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
            'produtos.*' => 'exists:produtos,id_produto',
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

        DB::transaction(function () use ($servico, $validated) {
            $servico->update([
                'nome' => $validated['nome'],
                'descricao' => $validated['descricao'],
                'preco' => $validated['preco'],
            ]);

            // Sincroniza produtos (remove os antigos e adiciona os novos)
            if (isset($validated['produtos'])) {
                $servico->produtos()->sync($validated['produtos']);
            } else {
                // Se não houver produtos selecionados, remove todos
                $servico->produtos()->detach();
            }
        });

        return redirect()
            ->route('servicos.index', $validated['id_barbearia'])
            ->with('success', 'Serviço atualizado com sucesso!');
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
