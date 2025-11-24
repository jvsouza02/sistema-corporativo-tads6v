<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barbearia;
use App\Models\Atendimento;
use App\Models\Barbeiro;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'proprietario') {
            return redirect()->route('dashboard');

        } else if (auth()->user()->role == 'barbeiro') {
            return redirect()->route('barbearia.detalhes', auth()->user()->barbeiro->id_barbearia);

        }
    }

    public function dashboard()
    {
        $barbearias = Barbearia::where('id_proprietario', auth()->user()->proprietario->id_proprietario)
            ->withCount([
                // Total de barbeiros por barbearia
                'barbeiros as total_barbeiros',

                // Total de atendimentos da última semana por barbearia
                'atendimentos as atendimentos_semana' => function ($query) {
                    $query->where('created_at', '>=', now()->subWeek());
                }
            ])
            ->withSum([
                // Soma do valor total dos atendimentos da última semana
                'atendimentos as valor_total_semana' => function ($query) {
                    $query->where('created_at', '>=', now()->subWeek());
                }
            ], 'valor_total')
            ->get();

        return view('barbearias.dashboard', compact('barbearias'));
    }

    public function barbearia($id)
    {
        $barbearia = Barbearia::where('id_barbearia', $id)->first();
        return view('barbearias-barbearia-detail', compact('barbearia'));
    }
}
