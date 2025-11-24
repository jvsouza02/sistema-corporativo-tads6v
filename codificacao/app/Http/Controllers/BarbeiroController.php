<?php

namespace App\Http\Controllers;

use App\Models\Barbeiro;
use Illuminate\Http\Request;
use App\Models\Barbearia;
use Illuminate\Support\Str;

class BarbeiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Vai lançar exceção 404 se não encontrar
            $barbearia = Barbearia::where('id_barbearia', $request->id_barbearia)
                ->firstOrFail();

            $todas_barbearias = Barbearia::where('id_barbearia', '!=', $request->id_barbearia)
                ->where('id_proprietario', auth()->user()->proprietario->id_proprietario)
                ->get();

            $barbeiros = Barbeiro::where('id_barbearia', $request->id_barbearia)->get();

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Barbearia não encontrada');
        }

        return view('barbearias.barbeiros', compact('barbeiros', 'barbearia', 'todas_barbearias'));
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
    public function update(Request $request, $id_barbeiro)
    {
        $dados = $request->all();
        try {
            $barbeiro = Barbeiro::where('id_barbeiro', $id_barbeiro)->first();
            $barbeiro->update([
                'horario_inicio' => $dados['horario_inicio'],
                'horario_fim' => $dados['horario_fim'],
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao editar barbeiro');
        }

        return redirect()->back()->with('success', 'Barbeiro editado com sucesso');
    }

    public function transferir(Request $request, $id_barbeiro)
    {
        $dados = $request->all();
        try {
            $barbeiro = Barbeiro::where('id_barbeiro', $id_barbeiro)->first();
            $barbeiro->update([
                'id_barbearia' => $dados['id_barbearia_destino']
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao transferir barbeiro');
        }
        return redirect()->back()->with('success', 'Barbeiro transferido com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_barbeiro)
    {
        try {
            $barbeiro = Barbeiro::where('id_barbeiro', $id_barbeiro)->first();
            $barbeiro->delete();
            return redirect()->back()->with('success', 'Barbeiro excluído com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir barbeiro');
        }
    }
}
