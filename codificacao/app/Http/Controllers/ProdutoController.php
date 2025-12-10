<?php

namespace App\Http\Controllers;

use App\Models\Barbearia;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Estoque;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * Agora recebe o id_barbearia como parâmetro de rota.
     */
    public function index($id_barbearia)
    {
        try {
            $barbearia = Barbearia::where('id_barbearia', $id_barbearia)->firstOrFail();

            $estoques = $barbearia->estoques()
                ->with('produto')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            $estoque_baixo = Estoque::where('id_barbearia', $barbearia->id_barbearia)
                ->whereColumn('quantidade', '<', 'quantidade_minima')
                ->exists();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao buscar produtos: ' . $e->getMessage());
        }

        return view("barbearias.estoque", compact("estoques", "barbearia", 'estoque_baixo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barbearia' => 'required|exists:barbearias,id_barbearia',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|numeric|min:0',
            'quantidade_minima' => 'nullable|numeric|min:0'
        ]);

        try {
            // Cria produto
            $produto = Produto::create([
                'id_produto' => (string) Str::uuid(),
                'nome' => $request->get('nome'),
                'descricao' => $request->get('descricao'),
                'preco' => $request->get('preco'),
                'unidade_medida' => $request->get('unidade_medida', 'ml'),
            ]);

            // Cria registro de estoque vinculado à barbearia
            Estoque::create([
                'id_estoque' => (string) Str::uuid(),
                'id_barbearia' => $request->get('id_barbearia'),
                'id_produto' => $produto->id_produto,
                'quantidade' => $request->get('quantidade'),
                'quantidade_minima' => $request->get('quantidade_minima', 0),
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erro ao cadastrar produto: ' . $e->getMessage());
        }

        return redirect()->route('produtos.index', $request->get('id_barbearia'))
            ->with('success', 'Produto cadastrado com sucesso');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'nullable|numeric|min:0',
            'quantidade_minima' => 'nullable|numeric|min:0',
            'id_estoque' => 'nullable|string',
            'id_barbearia' => 'nullable|string',
        ]);

        try {
            $produto = Produto::findOrFail($id_produto);

            // Atualiza dados do produto
            $produto->update([
                'nome' => $request->get('nome'),
                'descricao' => $request->get('descricao'),
                'preco' => $request->get('preco'),
            ]);

            // Atualiza estoque: prefira id_estoque se enviado, senão busca por id_produto
            $estoque = null;
            if ($request->filled('id_estoque')) {
                $estoque = Estoque::where('id_estoque', $request->get('id_estoque'))->first();
            }

            if (!$estoque) {
                $estoque = Estoque::where('id_produto', $id_produto)->first();
            }

            if ($estoque) {
                $dadosEstoque = [];
                if ($request->has('quantidade')) {
                    $dadosEstoque['quantidade'] = $request->get('quantidade');
                }
                if ($request->has('quantidade_minima')) {
                    $dadosEstoque['quantidade_minima'] = $request->get('quantidade_minima');
                }

                if (!empty($dadosEstoque)) {
                    $estoque->update($dadosEstoque);
                }
            }

            // Determine id_barbearia para redirecionamento
            $id_barbearia = $request->get('id_barbearia') ?? ($estoque->id_barbearia ?? null);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erro ao editar produto: ' . $e->getMessage());
        }

        if ($id_barbearia) {
            return redirect()->route('produtos.index', $id_barbearia)
                ->with('success', 'Produto editado com sucesso');
        }

        return back()->with('success', 'Produto editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_produto)
    {
        try {
            // Recupera o estoque para obter id_barbearia para redirecionamento
            $estoque = Estoque::where('id_produto', $id_produto)->first();
            $id_barbearia = $estoque->id_barbearia ?? null;

            // Remove estoques vinculados a este produto
            Estoque::where('id_produto', $id_produto)->delete();

            // Remove o produto
            $produto = Produto::find($id_produto);
            if ($produto) {
                $produto->delete();
            }

            if ($id_barbearia) {
                return redirect()->route('produtos.index', $id_barbearia)
                    ->with('success', 'Produto removido com sucesso');
            }

            return redirect()->back()->with('success', 'Produto removido com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir produto: ' . $e->getMessage());
        }
    }
}
