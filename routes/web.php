<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducaoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FolhaPagamentoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ClienteController;
use App\Models\Estoque;

Route::get('/', [ProducaoController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');;

Route::get('/dashboard', [ProducaoController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/funcionarios', [FuncionarioController::class, 'index'])->middleware(['auth', 'verified'])->name('funcionarios');

Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->middleware(['auth', 'verified'])->name('funcionario.create');

Route::get('/funcionarios/store', [FuncionarioController::class, 'store'])->middleware(['auth', 'verified'])->name('funcionario.store');

Route::get('/funcionarios/delete/{id}', [FuncionarioController::class, 'destroy'])->middleware(['auth', 'verified'])->name('funcionario.delete');

Route::get('/funcionarios/editar/{id}', [FuncionarioController::class, 'edit'])->middleware(['auth', 'verified'])->name('funcionario.edit');

Route::get('/funcionarios/update/{id}', [FuncionarioController::class, 'update'])->middleware(['auth', 'verified'])->name('funcionario.update');

Route::get('/producao', [ProducaoController::class, 'index'])->middleware(['auth', 'verified'])->name('producao');

Route::get('/producao/create', [ProducaoController::class, 'create'])->middleware(['auth', 'verified'])->name('producao.create');

Route::get('/producao/store', [ProducaoController::class, 'store'])->middleware(['auth', 'verified'])->name('producao.store');

Route::get('/producao/delete/{id}', [ProducaoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('producao.delete');

Route::get('/producao/editar/{id}', [ProducaoController::class, 'edit'])->middleware(['auth', 'verified'])->name('producao.edit');

Route::get('/producao/update/{id}', [ProducaoController::class, 'update'])->middleware(['auth', 'verified'])->name('producao.update');

Route::get('/estoque', [EstoqueController::class, 'index'])->middleware(['auth', 'verified'])->name('estoque');

Route::get('/estoque/editar/{id}', [EstoqueController::class, 'edit'])->middleware(['auth', 'verified'])->name('estoque.edit');

Route::get('/estoque/update/{id}', [EstoqueController::class, 'update'])->middleware(['auth', 'verified'])->name('estoque.update');

Route::get('/folhapagamento', [FolhaPagamentoController::class, 'index'])->middleware(['auth', 'verified'])->name('folhaPagamento.index');

Route::get('/folhapagamento/store', [FolhaPagamentoController::class, 'store'])->middleware(['auth', 'verified'])->name('folhaPagamento.store');

Route::get('/folhapagamento/delete', [FolhaPagamentoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('folhaPagamento.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clientes', [ClienteController::class, 'index'])->middleware(['auth', 'verified'])->name('cliente');

Route::get('/clientes/create', [ClienteController::class, 'create'])->middleware(['auth', 'verified'])->name('cliente.create');

Route::get('/clientes/store', [ClienteController::class, 'store'])->middleware(['auth', 'verified'])->name('cliente.store');

Route::get('/clientes/delete/{id}', [ClienteController::class, 'destroy'])->middleware(['auth', 'verified'])->name('cliente.delete');

Route::get('/clientes/editar/{id}', [ClienteController::class, 'edit'])->middleware(['auth', 'verified'])->name('cliente.edit');

Route::get('/clientes/update/{id}', [ClienteController::class, 'update'])->middleware(['auth', 'verified'])->name('cliente.update');
require __DIR__.'/auth.php';
