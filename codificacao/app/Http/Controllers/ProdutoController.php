<?php

namespace App\Http\Controllers;

use App\Models\Barbearia;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Estoque;
use Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_barbearia)
    {
        $barbearia = Barbearia::where('id_barbearia', $id_barbearia)->first();
        $estoques = $barbearia->estoques()->with('produto')->get();
        return view("barbearias.estoque", compact("estoques", 'barbearia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'preco' => 'required|numeric',
        ]);

        try {
            $produto = Produto::create([
                'id_produto' => Str::uuid(),
                'nome' => $request->get('nome'),
                'descricao' => $request->get('descricao'),
                'preco' => $request->get('preco'),
            ]);

            Estoque::create([
                'id_estoque' => Str::uuid(),
                'id_barbearia' => $request->get('id_barbearia'),
                'id_produto' => $produto->id_produto,
                'quantidade' => $request->get('quantidade'),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success','Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
