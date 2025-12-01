<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
