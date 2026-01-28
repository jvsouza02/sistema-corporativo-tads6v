<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barbearia;
use App\Models\Atendimento;
use App\Models\Barbeiro;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'proprietario') {
            return redirect()->route('dashboard');

        } else if (auth()->user()->role == 'barbeiro') {
            return redirect()->route('barbearia.detalhes', auth()->user()->barbeiro->id_barbearia);

        } else if (auth()->user()->role == 'cliente') {
            return redirect()->route('cliente.agendamentos.create');
        }
    }

    public function dashboard()
    {
        $oneWeekAgo = now()->subWeek();

        // Subconsulta: faturamento semanal
        $valorSemanaSub = DB::table('atendimentos')
            ->where('status', 'finalizado')
            ->where('created_at', '>=', $oneWeekAgo)
            ->select(
                'id_barbearia',
                DB::raw('SUM(valor_total) as valor_total_semana')
            )
            ->groupBy('id_barbearia');

        // Subconsulta: atendimentos na semana
        $atendimentosSemanaSub = DB::table('atendimentos')
            ->where('status', 'finalizado')
            ->where('created_at', '>=', $oneWeekAgo)
            ->select(
                'id_barbearia',
                DB::raw('COUNT(*) as atendimentos_semana')
            )
            ->groupBy('id_barbearia');

        // Subconsulta: total de barbeiros
        $barbeirosSub = DB::table('barbeiros')
            ->select(
                'id_barbearia',
                DB::raw('COUNT(*) as total_barbeiros')
            )
            ->groupBy('id_barbearia');

        $barbearias = Barbearia::where(
            'id_proprietario',
            auth()->user()->proprietario->id_proprietario
        )
            ->leftJoinSub(
                $valorSemanaSub,
                'vs',
                'barbearias.id_barbearia',
                '=',
                'vs.id_barbearia'
            )
            ->leftJoinSub(
                $atendimentosSemanaSub,
                'asw',
                'barbearias.id_barbearia',
                '=',
                'asw.id_barbearia'
            )
            ->leftJoinSub(
                $barbeirosSub,
                'bs',
                'barbearias.id_barbearia',
                '=',
                'bs.id_barbearia'
            )
            ->select(
                'barbearias.*',
                DB::raw('COALESCE(vs.valor_total_semana, 0) as valor_total_semana'),
                DB::raw('COALESCE(asw.atendimentos_semana, 0) as atendimentos_semana'),
                DB::raw('COALESCE(bs.total_barbeiros, 0) as total_barbeiros')
            )
            ->paginate(6);

        return view('barbearias.dashboard', compact('barbearias'));
    }




    public function barbearia($id)
    {
        $barbearia = Barbearia::where('id_barbearia', $id)->first();
        return view('barbearias-barbearia-detail', compact('barbearia'));
    }
}
