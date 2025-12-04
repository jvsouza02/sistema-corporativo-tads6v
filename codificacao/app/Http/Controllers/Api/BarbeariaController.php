<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barbearia; // ← ADICIONAR ESTE IMPORT
use Illuminate\Http\Request;

class BarbeariaController extends Controller
{
    public function getBarbeiros($id)
    {
        try {
            $barbearia = Barbearia::findOrFail($id);
            $barbeiros = $barbearia->barbeiros()->with('user')->get()->map(function($barbeiro) {
                return [
                    'id_barbeiro' => $barbeiro->id_barbeiro,
                    'nome' => $barbeiro->nome,
                    'horario_inicio' => $barbeiro->horario_inicio,
                    'horario_fim' => $barbeiro->horario_fim
                ];
            });
            
            return response()->json($barbeiros);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Barbearia não encontrada'], 404);
        }
    }

    /**
     * Retorna horários ocupados para uma data específica
     */
    public function getHorariosOcupados(Request $request, $id)
    {
        try {
            $barbearia = Barbearia::findOrFail($id);
            $data = $request->input('data'); // formato: Y-m-d
            $barbeiro_id = $request->input('barbeiro_id'); // opcional
            
            if (!$data) {
                return response()->json(['error' => 'Data é obrigatória'], 400);
            }

            $query = \App\Models\Agendamento::where('id_barbearia', $id)
                ->whereDate('data_hora', $data)
                ->where('status', '!=', 'cancelado');
            
            if ($barbeiro_id) {
                $query->where('id_barbeiro', $barbeiro_id);
            }
            
            $agendamentos = $query->get()->map(function($agendamento) {
                return [
                    'horario' => date('H:i', strtotime($agendamento->data_hora)),
                    'barbeiro_id' => $agendamento->id_barbeiro
                ];
            });
            
            return response()->json($agendamentos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar horários'], 500);
        }
    }
}