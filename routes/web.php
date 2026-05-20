<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('mahasiswa')
    ->name('mahasiswa.')
    ->group(function () {

        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
        Route::get('/create', [MahasiswaController::class, 'create'])->name('create');
        Route::post('/', [MahasiswaController::class, 'store'])->name('store');
        Route::get('/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('edit');
        Route::get('/{mahasiswa}', [MahasiswaController::class, 'show'])->name('show');
        Route::put('/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update');
        Route::delete('/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('destroy');
        
});

Route::prefix('dosen')
     ->name('dosen.')
     ->group(function(){
       Route::get('/', [DosenController::class, 'index'])->name('index');
       Route::get('/create', [DosenController::class, 'create'])->name('create');
       Route::post('/', [DosenController::class, 'store'])->name('store');
       Route::get('/{dosen}/edit', [DosenController::class, 'edit'])->name('edit');
       Route::put('/{dosen}', [DosenController::class, 'update'])->name('update');
       Route::get('/{dosen}', [DosenController::class, 'show'])->name('show');
       Route::delete('/{dosen}', [DosenController::class, 'destroy'])->name('destroy');

});