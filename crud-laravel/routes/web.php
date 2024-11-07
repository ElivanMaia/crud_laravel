<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');
    Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');
    Route::get('agendamentos/{id}/edit', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
    Route::put('agendamentos/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');
    Route::delete('agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->get('/admin', [AdminController::class, 'index'])->name('admin');

require __DIR__ . '/auth.php';
