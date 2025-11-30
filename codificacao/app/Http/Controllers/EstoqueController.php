<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function ajustarQuantidadeMinimaDoEstoque(Request $request)
    {
        $estoques = $request->get('produtos');
        try {
            foreach($estoques as $estoqueId => $dados) {
                $quantidadeMinima = isset($dados['quantidade_minima']) ? $dados['quantidade_minima'] : null;

                Estoque::where('id_estoque', $estoqueId)->update([
                    'quantidade_minima' => $quantidadeMinima,
                ]);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao ajustar quantidade mínima dos produtos');
        }

        return back()->with('success','Quantidade mínima dos produtos ajustadas com sucesso');
    }
}
