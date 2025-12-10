<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    /**
     * Ajusta a quantidade mínima de múltiplos estoques (bulk).
     * Espera 'produtos' => [ '<id_estoque>' => ['quantidade_minima' => '...'], ... ]
     */
    public function ajustarQuantidadeMinimaDoEstoque(Request $request)
    {
        $estoques = $request->get('produtos', []);
        try {
            foreach ($estoques as $estoqueId => $dados) {
                $quantidadeMinima = isset($dados['quantidade_minima']) ? $dados['quantidade_minima'] : null;

                Estoque::where('id_estoque', $estoqueId)->update([
                    'quantidade_minima' => $quantidadeMinima,
                ]);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao ajustar quantidade mínima dos produtos: ' . $e->getMessage());
        }

        return back()->with('success','Quantidade mínima dos produtos ajustadas com sucesso');
    }

    /**
     * Repor estoque de um item específico.
     */
    public function reporEstoque(Request $request, $id_estoque)
    {
        $request->validate([
            'quantidade_repor' => 'required|numeric|min:0.01',
        ]);

        try {
            $estoque = Estoque::findOrFail($id_estoque);
            $estoque->update([
                'quantidade' => $estoque->quantidade + $request->get('quantidade_repor'),
            ]);

            // Redireciona para a listagem de produtos da barbearia
            return redirect()->route('produtos.index', $estoque->id_barbearia)
                ->with('success','Quantidade ajustada com sucesso');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao ajustar quantidade: ' . $e->getMessage());
        }
    }
}
