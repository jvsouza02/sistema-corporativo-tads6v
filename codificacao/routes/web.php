<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarbeariaController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\ProdutoController;

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('register-cliente', [AuthController::class, 'registerCliente'])->name('register.cliente');
    Route::post('register-cliente', [AuthController::class, 'registerClientePOST'])->name('register.cliente.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
})->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('can:barbearia-access')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/barbearia/{id_barbearia}', [BarbeariaController::class, 'barbeariaDetalhes'])->name('barbearia.detalhes');
    });

    Route::middleware('can:proprietario-access')->group(function () {
        Route::post('/barbearia', [BarbeariaController::class, 'store'])->name('barbearia.store');
        Route::get('/barbeiros/{id_barbearia}', [BarbeiroController::class, 'index'])->name('barbeiros.index');
        Route::post('/barbeiros', [BarbeiroController::class, 'store'])->name('barbeiros.store');
        Route::put('/barbeiros/{id_barbeiro}', [BarbeiroController::class, 'update'])->name('barbeiros.update');
        Route::put('/barbeiros/{id_barbeiro}/transferir', [BarbeiroController::class, 'transferir'])->name('barbeiros.transferir');
        Route::delete('barbeiros/{id_barbeiro}', [BarbeiroController::class, 'destroy'])->name('barbeiros.destroy');
        Route::get('/produtos/{id_barbearia}', [ProdutoController::class, 'index'])->name('produtos.index');
        Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    });

    Route::middleware('can:barbeiro-access')->group(function () {
        Route::post('/atendimentos', [AtendimentoController::class, 'store'])->name('atendimentos.store');
        Route::put('/atendimentos/{id_atendimento}', [AtendimentoController::class, 'update'])->name('atendimentos.update');
        Route::delete('/atendimentos/{id_atendimento}', [AtendimentoController::class, 'destroy'])->name('atendimentos.destroy');
    });
})->middleware('auth');

