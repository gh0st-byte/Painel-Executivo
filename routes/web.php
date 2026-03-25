<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'overview'])->name('dashboard.overview');
    Route::get('/operacoes-lojas', [DashboardController::class, 'stores'])->name('dashboard.stores');
    Route::get('/bilheteria-matchday', [DashboardController::class, 'matchday'])->name('dashboard.matchday');
    Route::get('/relatorios', [DashboardController::class, 'reports'])->name('dashboard.reports');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
});
