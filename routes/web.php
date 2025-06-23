<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PasienAjaxController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('pasien-sync')->group(function () {
    Route::get('/', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('/store', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/update/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::delete('/delete/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
});

Route::prefix('pasien-async')->group(function () {
    Route::get('/', [PasienAjaxController::class, 'index'])->name('pasien.ajax.index');
    Route::get('/data', [PasienAjaxController::class, 'data'])->name('pasien.ajax.data');
    Route::post('/store', [PasienAjaxController::class, 'store'])->name('pasien.ajax.store');
    Route::get('/edit/{id}', [PasienAjaxController::class, 'edit'])->name('pasien.ajax.edit');
    Route::put('/update/{id}', [PasienAjaxController::class, 'update'])->name('pasien.ajax.update');
    Route::delete('/delete/{id}', [PasienAjaxController::class, 'destroy'])->name('pasien.ajax.destroy');
});
