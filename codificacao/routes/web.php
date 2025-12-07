<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarbeariaController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\AgendamentoController;

use App\Http\Controllers\Api\BarbeariaController as BarbeariaApiController;

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');

    Route::get('register-cliente', [AuthController::class, 'registerCliente'])->name('register.cliente');
    Route::post('register-cliente', [AuthController::class, 'registerClientePOST'])->name('register.cliente.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('api')->group(function () {
        Route::get('barbearias/{id}/barbeiros', [BarbeariaController::class, 'getBarbeiros']);
        Route::get('barbearias/{id}/horarios-ocupados', [BarbeariaController::class, 'getHorariosOcupados']);
    });
})->middleware('guest');

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::middleware('can:barbearia-access')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/barbearia/{id_barbearia}', [BarbeariaController::class, 'barbeariaDetalhes'])
            ->name('barbearia.detalhes');
    });

    Route::middleware('can:proprietario-access')->prefix('barbearia')->group(function () {
        Route::post('/', [BarbeariaController::class, 'store'])->name('barbearia.store');

        Route::get('{id_barbearia}/barbeiros/', [BarbeiroController::class, 'index'])->name('barbeiros.index');
        Route::post('/barbeiros', [BarbeiroController::class, 'store'])->name('barbeiros.store');
        Route::put('/barbeiros/{id_barbeiro}', [BarbeiroController::class, 'update'])->name('barbeiros.update');
        Route::put('/barbeiros/{id_barbeiro}/transferir', [BarbeiroController::class, 'transferir'])->name('barbeiros.transferir');
        Route::delete('barbeiros/{id_barbeiro}', [BarbeiroController::class, 'destroy'])->name('barbeiros.destroy');

        Route::get('{id_barbearia}/produtos/', [ProdutoController::class, 'index'])->name('produtos.index');
        Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
        Route::put('/produtos/{id_produto}', [ProdutoController::class, 'update'])->name('produtos.update');
        Route::delete('produtos/{id_produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
        Route::put('/estoque', [EstoqueController::class, 'ajustarQuantidadeMinimaDoEstoque'])->name('estoques.update.minquantity');
        Route::patch('estoque/{id_estoque}', [EstoqueController::class, 'reporEstoque'])->name('estoques.repor');

        Route::get('{barbearia}/servicos', [ServicoController::class, 'index'])->name('servicos.index');
        Route::post('/servicos', [ServicoController::class, 'store'])->name('servicos.store');
        Route::put('/servicos/{servico}', [ServicoController::class, 'update'])->name('servicos.update');
        Route::delete('/servicos/{servico}', [ServicoController::class, 'destroy'])->name('servicos.destroy');
    });
});

Route::middleware('can:barbeiro-access')->group(function () {
    Route::post('/atendimentos', [AtendimentoController::class, 'store'])->name('atendimentos.store');
    Route::put('/atendimentos/{id_atendimento}', [AtendimentoController::class, 'update'])->name('atendimentos.update');
    Route::delete('/atendimentos/{id_atendimento}', [AtendimentoController::class, 'destroy'])->name('atendimentos.destroy');
});

Route::middleware('can:cliente-access')->group(function () {
    Route::get('/cliente/agendamentos/novo', [AgendamentoController::class, 'createCliente'])
        ->name('cliente.agendamentos.create');

    Route::post('/cliente/agendamentos', [AgendamentoController::class, 'storeCliente'])
        ->name('cliente.agendamentos.store');

    Route::get('/cliente/agendamentos', [AgendamentoController::class, 'listarAgendamentos'])
        ->name('cliente.agendamentos.listar');

    Route::delete('/cliente/agendamentos/{id}', [AgendamentoController::class, 'cancelarAgendamento'])
        ->name('cliente.agendamentos.cancelar');
});

Route::prefix('api')->middleware(['auth', 'can:cliente-access'])->group(function () {
    Route::get('barbearias/{id}/barbeiros', [BarbeariaApiController::class, 'getBarbeiros'])
        ->name('api.barbearias.barbeiros');

    Route::get('barbearias/{id}/horarios-ocupados', [BarbeariaApiController::class, 'getHorariosOcupados'])
        ->name('api.barbearias.horarios_ocupados');
});
