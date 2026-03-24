<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.overview');
})->name('dashboard.overview');

Route::view('/operacoes-lojas', 'dashboard.stores')->name('dashboard.stores');
Route::view('/bilheteria-matchday', 'dashboard.matchday')->name('dashboard.matchday');
Route::view('/relatorios', 'dashboard.reports')->name('dashboard.reports');
