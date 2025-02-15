<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\RelatorioController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('grupos', GrupoEconomicoController::class);
    Route::resource('bandeiras', BandeiraController::class);
    Route::resource('colaboradores', ColaboradorController::class)->parameters([
        'colaboradores' => 'colaborador', 
    ]);
    Route::resource('unidades', UnidadeController::class);
    Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
    Route::get('/export/excel', [RelatorioController::class, 'exportExcel'])->name('export.excel');
    Route::get('/export/pdf', [RelatorioController::class, 'exportPdf'])->name('export.pdf');
});
