<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducaoController;
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', [ProducaoController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/funcionarios', function () {
    return view('funcionarios');
})->middleware(['auth', 'verified'])->name('funcionarios');

// Route::get('/funcionarios/create', [ProducaoController::class, 'create'])->middleware(['auth', 'verified'])->name('funcionario.create');

Route::get('/funcionarios/create', [ProducaoController::class, 'create'])->middleware(['auth', 'verified'])->name('producao.create');

Route::get('/funcionarios/store', [ProducaoController::class, 'store'])->middleware(['auth', 'verified'])->name('producao.store');

Route::get('/producao', [ProducaoController::class, 'index'])->middleware(['auth', 'verified'])->name('producao');

Route::get('/producao/delete/{id}', [ProducaoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('producao.delete');

Route::get('/producao/editar/{id}', [ProducaoController::class, 'edit'])->middleware(['auth', 'verified'])->name('producao.edit');

Route::get('/producao/update/{id}', [ProducaoController::class, 'update'])->middleware(['auth', 'verified'])->name('producao.update');

Route::get('/folhapagamento', function () {
    return view('folhaPagamento');
})->middleware(['auth', 'verified'])->name('folhaPagamento');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
