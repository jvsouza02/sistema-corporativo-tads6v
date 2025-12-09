<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Barbearia;
use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BarbeariaController extends Controller
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
            Barbearia::create([
                'id_barbearia' => Str::uuid(),
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'endereco' => $dados['endereco'],
                'telefone' => $dados['telefone'],
                'horario_abertura' => $dados['horario_abertura'],
                'horario_fechamento' => $dados['horario_fechamento'],
                'descricao' => $dados['descricao'],
                'foto_url' => $dados['foto_url'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($dados['nome']) . '&size=150',
                'id_proprietario' => $dados['id_proprietario']
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar barbearia');
        }

        return redirect()->route('home')->with('success', 'Barbearia criada com sucesso');
    }

    public function barbeariaDetalhes($id)
    {
        $barbearia = Barbearia::where('id_barbearia', $id)->first();
        $estoque_baixo = Estoque::where('id_barbearia', $barbearia->id_barbearia)
            ->whereColumn('quantidade', '<', 'quantidade_minima')
            ->exists();
        if (isset($barbearia)) {
            $atendimentos = $barbearia->atendimentos()->orderByDesc('created_at')->get();
        }

        // dd($atendimentos);
        return view('barbearias.barbearia-detail', compact('barbearia', 'atendimentos', 'estoque_baixo'));
    }

    public function getHorariosOcupados(Request $request, $id)
    {
        $data = $request->query('data');

        if (!$data) {
            return response()->json(['error' => 'Parâmetro "data" é obrigatório (YYYY-MM-DD).'], 400);
        }

        $agendamentos = Agendamento::where('id_barbearia', $id)
            ->whereDate('data_hora', $data)
            ->where('status', '!=', 'cancelado')
            ->get(['data_hora']);

        $horarios = [];

        foreach ($agendamentos as $ag) {
            $valor = $ag->data_hora;

            if (!$valor) continue;

            if ($valor instanceof \Carbon\Carbon) {
                $horarios[] = $valor->format('H:i');
            } else {
                try {
                    $hora = \Carbon\Carbon::parse($valor)->format('H:i');
                    $horarios[] = $hora;
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        return response()->json(array_values($horarios));
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
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
