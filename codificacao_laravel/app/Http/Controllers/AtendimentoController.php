<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $dados = $request->all();

        try {
            $valorLimpo = str_replace(['R$', ' ', '.'], '', $dados['valor_total']);
            $valorLimpo = str_replace(',', '.', $valorLimpo);
            $valorTotal = (float) $valorLimpo;

            Atendimento::create([
                'id_atendimento' => Str::uuid(),
                'servico' => $dados['servico'],
                'produto' => $dados['produto'],
                'comentario' => $dados['comentario'],
                'valor_total' => $valorTotal,
                'id_barbeiro' => $dados['id_barbeiro'],
                'id_barbearia' => $dados['id_barbearia'],
            ]);

            return redirect()->back()->with('success', 'Atendimento registrado com sucesso');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao registrar atendimento');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_atendimento)
    {
        $dados = $request->all();
        try {
            $atendimento = Atendimento::find($id_atendimento);

            $valorLimpo = str_replace(['R$', ' ', '.'], '', $dados['valor_total']);
            $valorLimpo = str_replace(',', '.', $valorLimpo);
            $valorTotal = (float) $valorLimpo;

            $atendimento->update([
                'servico' => $dados['servico'],
                'produto' => $dados['produto'],
                'comentario' => $dados['comentario'],
                'valor_total' => $valorTotal,
            ]);

            return redirect()->back()->with('success', 'Atendimento atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar atendimento');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_atendimento)
    {
        try {
            $atendimento = Atendimento::find($id_atendimento);
            $atendimento->delete();
            return redirect()->back()->with('success', 'Atendimento excluído com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir atendimento');
        }
    }
}
